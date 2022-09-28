<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\todo;


class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */public function run()
    {
    todos::create($param);
    $param = [
        'content' => 'aaa'
    ];
    
    }
}
