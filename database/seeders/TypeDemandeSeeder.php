<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeDemandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_demandes')->insert([
            ['nom'=>"ETAT CIVIL", 'image'=>'assets/img/illustrations/onboarding/1a.jpg'],
            ['nom'=>"JURIDIQUE" ,'image'=>'assets/img/illustrations/onboarding/2.jpg'],
            ['nom'=>"SOCIAL ET SANTE", 'image'=>'assets/img/illustrations/onboarding/3.png']
        ]);
    }
}
