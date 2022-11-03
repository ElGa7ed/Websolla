<?php

namespace Database\Seeders;

use App\Models\SectionOne;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionOneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SectionOne::create([
            'name' => 'test',
            'birthdates' => '2022-11-02',
            'created_at' => '2022-11-02 10:33:46',
        ]);
        SectionOne::create([
            'name' => 'test2',
            'birthdates' => '2022-11-02',
            'created_at' => '2022-11-02 10:33:46',
        ]);
        SectionOne::create([
            'name' => 'test3',
            'birthdates' => '2022-11-02',
            'created_at' => '2022-11-02 10:33:46',
        ]);
        SectionOne::create([
            'name' => 'test4',
            'birthdates' => '2022-11-02',
            'created_at' => '2022-11-02 10:33:46',
        ]);
    }
}
