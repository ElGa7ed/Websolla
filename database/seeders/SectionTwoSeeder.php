<?php

namespace Database\Seeders;

use App\Models\SectionTwo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionTwoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SectionTwo::create([
            'name' => 'test2',
            'birthdates' => '2022-11-02',
            'created_at' => '2022-11-02 10:33:46',
        ]);
        SectionTwo::create([
            'name' => 'test22',
            'birthdates' => '2022-11-02',
            'created_at' => '2022-11-02 10:33:46',
        ]);
        SectionTwo::create([
            'name' => 'test23',
            'birthdates' => '2022-11-02',
            'created_at' => '2022-11-02 10:33:46',
        ]);
        SectionTwo::create([
            'name' => 'test24',
            'birthdates' => '2022-11-02',
            'created_at' => '2022-11-02 10:33:46',
        ]);
    }
}
