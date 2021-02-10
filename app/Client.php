<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['code', 'name', 'cities_id'];

    public function city()
    {
        return $this->belongsTo(City::class, 'cities_id', 'id');
    }

    public function scopeCityFilter($query, $value)
    {
        if (!empty($value)) {
            return  $query->where('cities_id', $value);
        }
    }
}
