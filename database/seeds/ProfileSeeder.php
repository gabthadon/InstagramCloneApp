<?php

use Illuminate\Database\Seeder;
use App\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Profile::create([
        'user_id'=>1,
        'title'=>'My Title',
        'description'=>'An Instagram Clone',
        'url'=>'www.instagram.com',

      ]);


    }
}
