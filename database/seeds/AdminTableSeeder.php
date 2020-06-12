<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            "name"=>"Online Web Tutor",
            "email"=>"online@gmail.com",
            "password"=>Hash::make("online123")
        );

        Admin::insert($data);

    }
}
