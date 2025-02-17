<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Part;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();
        $heading = true;
        $input_file = fopen(base_path("database/data/suppliers.csv"), "r");
        

        while (($record = fgetcsv($input_file, 1000, ",")) !== FALSE)
        {
          
            
            if (!$heading)
            {

                $categoryName = $record[8];

                if ($categoryName == '') continue;

                category::firstOrCreate(["name" => $categoryName]);

            }
            $heading = false;
        }
        fclose($input_file);


        
    }
}
