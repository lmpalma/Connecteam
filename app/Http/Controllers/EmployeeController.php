<?php

namespace App\Http\Controllers;

// use App\Models\employee;
use App\Models\User;
use App\Models\Task;
use App\Models\Notification;
use Illuminate\Support\Facades\Storage;
use App\Models\TaskFile;
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
            ->whereDate('due_date', '<', now()->toDateString())
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

    public function myTasks(Request $request) 
    {
        $user = Auth::user();

        $tasksQuery = Task::where('assigned_to', $user->id);

        if ($request->has('filter')) {
            $filter = $request->input('filter');

            switch ($filter) {
                case 'Pending':
                    $tasksQuery->where('status', 'Pending');
                    break;
                case 'In Progress':
                    $tasksQuery->where('status', 'In Progress');
                    break;
                case 'Completed':
                    $tasksQuery->where('status', 'Completed');
                    break;
            }
        }

        $tasks = $tasksQuery->get();

        return view('employee.task.index', [ 'user' => $user, 'tasks' => $tasks, 'currentFilter' => $request->input('filter') ]);
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
        $task = Task::findOrFail($id);

        $request->validate([
            'task_files.*' => 'required|file',
        ]);

        if ($request->hasFile('task_files')) {
            foreach ($request->file('task_files') as $file) {
                $filePath = $file->store('task_files', 'public');

                TaskFile::create([
                    'task_id' => $task->id, 
                    'file_path' => $filePath,
                    'file_name' => $file->getClientOriginalName(),
                ]);
            }

            $notification = new Notification([
                'user_id' => $task->admin_id,
                'type' => 'Task Files Uploaded',
                'message' => "Task files have been submitted for <strong>{$task->title}</strong>. Kindly review them at your earliest convenience.",
            ]);
            $notification->save();

            return redirect()->route('employee.task.index')->with('success', 'Task files uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No task files were uploaded.');
    }

    public function viewProfile() 
    {

        $user = Auth::user();

        return view('employee.profile.index', ['user' => $user]);
    }

    public function editProfile()
    {
        $user = Auth::user();

        return view('employee.profile.edit', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->filled('name')) {
            $user->name = $request->input('name');
        }
        
        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('employee.profile.index')->with('success', 'Profile updated successfully.');
    }

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

        return view('employee.notifications', [
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

        return redirect()->route('employee.notifications')->with('success', 'Notification deleted successfully.');
    }
}
