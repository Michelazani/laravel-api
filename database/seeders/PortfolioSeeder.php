<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = array(
            array(
                'type_id' => '1',
                'Project' => 'DC Comics',
                'Author' => 'Michela',
                'Description' => 'Create a website page where you can see n numbers of comics. You can also create a new one or edit the comics in the page.'
            ),
            array(
                'type_id' => '1',
                'Project' => 'Boolflix',
                'Author' => 'Michela',
                'Description' => 'A project where you can search the film you like. You can see the reviews and the original language.'
            ),
            array(
                'type_id' => '2',
                'Project' => 'Boolzapp',
                'Author' => 'Michela',
                'Description' => 'Recreating the famous app Whatsapp. You are able to talk to your friends via text or even call them and join group calls.'
            ),
            array(
                'type_id' => '2',
                'Project' => 'Dropbox',
                'Author' => 'Michela',
                'Description' => 'Recreating the famous app Dropbox. You are able to share files with friends and collegues.'
            )
            );

            $typesId=Type::all()->pluck('id');
            
            foreach ($portfolios as $portfolio) {
                $newPortfolio = new Portfolio();
                $newPortfolio-> type_id=$portfolio['type_id'];
                $newPortfolio-> Project=$portfolio['Project'];
                $newPortfolio-> author=$portfolio['Author'];
                $newPortfolio-> description=$portfolio['Description'];
                $newPortfolio->save();
            }
    }
}
