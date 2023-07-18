<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produs;

class ProduseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produse=[
            [
                'nume'=> 'Buchet din trandafiri roz și eustoma',
                'cod'=>10,
                'image'=>'1679088830.jpg',
                'pret'=>150,
                'stoc'=>100,
                'cat'=>1
                ]
            ];
            foreach ($produse as $key =>$value){
                Produs::create($value);
            }
    }
}
