<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_documents')->insert([
            [
                "intitule"=>"Certificat de Nationalité","tag"=>"certificate-of-nationality",
                "url"=>'form.certificate-of-nationality'
            ],
            ["intitule"=>"Casier Judiciaire", "tag"=>"cm1", "url"=>""],

        ]);
    }
}
