<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::where('role', 'employee')
                   ->where('manager_id', auth()->user()->id)
                   ->get();
    }

    public function headings(): array
    {
        return [
            'ID', 'Name', 'Email', 'Role', 'Manager ID', 'Created At', 'Updated At'
        ];
    }
}
