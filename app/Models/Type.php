<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Portfolio;

class Type extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'color',
    ];
    // dico che lui è proprietario di molti projects
    public function portfolios(){
        // ha molti post di tipo model-portfolio-class
        return $this-> hasMany(Portfolio::class);
    }
}

