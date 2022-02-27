<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::insert([
            [
                'uuid'=>Str::uuid()->toString(),
                'name'=>'Task 1',
                'user_id'=>'73344840-4570-496f-901e-c01b8c766e85'
            ],
            [
                'uuid'=>Str::uuid()->toString(),
                'name'=>'Task 2',
                'user_id'=>'73344840-4570-496f-901e-c01b8c766e85'
            ],
            [
                'uuid'=>Str::uuid()->toString(),
                'name'=>'Task 3',
                'user_id'=>'bc2945aa-d8fd-415e-9a73-ef51e3eeb0ea'
            ]
        ]);
    }
}
