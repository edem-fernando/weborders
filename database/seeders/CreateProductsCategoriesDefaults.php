<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreateProductsCategoriesDefaults extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = new \App\Models\ProductsCategories();
        $category2 = new \App\Models\ProductsCategories();
        $category3 = new \App\Models\ProductsCategories();
        
        $category1->name = 'Bebidas';
        $category1->alias = 'bebidas';
        $category1->active = 1;
        $category1->thumb = 'images/thumb-bebidas.jpg';
        $category1->save();
        
        $category2->name = 'Sanduíches';
        $category2->alias = 'sanduíches';
        $category2->active = 1;
        $category2->thumb = 'images/thumb-lanches.jpg';
        $category2->save();
        
        $category3->name = 'Sobremesas';
        $category3->alias = 'sobremesas';
        $category3->active = 1;
        $category3->thumb = 'images/thumb-sobremesa.jpg';
        $category3->save();
        
        $product1 = new \App\Models\ProductsItems();
        $product2 = new \App\Models\ProductsItems();
        $product3 = new \App\Models\ProductsItems();
        
        $product1->name = 'Refri Coca-Cola 1.5L';
        $product1->category = $category1->id;
        $product1->alias = 'refri-coca-cola-1-5-L';
        $product1->price_sale = 8.45;
        $product1->price_cost = 4.00;
        $product1->thumb = 'images/thumb-bebidas.jpg';
        $product1->description = 'Descrição: Refrigerante Coca-Cola 1.5L';
        $product1->save();
        
        $product2->name = 'Hamburger da casa';
        $product2->category = $category2->id;
        $product2->alias = 'hamburger-da-casa';
        $product2->price_sale = 12.00;
        $product2->price_cost = 6.00;
        $product2->thumb = 'images/thumb-lanches.jpg';
        $product2->description = 'Descrição: Pão caseiro, blend 500g, ovo frito, queijo e presunto';
        $product2->save();
        
        $product3->name = 'Mousse';
        $product3->category = $category3->id;
        $product3->alias = 'Mousse';
        $product3->price_sale = 17.00;
        $product3->price_cost = 9.00;
        $product3->thumb = 'images/thumb-sobremesa.jpg';
        $product3->description = 'Descrição: Mousse de baunilha com cobertura de morango';
        $product3->save();
    }
    
}
