<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Part;
use App\Models\Supplier;
use App\Models\Category;



class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Part::truncate();
        Schema::enableForeignKeyConstraints();

        $heading = true;
        $input_file = fopen(base_path("database/data/suppliers.csv"), "r");

        while (($record = fgetcsv($input_file, 1000, ",")) !== FALSE)
        {
          
            
            if (!$heading)
            {

                $partNumber = !empty($record[3]) ? $record[3] : null;
                $partDescription = !empty($record[4]) ? $record[4] : null;
                $partPrice = !empty($record[6]) ? $record[6] : null;
                $supplierId = !empty($record[0]) ? Supplier::where('name', $record[0])->value('id') : null;
                $categoryId = !empty($record[8]) ? Category::where('name', $record[8])->value('id') : null;

                Part::firstOrCreate([
                    'number' => $partNumber,
                    'description' => $partDescription,
                    'price' => $partPrice,
                    'supplier_id' => $supplierId,
                    'category_id' => $categoryId,
                ]);

            }
            $heading = false;
        }
        fclose($input_file);

    }
}
