<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Crear_Producto extends Controller
{
    public function index(){
        $productos = Product::paginate();
        return view('product.index-producto', compact('productos'));
    }
    public function create(){
        return view('product.create-producto');
    }
    public function show($product){
        $productDetail = Product::find($product);
        return view('product.show-producto', compact('productDetail'));
    }
    public function store (Request $request){
        $product = new Product();

        $product->name = $request->name;
        $product->branch = $request->branch;
        $product->product_number = $request->product_number;
        $product->price = $request->price;
        $product->desc = $request->desc;
        
        $product->save();

        return redirect()->route('producto.index');
    }
}
