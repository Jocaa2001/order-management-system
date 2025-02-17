<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Supplier;
use App\Models\Part;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Order::truncate();
        Part::truncate();
        Category::truncate();
        Supplier::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
