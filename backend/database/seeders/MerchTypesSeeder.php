<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Merch_types;

class MerchTypesSeeder extends Seeder
{
   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['hoodie', 'jacket', 'trouser', 
        'v-neck-tshirt', 'round-neck-tshirt'];
        foreach($types as $type){
            $merchType = new Merch_types;
            $merchType->name = $type;
            $merchType->save();
        }
    }
}
