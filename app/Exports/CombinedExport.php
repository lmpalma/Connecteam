<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CombinedExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $employees = User::where('role', 'employee')
                         ->where('manager_id', auth()->user()->id)
                         ->with('assignedTasks')
                         ->get();

        $data = [];

        foreach ($employees as $employee) {
            foreach ($employee->assignedTasks as $task) {
                $data[] = [
                    'Employee ID' => $employee->id,
                    'Employee Name' => $employee->name,
                    'Employee Email' => $employee->email,
                    'Task ID' => $task->id,
                    'Task Title' => $task->title,
                    'Task Description' => $task->description,
                    'Due Date' => $task->due_date,
                    'Status' => $task->status,
                    'Created At' => $task->created_at,
                    'Updated At' => $task->updated_at,
                ];
            }
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Employee ID', 'Employee Name', 'Employee Email', 'Task ID', 'Task Title', 'Task Description', 'Due Date', 'Status', 'Created At', 'Updated At'
        ];
    }
}
