<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Task::where('admin_id', auth()->user()->id)
                   ->with('assignedUser')
                   ->get();
    }

    public function headings(): array
    {
        return [
            'ID', 'Title', 'Description', 'Assigned To', 'Due Date', 'Status', 'Admin ID', 'Created At', 'Updated At'
        ];
    }
}
