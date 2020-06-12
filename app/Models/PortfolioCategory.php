<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Portfolio;

class PortfolioCategory extends Model
{
    //
    public function portfolio(){
        return $this->hasMany(Portfolio::class,'category');
    }
}
