<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secteurs')->insert(['secteur' => 'Agriculture',]);
        DB::table('secteurs')->insert(['secteur' => 'Application mobile',]);
        DB::table('secteurs')->insert(['secteur' => 'Art',]);
        DB::table('secteurs')->insert(['secteur' => 'Artisanat',]);
        DB::table('secteurs')->insert(['secteur' => 'Assistance vocale',]);
        DB::table('secteurs')->insert(['secteur' => 'Assurance',]);
        DB::table('secteurs')->insert(['secteur' => 'Automatisation',]);
        DB::table('secteurs')->insert(['secteur' => 'Automobile',]);
        DB::table('secteurs')->insert(['secteur' => 'Banque',]);
        DB::table('secteurs')->insert(['secteur' => 'Banque en ligne',]);
        DB::table('secteurs')->insert(['secteur' => 'Batiment',]);
        DB::table('secteurs')->insert(['secteur' => 'Bien être',]);
        DB::table('secteurs')->insert(['secteur' => 'Car services',]);
        DB::table('secteurs')->insert(['secteur' => 'Charité',]);
        DB::table('secteurs')->insert(['secteur' => 'Cloud',]);
        DB::table('secteurs')->insert(['secteur' => 'Coaching',]);
        DB::table('secteurs')->insert(['secteur' => 'Commerce',]);
        DB::table('secteurs')->insert(['secteur' => 'Communication',]);
        DB::table('secteurs')->insert(['secteur' => 'Communication & Media',]);
        DB::table('secteurs')->insert(['secteur' => 'Compliance',]);
        DB::table('secteurs')->insert(['secteur' => 'Construction',]);
        DB::table('secteurs')->insert(['secteur' => 'Consulting',]);
        DB::table('secteurs')->insert(['secteur' => 'Contenu',]);
        DB::table('secteurs')->insert(['secteur' => 'Credit',]);
        DB::table('secteurs')->insert(['secteur' => 'DataCenter',]);
        DB::table('secteurs')->insert(['secteur' => 'Design',]);
        DB::table('secteurs')->insert(['secteur' => 'Divertissement',]);
        DB::table('secteurs')->insert(['secteur' => 'Drone',]);
        DB::table('secteurs')->insert(['secteur' => 'E-commerce',]);
        DB::table('secteurs')->insert(['secteur' => 'Education',]);
        DB::table('secteurs')->insert(['secteur' => 'Efficacité',]);
        DB::table('secteurs')->insert(['secteur' => 'Energie',]);
        DB::table('secteurs')->insert(['secteur' => 'Environnement',]);
        DB::table('secteurs')->insert(['secteur' => 'Ergonomie',]);
        DB::table('secteurs')->insert(['secteur' => 'Evénementiel',]);
        DB::table('secteurs')->insert(['secteur' => 'Finance',]);
        DB::table('secteurs')->insert(['secteur' => 'Formation',]);
        DB::table('secteurs')->insert(['secteur' => 'Fraude',]);
        DB::table('secteurs')->insert(['secteur' => 'Fundraising',]);
        DB::table('secteurs')->insert(['secteur' => 'Géolocalisation',]);
        DB::table('secteurs')->insert(['secteur' => 'Immobilier',]);
        DB::table('secteurs')->insert(['secteur' => 'Industrie',]);
        DB::table('secteurs')->insert(['secteur' => 'Informatique',]);
        DB::table('secteurs')->insert(['secteur' => 'Internet des Objets',]);
        DB::table('secteurs')->insert(['secteur' => 'IoT consumer',]);
        DB::table('secteurs')->insert(['secteur' => 'IoT industry',]);
        DB::table('secteurs')->insert(['secteur' => 'Juridique',]);
        DB::table('secteurs')->insert(['secteur' => 'Livraison',]);
        DB::table('secteurs')->insert(['secteur' => 'Logistique',]);
        DB::table('secteurs')->insert(['secteur' => 'Marketing Digital',]);
        DB::table('secteurs')->insert(['secteur' => 'Media',]);
        DB::table('secteurs')->insert(['secteur' => 'Mobile',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Mobile money',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Mode',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Paiement',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Plateforme en ligne',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Programmation',]);
        DB::table('secteurs')->insert([ 'secteur' => ' Publicité',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Reconnaissance vocale',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Réseau',]);
        DB::table('secteurs')->insert([ 'secteur' => ' Ressources Humaines',]);
        DB::table('secteurs')->insert([ 'secteur' => ' Restauration',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Roaming ',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Santé',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Securité',]);
        DB::table('secteurs')->insert([ 'secteur' => ' Service public',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Services',]);
        DB::table('secteurs')->insert([ 'secteur' => ' Skills management',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Smart Agriculture',]);
        DB::table('secteurs')->insert([ 'secteur' => ' Smart Building',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Smart Cars',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Smart Cities',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Smart Grid',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Smart Home ',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Smart parking',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Soins de la famille',]);
        DB::table('secteurs')->insert([ 'secteur' => ' Sport',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Stockage de fichiers',]);
        DB::table('secteurs')->insert([ 'secteur' => ' Streaming',]);
        DB::table('secteurs')->insert([ 'secteur' => ' Support client',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Talent Management',]);
        DB::table('secteurs')->insert([ 'secteur' => ' Technologie',]);
        DB::table('secteurs')->insert([ 'secteur' => ' Tourisme',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Vente au détail',]);
        DB::table('secteurs')->insert([ 'secteur' => 'Video à la demande',]);
        DB::table('secteurs')->insert([ 'secteur' =>  'Voyage',]);


           }
}
