<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function create (Request $request){
        $name = $request->input('name');
        $ncm = $request->input('ncm');
        $amount = $request->input('amount');
        $metric = $request->input('metric');
        $average_cost = $request->input('average_cost');
        Product::create($name, $ncm, $amount, $metric, $average_cost);
        return redirect('/product/');
    }
    public function list(){
        $product = Product::list();
        return view("productlist", [
            "product" => $product
        ]);
    }
    public function delete(Request $request){
        $id = $request->input('id');
        Product::delete($id);
        return redirect('/product/');
    }
}