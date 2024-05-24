<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('products as p')
            ->join('categories as c', 'p.id_category', '=', 'c.id')
            ->select('p.name as producto', 'p.description', 'p.price', 'p.stock', 'p.image', 'c.name as categoria', 'p.id', 'c.id as id_category')
            ->get();
        $category = Category::all();
        return view('admin.products.index')->with(['product' => $product, 'category' => $category]);
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->id_category = $request->categoria;
        $attached = $request->file("image");

        if ($request->hasFile('image')) {
            $file_attached = 'Product_' . time() . '.' . $attached->extension();
            $path = public_path() . '/pictures';
            $attached->move($path, $file_attached);
            $product->image = $file_attached;
        }

        $product->save();

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->id_category = $request->categoria;
        $attached = $request->file("image");

        if ($request->hasFile('image')) {
            if ($product->image) {
                $previous_image = public_path('pictures/' . $product->image);
                if (file_exists($previous_image)) {
                    unlink($previous_image);
                }
            }
            $file_attached = 'Product_' . time() . '.' . $attached->extension();
            $path = public_path() . '/pictures';
            $attached->move($path, $file_attached);
            $product->image = $file_attached;
        }

        $product->save();
        return response()->json(['success' => true]);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            $previous_image = public_path('pictures/' . $product->image);
            if (file_exists($previous_image)) {
                unlink($previous_image);
            }
        }
        $product->delete();
        return response()->json(['success' => true]);
    }
}
