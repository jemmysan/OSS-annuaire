<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(['name' => 'Agriculture',]);
        DB::table('tags')->insert(['name' => 'Application mobile',]);
        DB::table('tags')->insert(['name' => 'Art',]);
        DB::table('tags')->insert(['name' => 'Artisanat',]);
        DB::table('tags')->insert(['name' => 'Assistance vocale',]);
        DB::table('tags')->insert(['name' => 'Assurance',]);
        DB::table('tags')->insert(['name' => 'Automatisation',]);
        DB::table('tags')->insert(['name' => 'Automobile',]);
        DB::table('tags')->insert(['name' => 'Banque',]);
        DB::table('tags')->insert(['name' => 'Banque en ligne',]);
        DB::table('tags')->insert(['name' => 'Batiment',]);
        DB::table('tags')->insert(['name' => 'Bien être',]);
        DB::table('tags')->insert(['name' => 'Car services',]);
        DB::table('tags')->insert(['name' => 'Charité',]);
        DB::table('tags')->insert(['name' => 'Cloud',]);
        DB::table('tags')->insert(['name' => 'Coaching',]);
        DB::table('tags')->insert(['name' => 'Commerce',]);
        DB::table('tags')->insert(['name' => 'Communication',]);
        DB::table('tags')->insert(['name' => 'Communication & Media',]);
        DB::table('tags')->insert(['name' => 'Compliance',]);
        DB::table('tags')->insert(['name' => 'Construction',]);
        DB::table('tags')->insert(['name' => 'Consulting',]);
        DB::table('tags')->insert(['name' => 'Contenu',]);
        DB::table('tags')->insert(['name' => 'Credit',]);
        DB::table('tags')->insert(['name' => 'DataCenter',]);
        DB::table('tags')->insert(['name' => 'Design',]);
        DB::table('tags')->insert(['name' => 'Divertissement',]);
        DB::table('tags')->insert(['name' => 'Drone',]);
        DB::table('tags')->insert(['name' => 'E-commerce',]);
        DB::table('tags')->insert(['name' => 'Education',]);
        DB::table('tags')->insert(['name' => 'Efficacité',]);
        DB::table('tags')->insert(['name' => 'Energie',]);
        DB::table('tags')->insert(['name' => 'Environnement',]);
        DB::table('tags')->insert(['name' => 'Ergonomie',]);
        DB::table('tags')->insert(['name' => 'Evénementiel',]);
        DB::table('tags')->insert(['name' => 'Finance',]);
        DB::table('tags')->insert(['name' => 'Formation',]);
        DB::table('tags')->insert(['name' => 'Fraude',]);
        DB::table('tags')->insert(['name' => 'Fundraising',]);
        DB::table('tags')->insert(['name' => 'Géolocalisation',]);
        DB::table('tags')->insert(['name' => 'Immobilier',]);
        DB::table('tags')->insert(['name' => 'Industrie',]);
        DB::table('tags')->insert(['name' => 'Informatique',]);
        DB::table('tags')->insert(['name' => 'Internet des Objets',]);
        DB::table('tags')->insert(['name' => 'IoT consumer',]);
        DB::table('tags')->insert(['name' => 'IoT industry',]);
        DB::table('tags')->insert(['name' => 'Juridique',]);
        DB::table('tags')->insert(['name' => 'Livraison',]);
        DB::table('tags')->insert(['name' => 'Logistique',]);
        DB::table('tags')->insert(['name' => 'Marketing Digital',]);
        DB::table('tags')->insert(['name' => 'Media',]);
        DB::table('tags')->insert(['name' => 'Mobile',]);
        DB::table('tags')->insert([ 'name' => 'Mobile money',]);
        DB::table('tags')->insert([ 'name' => 'Mode',]);
        DB::table('tags')->insert([ 'name' => 'Paiement',]);
        DB::table('tags')->insert([ 'name' => 'Plateforme en ligne',]);
        DB::table('tags')->insert([ 'name' => 'Programmation',]);
        DB::table('tags')->insert([ 'name' => ' Publicité',]);
        DB::table('tags')->insert([ 'name' => 'Reconnaissance vocale',]);
        DB::table('tags')->insert([ 'name' => 'Réseau',]);
        DB::table('tags')->insert([ 'name' => ' Ressources Humaines',]);
        DB::table('tags')->insert([ 'name' => ' Restauration',]);
        DB::table('tags')->insert([ 'name' => 'Roaming ',]);
        DB::table('tags')->insert([ 'name' => 'Santé',]);
        DB::table('tags')->insert([ 'name' => 'Securité',]);
        DB::table('tags')->insert([ 'name' => ' Service public',]);
        DB::table('tags')->insert([ 'name' => 'Services',]);
        DB::table('tags')->insert([ 'name' => ' Skills management',]);
        DB::table('tags')->insert([ 'name' => 'Smart Agriculture',]);
        DB::table('tags')->insert([ 'name' => ' Smart Building',]);
        DB::table('tags')->insert([ 'name' => 'Smart Cars',]);
        DB::table('tags')->insert([ 'name' => 'Smart Cities',]);
        DB::table('tags')->insert([ 'name' => 'Smart Grid',]);
        DB::table('tags')->insert([ 'name' => 'Smart Home ',]);
        DB::table('tags')->insert([ 'name' => 'Smart parking',]);
        DB::table('tags')->insert([ 'name' => 'Soins de la famille',]);
        DB::table('tags')->insert([ 'name' => ' Sport',]);
        DB::table('tags')->insert([ 'name' => 'Stockage de fichiers',]);
        DB::table('tags')->insert([ 'name' => ' Streaming',]);
        DB::table('tags')->insert([ 'name' => ' Support client',]);
        DB::table('tags')->insert([ 'name' => 'Talent Management',]);
        DB::table('tags')->insert([ 'name' => ' Technologie',]);
        DB::table('tags')->insert([ 'name' => ' Tourisme',]);
        DB::table('tags')->insert([ 'name' => 'Vente au détail',]);
        DB::table('tags')->insert([ 'name' => 'Video à la demande',]);
        DB::table('tags')->insert([ 'name' =>  'Voyage',]);

    }
}
