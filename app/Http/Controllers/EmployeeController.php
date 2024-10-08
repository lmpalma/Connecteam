<?php

namespace App\Http\Controllers;

// use App\Models\employee;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Hash;

class EmployeeController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();

        $taskCount = Task::where('assigned_to', $user->id)->count();
        $overdueTaskCount = Task::where('assigned_to', $user->id)
            ->where('status', '!=', 'Completed')
            ->where('due_date', '<', now())
            ->count();
        $noDeadlineTaskCount = Task::where('assigned_to', $user->id)
            ->whereNull('due_date')
            ->count();
        $pendingTaskCount = Task::where('assigned_to', $user->id)
            ->where('status', 'Pending')
            ->count();
        $inProgressTaskCount = Task::where('assigned_to', $user->id)
            ->where('status', 'In Progress')
            ->count();
        $completedTaskCount = Task::where('assigned_to', $user->id)
            ->where('status', 'Completed')
            ->count();

        return view('employee.dashboard', [
            'user' => $user,
            'taskCount' => $taskCount,
            'overdueTaskCount' => $overdueTaskCount,
            'noDeadlineTaskCount' => $noDeadlineTaskCount,
            'pendingTaskCount' => $pendingTaskCount,
            'inProgressTaskCount' => $inProgressTaskCount,
            'completedTaskCount' => $completedTaskCount,
        ]);
    }

    public function myTasks() 
    {
        $user = Auth::user();

        $tasks = Task::where('assigned_to', $user->id)->get(); 

        return view('employee.task.index', [
            'user' => $user,
            'tasks' => $tasks
        ]);
    }

    public function editTask($id) 
    {
        $user = Auth::user();

        $task = Task::where('id', $id)
            ->where('assigned_to', $user->id)
            ->firstOrFail();

        return view('employee.task.edit', [
            'user' => $user,
            'task' => $task
        ]);
    }

    public function updateTask(Request $request, $id) 
    {
        $user = Auth::user();

        $request->validate([
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        $task = Task::where('id', $id)->where('assigned_to', $user->id)->firstOrFail();

        $task->status = $request->status;
        $task->save();

        return redirect()->route('employee.task.index')->with('success', 'Task updated successfully.');
    }

    public function viewProfile() 
    {

        $user = Auth::user();

        return view('employee.profile.index', ['user' => $user]);
    }

//     public function dashboard()
//     {
//         return view('employee.dashboard');
//     }
// //REGISTRATION FUNCTION
// public function register(Request $request){
//     $validator = Validator::make($request->all(), [
//         'name' => 'required|max:20',
//         'email' => 'required|email|max:30|unique:admins',
//         'password' => 'required|min:5|max:16',
//         'confirm_password' => 'required|min:5|max:16|same:password',
//         'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif', 
//         'details' => 'nullable|string|max:255'
//     ]);

//     if ($validator->fails()){
//         return response()->json([
//             'message'=> 'Failed',
//             'errors' => $validator->errors()
//         ], 422);
//     }

//         if ($request->has('photo')) {

//             $file = $request->file('photo');
//             $extension = $file->getClientOriginalExtension();
//             $filename = time() . '.' . $extension;
//             $path = 'uploads/category/';
//             $file->move($path, $filename);
//         }

//     $user = employee::create([
//         'name'=>$request->name,
//         'email'=>$request->email,
//         'password'=>Hash::make($request->password),
//         'photo' => $path . $filename,
//         'details' => $request->details
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

//     $user = employee::where('email', $request->email)->first();

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
