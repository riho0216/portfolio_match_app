<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    private $gender;

    public function __construct(Gender $gender)
    {
        $this->gender = $gender;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            [
                'name' => 'Womens',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mens',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Unisex(Adult)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Girls',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Boys',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Unisex(Kids)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Infants',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];
        $this->gender->insert($genders);
    }
}
