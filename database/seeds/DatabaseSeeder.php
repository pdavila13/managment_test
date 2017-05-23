<?php

use Illuminate\Database\Seeder;
use Scool\Curriculum\Database\Seeds\CurriculumSeeder;
use Scool\Curriculum\Database\Seeds\LawsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUserSeeder::class);
        $this->call(CurriculumSeeder::class);
        $this->call(LawsTableSeeder::class);
    }
}
