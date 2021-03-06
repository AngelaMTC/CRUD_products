<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductsController extends Controller
{
    //GET:
    public function index(){

        $products = ProductModel::all();

        return view('products.index', compact('products'));
    }

    //
    public function create(){
        return view('products.create');
    }

    //POST:
    public function store(Request $request){
        $product = new ProductModel();

        $product->title = $request->title;
        $product->subject = $request->subject;
        $product->delivery = $request->delivery;

        $product->save();

        return redirect()->route('products.index');
    }

     //
    //  public function edit($id){

    //     $product = ProductModel::find($id);
    //     return view('products.edit', compact('product'));
    //     }

        public function edit($id){
            $products =ProductModel::all();
            $product = ProductModel::find($id);
            return view('products.edit', compact('product', 'products'));
            }
    
        //UPDATE:
    // public function update($id){
    //     $product = ProductModel::find($id);
    //     $product->update($request->all());

    //     return redirect()->route('products.index');

    //     }
    public function update(Request $request, $id){
        $input = $request->all();

        $product = ProductModel::find($id);
        $product->title =$input['title'];
        $product->subject =$input['subject'];
        // $product->id = $input['id'];

        $product->save();
        return redirect()->route('products.index');

        }

        //DELETE:
    public function destroy($id){
    ProductModel::find($id)->delete();
    
    return redirect()->route('products.index');

    }
}



        // public function destroy(ProductModel $product, $id){
    //     $product = ProductModel::find($id);
    //     $product->delete();

    //     return redirect()->route('products.index');
    // }

    // public function destroy(ProductModel $product, $id){
        
    //     return ProductModel::destroy($id);
        

    // }

    // public function destroy(ProductModel $product, $id) {
    //     $product = ProductModel::find($id)->delete();
    //     return response()->json(null,204);
    // }
        // public function destroy(ProductModel $product){
        //     $product = ProductModel::find($id)->delete();
        //     return redirect()->route('products.destroy');
        // }

        // public function destroy($id,ProductModel $product){

        //     $product= $product->findOrFail($id);
            
        //     if (!$product->delete()) {
            
        //      return Redirect::back()->withErrors($product->errors());
        //     }
        // }
