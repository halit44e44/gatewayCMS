<?php

namespace Database\Seeders;

use App\Models\Flag;
use Illuminate\Database\Seeder;

class CreateFlagSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flag=new Flag();
        $flag->id=1;
        $flag->keys='transaction';   
        $flag->value=false;   
        $flag->save();
    }
}
