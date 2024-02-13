<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        $user = new User();
        $user->name = "shovo";
        $user->email = "shovom677@gmail.com";
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('admin');


        $user = new User();
        $user->name = "arif";
        $user->email = "arifom677@gmail.com";
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('writter');

        $user = new User();
        $user->name = "user";
        $user->email = "uservom677@gmail.com";
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('user');


        

        // $writer= User::create([

        //     'name'=>'MD Arif',
        //     'email'=>'arifom677@gmail.com',
        //     'password'=>Hash::make('password'),
           

        // ]);

        // $writer->assignRole('writter');




        // dami baba anak gulo banaita hola 

        // User::factory(10)->create();
    }
}
