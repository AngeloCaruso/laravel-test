<?php

use App\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    protected $size;

    public function __construct($size = 5)
    {
        $this->size = $size;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(City::class, (int) $this->size)->create();
    }
}
