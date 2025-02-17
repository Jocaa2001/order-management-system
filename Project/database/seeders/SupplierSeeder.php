<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Supplier::truncate();
        Schema::enableForeignKeyConstraints();

        $heading = true;
        $input_file = fopen(base_path("database/data/suppliers.csv"), "r");

        while (($record = fgetcsv($input_file, 1000, ",")) !== FALSE)
        {
          
            
            if (!$heading)
            {

                $supplierName = $record[0];

                if ($supplierName == '') continue;

                Supplier::firstOrCreate(["name" => $supplierName]);

            }
            $heading = false;
        }
        fclose($input_file);

    }
}
