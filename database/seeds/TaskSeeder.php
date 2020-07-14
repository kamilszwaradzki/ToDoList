<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $contents = Storage::get('tasks.txt'); // storage/app/tasks.txt
        $contents = Str::of($contents)->split('/[\n]+/');
        $contents = collect($contents);


        foreach($contents as $row)
        DB::table('tasks')->insert([
            'content' => $row,
            'status' => random_int(0,1) // random status <0,1>
        ]);
    }
}
