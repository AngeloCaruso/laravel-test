<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    protected $size;

    public function __construct($size = null)
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
        if (is_null($this->size)) {
            DB::table('users')->insert([
                'name' => 'Admin Admin',
                'email' => 'admin@argon.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } else {
            factory(User::class, (int) $this->size)->create();
        }
    }
}
