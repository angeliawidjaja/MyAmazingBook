<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ebooks')->insert([
            ['id' => 1, 'title' => 'The Song of Achilles', 'author' => 'Madeline Miller', 'description' => 'A'],
            ['id' => 2, 'title' => 'All the Light We Cannot See', 'author' => 'Anthony Doerr', 'description' => 'A'],
            ['id' => 3, 'title' => 'The Handmaid\'s Tale: The Graphic Novel', 'author' => 'Margaret Atwood', 'description' => 'A'],
            ['id' => 4, 'title' => 'On the Origin of Species', 'author' => 'Charles Darwin', 'description' => 'A'],
            ['id' => 5, 'title' => 'Breath: The New Science of a Lost Art', 'author' => 'James Nestor', 'description' => 'A'],
            ['id' => 6, 'title' => 'The Hill We Climb', 'author' => 'Amanda Gorman', 'description' => 'A'],
        ]);
    }
}
