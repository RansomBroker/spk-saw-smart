<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criteria = [
            [
               'code' => 'C1',
               'name' => 'Pendapatan',
               'weight' => 20,
               'attribute' => 1
            ],
            [
                'code' => 'C2',
                'name' => 'Lama Usaha',
                'weight' => 10,
                'attribute' => 2
            ],
            [
                'code' => 'C3',
                'name' => 'Jumlah Asset',
                'weight' => 10,
                'attribute' => 2
            ],
            [
                'code' => 'C4',
                'name' => 'Jumlah Asset',
                'weight' => 10,
                'attribute' => 2
            ],
            [
                'code' => 'C5',
                'name' => 'Asset',
                'weight' => 20,
                'attribute' => 1
            ],
            [
                'code' => 'C6',
                'name' => 'Jenis Usaha',
                'weight' => 20,
                'attribute' => 1
            ],
        ];

        Criteria::insert($criteria);
    }
}
