<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index(){
        // eager loading
        $portfolios = Portfolio::with('type', 'technologies')->paginate(20);
        return response()-> json([
            "success" => true,
            "results" =>$portfolios
        ]   
    );
    }
    public function show(Portfolio $portfolio){
        return response()-> json([
            "success" => true,
            "results" => $portfolio
        ]   
    );    
    }

    public function search(Request $request){
        $data = $request->all();

        if (isset($data['name'])){
            // name è quello che metto nella query string, intesa come key nella ricerca 
            // link + ? + name=..
            $string = $data['name'];
            // dd($string);
            $portfolios = Portfolio::where('Project', 'LIKE', "%{$string}%")->get();
            // dd($portfolio);
        } else if(is_null($data['name'])){
            $portfolios = Portfolio::all();
        } else {
            abort(404);
        }
        return response()-> json([
            "success" => true,
            "results" => $portfolios,
            "matches" => count($portfolios),
        ]   
        );    
    }
}
