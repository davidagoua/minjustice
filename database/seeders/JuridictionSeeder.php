<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JuridictionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('juridictions')->insert([
            ["nom"=>"Tribunal de Dabou", "type"=>1],
            ["nom"=>"Tribunal de première instance d’Abidjan", "type"=>1],
            ["nom"=>"Tribunal de première instance de Yopougon", "type"=>1],
            ["nom"=>"Tribunal de première instance d’Abengourou", "type"=>1],
            ["nom"=>"Tribunal de première instance de Divo", "type"=>1],
            ["nom"=>"Tribunal de première instance de Bouaké", "type"=>1],
            ["nom"=>"Cour d’appel de Korhogo", "type"=>1],
            ["nom"=>"Tribunal de première instance de San-Pedro", "type"=>1],
            ["nom"=>"Tribunal de première instance de Man", "type"=>1],
            ["nom"=>"Tribunal de première instance de Daloa", "type"=>1],
            ["nom"=>"Tribunal de première instance de Bouaflé", "type"=>1],

        ]);
    }
}
