<?php

namespace Database\Seeders;

use App\Models\SubCriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCriteriasSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCriteria = [
            [
                'criteria_id' => '1',
                'name' => "< 1.000.000",
                'value' => 100,
            ],
            [
                'criteria_id' => '1',
                'name' => "1.000.000",
                'value' => 80,
            ],
            [
                'criteria_id' => '1',
                'name' => "2.000.000",
                'value' => 60,
            ],
            [
                'criteria_id' => '1',
                'name' => "3.000.000 s/d 4.000.000",
                'value' => 40,
            ],
            [
                'criteria_id' => '1',
                'name' => "> 5.000.000",
                'value' => 20,
            ],
            [
                'criteria_id' => '2',
                'name' => "> 10 thn",
                'value' => 100,
            ],
            [
                'criteria_id' => '2',
                'name' => "8 s/d 9 thn",
                'value' => 80,
            ],
            [
                'criteria_id' => '2',
                'name' => "6 s/d 7 thn",
                'value' => 60,
            ],
            [
                'criteria_id' => '2',
                'name' => "4 s/d 5 thn",
                'value' => 40,
            ],
            [
                'criteria_id' => '2',
                'name' => "< 4 thn",
                'value' => 20,
            ],
            [
                'criteria_id' => '3',
                'name' => "> 10 thn",
                'value' => 100,
            ],
            [
                'criteria_id' => '3',
                'name' => "8 s/d 9 thn",
                'value' => 80,
            ],
            [
                'criteria_id' => '3',
                'name' => "6 s/d 7 thn",
                'value' => 60,
            ],
            [
                'criteria_id' => '3',
                'name' => "4 s/d 5 thn",
                'value' => 40,
            ],
            [
                'criteria_id' => '3',
                'name' => "< 4 thn",
                'value' => 20,
            ],
            [
                'criteria_id' => '4',
                'name' => "Tidak Ada",
                'value' => 100,
            ],
            [
                'criteria_id' => '4',
                'name' => "Kendaraan roda 2",
                'value' => 80,
            ],
            [
                'criteria_id' => '4',
                'name' => "Kendaraan roda 2, rumah",
                'value' => 60,
            ],
            [
                'criteria_id' => '4',
                'name' => "Kendaraan roda 2, rumah, tanah",
                'value' => 40,
            ],
            [
                'criteria_id' => '4',
                'name' => "Kendaraan roda 2, rumah, tanah, dll",
                'value' => 20,
            ],
            [
                'criteria_id' => '5',
                'name' => "> 5",
                'value' => 100,
            ],
            [
                'criteria_id' => '5',
                'name' => "4",
                'value' => 80,
            ],
            [
                'criteria_id' => '5',
                'name' => "3",
                'value' => 60,
            ],
            [
                'criteria_id' => '5',
                'name' => "2",
                'value' => 40,
            ],
            [
                'criteria_id' => '5',
                'name' => "1",
                'value' => 20,
            ],
            [
                'criteria_id' => '6',
                'name' => "Warung Makan",
                'value' => 100,
            ],
            [
                'criteria_id' => '6',
                'name' => "Bengkel",
                'value' => 80,
            ],
            [
                'criteria_id' => '6',
                'name' => "Warung",
                'value' => 60,
            ],
            [
                'criteria_id' => '6',
                'name' => "Penjual bakso, mie ayam, dll",
                'value' => 40,
            ],
            [
                'criteria_id' => '6',
                'name' => "Penjual Makanan ringan",
                'value' => 20,
            ],
        ];

        SubCriteria::insert($subCriteria);
    }
}
