<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PortfolioCategory;

class Portfolio extends Model
{
    //
    public function categoryname(){
        return $this->belongsTo(PortfolioCategory::class,'category','id');
    }
}
