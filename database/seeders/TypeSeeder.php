<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types=[
            'full-stack',
            'front-end',
            'back-end'
        ];
        
        foreach ($types as $singleType) {
            $type = new Type();
            $type->name= $singleType ;
            $type->color = $faker->hexColor();
            $type->save();

        }
    }
}
