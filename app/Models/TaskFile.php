<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class TaskFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id', 
        'file_path', 
        'file_name',
    ];

    public function file()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
