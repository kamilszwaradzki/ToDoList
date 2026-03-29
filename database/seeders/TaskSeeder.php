<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = Storage::get('tasks.txt'); // storage/app/tasks.txt
        $contents = Str::of($contents)->split('/[\n]+/');
        $contents = collect($contents);

        foreach ($contents as $row) {
            DB::table('tasks')->insert([
                'content' => $row,
                'status' => random_int(0, 1) // random status <0,1>
            ]);
        }
    }
}
