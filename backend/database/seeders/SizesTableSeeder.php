<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    private $size;

    public function __construct(Size $size)
    {
        $this->size = $size;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            [
                'name' => '80-100',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '110-140',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'XS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Small',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Medium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Large',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'XL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'XXL',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        $this->size->insert($sizes);
    
    }
}
