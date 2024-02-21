<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index(){
        $portfolios = Portfolio::all();
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
            $string = $data['name'];
            // dd($string);
            $portfolios = Portfolio::where('Project', 'LIKE', "%{$string}%")->get();
            // dd($portfolio);
            return response()-> json([
                "success" => true,
                "results" => $portfolios,
                "matches" => count($portfolios),
            ]   
        );    
        } else {
            abort(404);
    }
    }
}
