<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Table::create([
            'name' => 'Table 1',
            'guest_number' => '2',
            'status' => 'Avalaiable',
            'location' => 'Floor 1',
        ]);
        Table::create([
            'name' => 'Table 2',
            'guest_number' => '4',
            'status' => 'Avalaiable',
            'location' => 'Floor 1',
        ]);
        Table::create([
            'name' => 'Table 4',
            'guest_number' => '6',
            'status' => 'Avalaiable',
            'location' => 'Floor 2',
        ]);
        Table::create([
            'name' => 'Table 3',
            'guest_number' => '10',
            'status' => 'Avalaiable',
            'location' => 'Floor 2',
        ]);
    }
}
