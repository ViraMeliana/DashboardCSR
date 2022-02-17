<?php

namespace Database\Seeders;

use App\Models\Pilar;
use Illuminate\Database\Seeder;

class PilarsTableSeeder extends Seeder
{
    public function run()
    {
        $pilars = [
            [
                'id'    => 1,
                'name' => 'sosial',
            ],
            [
                'id'    => 2,
                'name' => 'ekonomi',
            ],
            [
                'id'    => 3,
                'name' => 'lingkungan',
            ],
            [
                'id'    => 4,
                'name' => 'hukum-tata-kelola',
            ],
        ];

        Pilar::insert($pilars);
    }
}
