<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
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
        factory(Client::class, (int) $this->size)->create();
    }
}
