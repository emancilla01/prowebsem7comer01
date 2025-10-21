<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Departamento::factory()->count(8)->create();
    }
}
