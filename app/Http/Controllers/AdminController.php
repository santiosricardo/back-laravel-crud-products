<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('admin.admin', compact('products'));
    }

    public function viewCreate()
    {
        return view('admin.new');
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|string',
            'stock'       => 'integer|nullable',
            'cover'       => 'file|nullable',
            'description' => 'required|string',
        ]);
        $validate['slug'] = Str::slug($validate['name']);

        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('products', 'public');
            $validate['cover'] = $path;
        }
      

       Product::create($validate);
        return redirect()->route('admin.product.new')->with('success', 'Produto criado com sucesso!', 200);
    }




    /**
     * @param \App\Models\Product $product
     */

    public function viewupdate(Product $product)
    {
        return view('admin.update', [
            'product' => $product
        ]);
    }


    public function update(Product $product, Request $request)
    {

        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|string',
            'stock'       => 'integer|nullable',
            'cover'       => 'file|nullable',
            'description' => 'required|string',
        ]);
        $product->fill($request->all());
        $product->save();
        return redirect()->route('admin.product.update', ['product' => $product->id])->with('success', 'Produto atualizado com sucesso!', 200);
    }




    public function delete($id) {
        Product::destroy($id);
        Storage::delete($product->cover ?? '');
        return redirect()->route('admin.product.index')->with('success', 'Produto deletado com sucesso!', 200);
        



    }
}
