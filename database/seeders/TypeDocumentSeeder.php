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
            /*
            [
                "intitule"=>"Certificat de nationalite",
                "type"=>"Ivoirien par filiation",
                "documents_requis"=>[
                    "extrait d'acte de naissance ou du livret de famille",
                    "un certificat de nationalité
ivoirienne ou d’une carte nationalité d'identité ou par témoignage"
                ],
            ],
            [
                "intitule"=>"Certificat de nationalite",
                "type"=>"Ivoirien par effet extensif de l’acquisition de la nationalité du père
et/ou de la mère",
                "documents_requis"=>[
                    "un extrait d'acte de naissance de l’intéressé",
                    "une copie du document acquisitif de la nationalité du père et/ou de la mère (Décret
de naturalisation, certificat d’acquisition de la nationalité ivoirienne par
déclaration, attestation d’acquisition par mariage délivré par la DACP)"
                ],
            ],
            [
                "intitule"=>"Certificat de nationalite",
                "type"=>"Ivoirien par naissance sur le sol ivoirien de parents inconnus",
                "documents_requis"=>[
                    "un extrait d'acte de naissance sans mentions des père et mère",
                    "une copie de l'ordonnance du juge des tutelles reconnaissant la qualité d'enfant
trouvé"
                ],
            ],
            [
                "intitule"=>"Certificat de nationalite",
                "type"=>"Ivoirien par adoption",
                "specificite"=>"L'enfant qui a fait l'objet d'une légitimation adoptive acquiert la nationalité ivoirienne si l'un des parents adoptifs est ivoirien.",
                "documents_requis"=>[
                    "Un original de l’extrait d’acte de naissance du demandeur ",
                    "Une expédition du jugement de légitimation adoptive",
                    "Un certificat de nationalité ivoirienne ou carte nationale d'identité d'un des époux adoptifs ou témoignage",
                ],
            ],
            [
                "intitule"=>"Certificat de nationalite",
                "type"=>"Ivoirien par adoption",
                "specificite"=>"Autres cas ",
                "documents_requis"=>[
                    "Un original de l’extrait d’acte de  naissance du demandeur  ",
                    "Une expédition du jugement d’adoption",
                    "Un certificat de nationalité ivoirienne ou carte nationale d'identité d'un des époux adoptifs ou témoignage",
                ],
            ],
            [
                "intitule"=>"Certificat de nationalite",
                "type"=>"Ivoirien par déclaration",
                "specificite"=>"Avant le 15 juillet 2005 ",
                "documents_requis"=>[
                    "Un original de l’extrait d’acte de  naissance du demandeur  ",
                    "Une expédition du jugement d’adoption",
                    "Un certificat de nationalité ivoirienne ou carte nationale d'identité d'un des époux adoptifs ou témoignage",
                ],
            ],
            [
                "intitule"=>"Certificat de nationalite",
                "type"=>"Ivoirien par déclaration",
                "specificite"=>"Autres cas ",
                "documents_requis"=>[
                    "Un original de l’extrait d’acte de  naissance du demandeur  ",
                    "Une expédition du jugement d’adoption",
                    "Un certificat de nationalité ivoirienne ou carte nationale d'identité d'un des époux adoptifs ou témoignage",
                ],
            ],

            */
        ]);
    }
}
