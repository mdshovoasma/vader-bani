<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolls = ['admin','writter','user'];
        
        foreach($rolls as $roll){

            $newRoll = new Role();
            $newRoll->name=$roll;
            $newRoll->save();

        }



    //     $newRoll = new Role();
    //    $newRoll->name="admin";
    //     $newRoll->save();
    //     $newRoll = new Role();
    //    $newRoll->name="writter";
    //     $newRoll->save();

    //     $newRoll = new Role();
    //    $newRoll->name="user";
    //     $newRoll->save();
    }
}
