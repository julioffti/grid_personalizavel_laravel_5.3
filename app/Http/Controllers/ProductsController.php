<?php

namespace App\Http\Controllers;

use App\Product;
use App\Table\Table;

class ProductsController extends Controller
{
    private $table;

    /**
     * CategoriesController constructor.
     * @param $table
     */
    public function __construct(Table $table)
    {
        $this->table = $table;
    }


    public function index()
    {
        $this->table
            ->model(Product::class)
            ->columns([
                //especifica as colunas que serão exibidas
                [
                    'label' => 'Nome',
                    'name' => 'name',
                    'order' => true
                ],
                [
                    'label' => 'Estoque',
                    'name' => 'stock',
                    'order' => true
                ]

            ])
            ->filters([
                [
                    'name' => 'id',
                    'operator' => '='
                ],
                [
                    'name' => 'name',
                    'operator' => 'LIKE'
                ],
                [
                    'name' => 'categories.name', //relacionamento products
                    'operator' => 'LIKE'
                ]

            ])
           ->addEditAction('products.edit')
           ->addDeleteAction('products.destroy')
           ->paginate(5)
           ->search();
        return view('products.index', [
            'table' => $this->table
        ]);
    }

    public function edit($id){
        echo $id;
    }

    public function destroy($id){
        echo $id;
    }
}
