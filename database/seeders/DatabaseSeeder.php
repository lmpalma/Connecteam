<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        if (User::count() === 0) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'connecteam9@gmail.com',
                'password' => Hash::make('connecteamadmin'),
                'role' => 'superadmin',
                'manager_id' => null
            ]);
        }

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        DB::table('users')->insert([
            [
                'name' => 'Joe',
                'email' => 'joe@gmail.com',
                'password' => Hash::make('joepass'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'manager_id' => null
            ],
            [
                'name' => 'Rob',
                'email' => 'rob@gmail.com',
                'password' => Hash::make('robpass'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'manager_id' => null
            ],
            [
                'name' => 'Kevin',
                'email' => 'kevin@gmail.com',
                'password' => Hash::make('kevinpass'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'manager_id' => null
            ],
            [
                'name' => 'Jake',
                'email' => 'jake@gmail.com',
                'password' => Hash::make('jakepass'),
                'role' => 'employee',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'manager_id' => '2'
            ],
            [
                'name' => 'Blake',
                'email' => 'blake@gmail.com',
                'password' => Hash::make('blakepass'),
                'role' => 'employee',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'manager_id' => '2'
            ],
            [
                'name' => 'Rake',
                'email' => 'rakee@gmail.com',
                'password' => Hash::make('rakepass'),
                'role' => 'employee',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'manager_id' => '2'
            ],
            [
                'name' => 'Robert',
                'email' => 'robert@gmail.com',
                'password' => Hash::make('robertpass'),
                'role' => 'employee',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'manager_id' => '3'
            ],
            [
                'name' => 'Joebert',
                'email' => 'joebert@gmail.com',
                'password' => Hash::make('joebertpass'),
                'role' => 'employee',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'manager_id' => '3'
            ],
            [
                'name' => 'Bobert',
                'email' => 'bobert@gmail.com',
                'password' => Hash::make('bobertpass'),
                'role' => 'employee',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'manager_id' => '3'
            ],
            [
                'name' => 'Niel',
                'email' => 'niel@gmail.com',
                'password' => Hash::make('nielpass'),
                'role' => 'employee',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'manager_id' => '4'
            ],
            [
                'name' => 'Shaquille',
                'email' => 'shaquille@gmail.com',
                'password' => Hash::make('shaquillepass'),
                'role' => 'employee',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'manager_id' => '4'
            ],
            [
                'name' => 'Joe2',
                'email' => 'joe2@gmail.com',
                'password' => Hash::make('joe2pass'),
                'role' => 'employee',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'manager_id' => '4'
            ],
    ]);
    DB::table('tasks')->insert([
        [
            'title' => 'Jake Task 1',
            'description' => 'Task Description',
            'due_date' => '2024-10-19',
            'assigned_to' => '5',
            'status' => 'Pending',
            'admin_id' => '2',
        ],
        [
            'title' => 'Jake Task 2',
            'description' => 'Task Description',
            'due_date' => '2024-10-20',
            'assigned_to' => '5',
            'status' => 'Pending',
            'admin_id' => '2',
        ],
        [
            'title' => 'Blake Task 1',
            'description' => 'Task Description',
            'due_date' => '2024-10-21',
            'assigned_to' => '6',
            'status' => 'Pending',
            'admin_id' => '2',
        ],
        [
            'title' => 'Blake Task 2',
            'description' => 'Task Description',
            'due_date' => '2024-10-20',
            'assigned_to' => '6',
            'status' => 'Pending',
            'admin_id' => '2',
        ],
        [
            'title' => 'Rake Task 1',
            'description' => 'Task Description',
            'due_date' => '2024-10-22',
            'assigned_to' => '7',
            'status' => 'Pending',
            'admin_id' => '2',
        ],
        [
            'title' => 'Rake Task 2',
            'description' => 'Task Description',
            'due_date' => '2024-10-19',
            'assigned_to' => '7',
            'status' => 'Pending',
            'admin_id' => '2',
        ],
        [
            'title' => 'Robert Task 1',
            'description' => 'Task Description',
            'due_date' => '2024-10-23',
            'assigned_to' => '8',
            'status' => 'Pending',
            'admin_id' => '3',
        ],
        [
            'title' => 'Robert Task 2',
            'description' => 'Task Description',
            'due_date' => '2024-10-19',
            'assigned_to' => '8',
            'status' => 'Pending',
            'admin_id' => '3',
        ],
        [
            'title' => 'Joebert Task 1',
            'description' => 'Task Description',
            'due_date' => '2024-10-20',
            'assigned_to' => '9',
            'status' => 'Pending',
            'admin_id' => '3',
        ],
        [
            'title' => 'Joebert Task 2',
            'description' => 'Task Description',
            'due_date' => '2024-10-20',
            'assigned_to' => '9',
            'status' => 'Pending',
            'admin_id' => '3',
        ],
        
        [
            'title' => 'Bobert Task 1',
            'description' => 'Task Description',
            'due_date' => '2024-10-20',
            'assigned_to' => '10',
            'status' => 'Pending',
            'admin_id' => '3',
        ],
        [
            'title' => 'Bobert Task 2',
            'description' => 'Task Description',
            'due_date' => '2024-10-21',
            'assigned_to' => '10',
            'status' => 'Pending',
            'admin_id' => '3',
        ],
        [
            'title' => 'Niel Task 1',
            'description' => 'Task Description',
            'due_date' => '2024-10-19',
            'assigned_to' => '11',
            'status' => 'Pending',
            'admin_id' => '4',
        ],
        [
            'title' => 'Niel Task 2',
            'description' => 'Task Description',
            'due_date' => '2024-10-20',
            'assigned_to' => '11',
            'status' => 'Pending',
            'admin_id' => '4',
        ],
        
        [
            'title' => 'Shaquille Task 1',
            'description' => 'Task Description',
            'due_date' => '2024-10-22',
            'assigned_to' => '12',
            'status' => 'Pending',
            'admin_id' => '4',
        ],
        [
            'title' => 'Shaquile Task 2',
            'description' => 'Task Description',
            'due_date' => '2024-10-20',
            'assigned_to' => '12',
            'status' => 'Pending',
            'admin_id' => '4',
        ],
        [
            'title' => 'Joe2 Task 1',
            'description' => 'Task Description',
            'due_date' => '2024-10-20',
            'assigned_to' => '13',
            'status' => 'Pending',
            'admin_id' => '4',
        ],
        [
            'title' => 'Joe2 Task 2',
            'description' => 'Task Description',
            'due_date' => '2024-10-20',
            'assigned_to' => '13',
            'status' => 'Pending',
            'admin_id' => '4',
        ],
    ]);
    }
}
