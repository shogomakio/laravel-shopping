<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new App\Product([
            'image_path' => 'https://upload.wikimedia.org/wikipedia/en/4/4c/Avengers4.jpg',
            'name' => 'Avengers #17',
            'product_id' => '00173',
            'detail' => 'really long and entertaining story about a bunch of people with no problems in their life',
            'price' => 1200,
            'genre_id' => 1,
            'brand_id' => 1

        ]); 
        $product->save();

        $product = new App\Product([
            'image_path' => 'https://i.annihil.us/u/prod/marvel/i/mg/9/b0/58f13da4c6f74/portrait_incredible.jpg',
            'name' => 'Guardians of the Galaxy',
            'product_id' => '10087',
            'detail' => 'really long and entertaining story about a bunch of people with no problems in their life',
            'price' => 1500,
            'genre_id' => 1,
            'brand_id' => 1

        ]); 
        $product->save();

        $product = new App\Product([
            'image_path' => 'https://images-na.ssl-images-amazon.com/images/S/cmx-images-prod/Item/485034/485034._SX1280_QL80_TTD_.jpg',
            'name' => 'Avengers All-New All_Different',
            'product_id' => '0145',
            'detail' => 'really long and entertaining story about a bunch of people with no problems in their life',
            'price' => 2000,
            'genre_id' => 1,
            'brand_id' => 1

        ]); 
        $product->save();

        $product = new App\Product([
            'image_path' => 'http://archiecomics.com/wp-content/uploads/2017/06/MarvelComicsDigest_Cover.jpg',
            'name' => 'The Amazing Spider-man 01',
            'product_id' => '00189',
            'detail' => 'really long and entertaining story about a bunch of people with no problems in their life',
            'price' => 800,
            'genre_id' => 1,
            'brand_id' => 1

        ]); 
        $product->save();

        $product = new App\Product([
            'image_path' => 'https://images-na.ssl-images-amazon.com/images/S/cmx-images-prod/Bundle/5/10176a43b8a66ba7f797ebce972b4283._SX400_QL80_TTD_.jpg',
            'name' => 'The Infinity Gauntlet',
            'product_id' => '0007',
            'detail' => 'really long and entertaining story about a bunch of people with no problems in their life',
            'price' => 700,
            'genre_id' => 1,
            'brand_id' => 1

        ]); 
        $product->save();

        $product = new App\Product([
            'image_path' => 'https://www.previewsworld.com/SiteImage/CatalogImage/STL034625?type=1',
            'name' => 'Wolverine Weapon X',
            'product_id' => '0072',
            'detail' => 'really long and entertaining story about a bunch of people with no problems in their life',
            'price' => 300,
            'genre_id' => 1,
            'brand_id' => 1

        ]); 
        $product->save();
    }
}
