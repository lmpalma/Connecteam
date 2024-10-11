<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use App\Models\TaskFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class AdminController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();

        $employeeCount = User::where('role', 'employee')
                            ->where('manager_id', $user->id)
                            ->count();

        $employeeIds = User::where('manager_id', $user->id)->pluck('id');

        $taskCount = Task::whereIn('assigned_to', $employeeIds)->count();

        $completedTaskCount = Task::whereIn('assigned_to', $employeeIds)
                                ->where('status', 'Completed')
                                ->count();

        $pendingTaskCount = Task::whereIn('assigned_to', $employeeIds)
                                ->where('status', 'Pending')
                                ->count();

        $inProgressTaskCount = Task::whereIn('assigned_to', $employeeIds)
                                ->where('status', 'In Progress')
                                ->count();

        $overdueTaskCount = Task::whereIn('assigned_to', $employeeIds)
                                ->where('status', '!=', 'Completed')
                                ->where('due_date', '<', now())
                                ->count();

        $noDeadlineTaskCount = Task::whereIn('assigned_to', $employeeIds)
                                ->whereNull('due_date')
                                ->count();

        $tasksDueTodayCount = Task::whereIn('assigned_to', $employeeIds)
                                ->whereDate('due_date', now()->toDateString())
                                ->count();

        return view('admin.dashboard', [
            'user' => $user,
            'employeeCount' => $employeeCount,
            'taskCount' => $taskCount,
            'completedTaskCount' => $completedTaskCount,
            'pendingTaskCount' => $pendingTaskCount,
            'inProgressTaskCount' => $inProgressTaskCount,
            'overdueTaskCount' => $overdueTaskCount,
            'noDeadlineTaskCount' => $noDeadlineTaskCount,
            'tasksDueTodayCount' => $tasksDueTodayCount,
        ]);
    }

    // TASKS CRUD

    public function create() 
    {
        $user = Auth::user();
        
        $employees = User::where('manager_id', $user->id)
                         ->where('role', 'employee')
                         ->get();
    
        return view('admin.task.create', ['user' => $user, 'employees' => $employees]);
    }

    public function storeTask(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'assigned_to' => 'required|exists:users,id',
        ]);

        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'assigned_to' => $request->input('assigned_to'),
            'admin_id' => Auth::id(),
        ]);

        return redirect()->route('admin.task.index')->with('success', 'Task created successfully.');
    }

    public function viewTasks(Request $request) 
    {
        $user = Auth::user();
        
        $tasksQuery = Task::with('assignedUser')->where('admin_id', $user->id);

        if ($request->has('filter')) {
            $filter = $request->input('filter');

            switch ($filter) {
                case 'due_today':
                    $tasksQuery->whereDate('due_date', now()->format('Y-m-d'));
                    break;
                case 'no_deadline':
                    $tasksQuery->whereNull('due_date');
                    break;
                case 'overdue':
                    $tasksQuery->where('due_date', '<', now());
                    break;
            }
        }

        $tasks = $tasksQuery->get();

        return view('admin.task.index', ['user' => $user, 'tasks' => $tasks, 'currentFilter' => $request->input('filter')]);
    }

    public function editTask($id)
    {
        $user = Auth::user();
        $task = Task::findOrFail($id);
        $employees = User::where('manager_id', $user->id)
                        ->where('role', 'employee')
                        ->get();

        return view('admin.task.edit', [
            'user' => $user,
            'task' => $task,
            'employees' => $employees,
        ]);
    }

    public function updateTask(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'assigned_to' => 'required|exists:users,id',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'assigned_to' => $request->input('assigned_to'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin.task.index')->with('success', 'Task updated successfully.');
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->route('admin.task.index')->with('success', 'Task deleted successfully.');
    }

    // USERS/EMPLOYEES CRUD

    public function viewUsers() 
    {

        $user = Auth::user();
        $users = User::where('manager_id', $user->id)->get();

        return view('admin.user.index', ['user' => $user, 'users' => $users]);
    }

    public function createUser() 
    {

        $user = Auth::user();

        return view('admin.user.create', ['user' => $user]);
    }

    public function storeUser(Request $request) 
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ], [
            'email.unique' => 'The email address you provided is already in use. Please use a different email address.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'employee',
            'manager_id' => Auth::id(),
        ]);

        \Mail::to($request->email)->send(new \App\Mail\WelcomeMail($newUser, $request->password));

        return redirect()->route('admin.user.index')->with('success', 'User created successfully and email sent!');
    }

    public function editUser($id)
    {
        $user = Auth::user();
        $editUser = User::findOrFail($id);

        return view('admin.user.edit', ['user' => $user, 'editUser' => $editUser]);
    }

    public function updateUser(Request $request, $id)
    {
        $editUser = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8', // Password is optional for update
        ], [
            'email.unique' => 'The email address you provided is already in use. Please use a different email address.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $editUser->name = $request->name;
        $editUser->email = $request->email;

        if ($request->filled('password')) {
            $editUser->password = Hash::make($request->password);
        }

        $editUser->save();

        \Mail::to($editUser->email)->send(new \App\Mail\UserUpdatedMail($editUser, $request->password));

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully and email has been sent!');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully!');
    }

    public function downloadTaskFile($id)
    {
        $taskFile = TaskFile::findOrFail($id);

        return Storage::disk('public')->download($taskFile->file_path, $taskFile->file_name);
    }

    public function notifications() 
    {

        $user = Auth::user();

        return view('admin.notifications', ['user' => $user]);
    }

    // public function register(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|max:20',
    //         'email' => 'required|email|max:30|unique:admins',
    //         'password' => 'required|min:5|max:16',
    //         'confirm_password' => 'required|min:5|max:16|same:password'
    //     ]);
    
    //     if ($validator->fails()){
    //         return response()->json([
    //             'message'=> 'Failed',
    //             'errors' => $validator->errors()
    //         ], 422);
    //     }
    
    //     $user = Admin::create([
    //         'name'=>$request->name,
    //         'email'=>$request->email,
    //         'password'=>Hash::make($request->password)
    //     ]);
    
    //     return response()->json([
    //         'message'=> 'Registration successful',
    //         'data'=>$user
    //     ], 200);
    // }
    
    // //LOGIN FUNCTION
    // public function login(Request $request) {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email|max:30',
    //         'password' => 'required|min:5|max:16',
    //     ]);
    
    //     if($validator->fails()) {
    //         return response()->json([
    //             'message' => 'Validation failed',
    //             'errors' => $validator->errors()
    //         ], 422);
    //     }
    
    //     $user = Admin::where('email', $request->email)->first();
    
    //     if($user) {
    //         if(Hash::check($request->password, $user->password)) {
    
    //             return response()->json([
    //                 'message' => 'Login successful',
    //                 'data' => $user
    //             ], 200);
    //         } else {
    //             return response()->json([
    //                 'message' => 'Incorrect credentials'
    //             ], 400);
    //         }
    //     }
    // }
    
    // //LOGOUT FUNCTION
    // public function logout(Request $request){
    
    //     Auth::logout();
    //     Session::flush();
    //     return response()->json([
    //         'message' => 'user successfully logged out',
    //     ], 200);
    // }

}
