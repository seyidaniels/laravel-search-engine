<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Car extends Model
{
    use Searchable;

    protected $fillable = [
        "Name",
        "Miles_per_Gallon",
        "Cylinders",
        "Displacement",
        "Horsepower",
        "Weight_in_lbs",
        "Acceleration",
        "Year",
        "Origin",
    ];
            
}
