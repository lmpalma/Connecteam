<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use App\Models\TaskFile;
use App\Models\Notification;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Exports\UsersExport;
use App\Exports\TasksExport;
use App\Exports\CombinedExport;
use Maatwebsite\Excel\Facades\Excel;

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
                                ->whereDate('due_date', '<', now()->toDateString())
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

        $task = Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'assigned_to' => $request->input('assigned_to'),
            'admin_id' => Auth::id(),
        ]);

        $notification = new Notification([
            'user_id' => $request->input('assigned_to'),
            'type' => 'New Task Assigned',
            'message' => "You have been assigned a new task: <strong>{$task->title}</strong>. Please take a moment to review it and start working on it.",
        ]);
    
        $notification->save();

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
                    $tasksQuery->whereDate('due_date', '<', now()->format('Y-m-d'));
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

        $oldStatus = $task->status;

        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'assigned_to' => $request->input('assigned_to'),
            'status' => $request->input('status'),
        ]);

        if ($request->input('status') === 'In Progress' && $oldStatus !== 'In Progress') {
            $notification = new Notification([
                'user_id' => $task->assigned_to,
                'type' => 'Task Status Updated',
                'message' => "The status for <strong>{$task->title}</strong> has been updated to In Progress.",
            ]);
            $notification->save();
        } elseif ($request->input('status') === 'Completed' && $oldStatus !== 'Completed') {
            $notification = new Notification([
                'user_id' => $task->assigned_to,
                'type' => 'Task Marked Completed',
                'message' => "The task <strong>{$task->title}</strong> has been marked completed.",
            ]);
            $notification->save();
        }

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
            'password' => 'nullable|string|min:8',
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

    // OTHERS

    public function downloadTaskFile($id)
    {
        $taskFile = TaskFile::findOrFail($id);

        return Storage::disk('public')->download($taskFile->file_path, $taskFile->file_name);
    }

    public function viewNotifications() 
    {

        $user = Auth::user();

        $notifications = Notification::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.notifications', [
            'user' => $user,
            'notifications' => $notifications,
        ]);
    }

    public function fetchNotifications()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $hasNewNotifications = $notifications->isNotEmpty();

        return response()->json([
            'notifications' => $notifications,
            'hasNewNotifications' => $hasNewNotifications,
        ]);
    }

    public function deleteNotif($id)
    {
        $notification = Notification::findOrFail($id);

        $notification->delete();

        return redirect()->route('admin.notifications')->with('success', 'Notification deleted successfully.');
    }

    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'employees.xlsx');
    }

    public function exportTasks()
    {
        return Excel::download(new TasksExport, 'tasks.xlsx');
    }

    public function exportCombined()
    {
        return Excel::download(new CombinedExport, 'employees_and_tasks.xlsx');
    }
}
