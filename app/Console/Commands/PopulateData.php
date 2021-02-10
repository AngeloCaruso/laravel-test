<?php

namespace App\Console\Commands;

use CitiesTableSeeder;
use ClientsTableSeeder;
use Illuminate\Console\Command;
use UsersTableSeeder;

class PopulateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:fill {users : Amount of users} {cities : Amount of cities} {clients : Amount of clients}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populates data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $nclients =  $this->argument('clients');
        $nUsers =  $this->argument('users');
        $nCities =  $this->argument('cities');

        $this->info('Generating users...');
        $usersSeeder = new UsersTableSeeder($nUsers);
        $usersSeeder->run();
        $this->info('Done.');
        
        $this->info('Generating cities...');
        $citiesSeeder = new CitiesTableSeeder($nCities);
        $citiesSeeder->run();
        $this->info('Done.');

        $this->info('Generating clients...');
        $clientsSeeder = new ClientsTableSeeder($nclients);
        $clientsSeeder->run();
        $this->info('Done.');

        return 0;
    }
}
