<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PortfolioTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $portfolios = Portfolio::all();
        $technologies = Technology::all()->pluck('id');

        foreach ($portfolios as $portfolio) {
            $portfolio->technologies()->sync($faker->randomElements($technologies,rand(1,4) ));
        }
    }
}
