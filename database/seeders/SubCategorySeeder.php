<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;



class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    $electronics = ['mobile', 'TV', 'computer']; 
    $cloths = ['men', 'women', 'kids'];  

    $elec = Category::where('name', 'Electronics')->first();

    foreach ($electronics as $subCat) {
        $newSubCat = new SubCategory;
        $newSubCat->category_id = $elec->id;
        $newSubCat->name = $subCat;
        $newSubCat->save();
    }
    

    $cloth = Category::where('name', 'Cloths')->first();

    foreach ($cloths as $subCat) {
        $newSubCat = new SubCategory;
        $newSubCat->category_id = $cloth->id;
        $newSubCat->name = $subCat;
        $newSubCat->save();
    }
}

}
