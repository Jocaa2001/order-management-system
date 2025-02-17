<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Supplier;
use App\Models\Part;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        

        $heading = true;
        $input_file = fopen(base_path("database/data/suppliers.csv"), "r");

         while (($record = fgetcsv($input_file, 1000, ",")) !== FALSE)
        {
          
            
            if (!$heading)
            {

               

                Order::firstOrCreate([
                    'priority' => !empty($record[2]) ? $record[2] : null,
                    'quantity' => !empty($record[5]) ? $record[5] : null,
                    'condition' => !empty($record[7]) ? $record[7] : null,
                    'days_valid' => !empty($record[1]) ? $record[1] : null,
                    'supplier_id' => !empty($record[0]) ? Supplier::where('name', $record[0])->value('id') : null,

                    //nakon konsultacija promenio sam da se part_id trazi samo po numberu
                    'part_id' => !empty($record[3]) ? Part::where('number', $record[3])->value('id') : null,
                ]);
            }
            $heading = false;
        }
        fclose($input_file); 


    }
}
