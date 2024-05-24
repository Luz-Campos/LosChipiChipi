<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;


class FrontendController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $product = Product::all();
        $discount = DB::table('discounts as d')
            ->join('products as p', 'd.id_product', '=', 'p.id')
            ->select('d.id', 'p.name as producto', 'p.description', 'p.price', 'd.date_start', 'd.date_end', 'p.image', 'd.discount', 'p.id as id_producto')
            ->get();

        return view('welcome')->with([
            'category' => $category,
            'product' => $product,
            'discount' => $discount
        ]);
    }

    public function form_store(Request $request)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Guardar mensaje en la base de datos
        $message = new Contact();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();

        // Respuesta de éxito para AJAX
        return response()->json(['success' => true]);
    }

    public function product_detail($id)
    {
        $product = Product::find($id);

        $product = Product::find($id);

        if ($product) {
            return response()->json([
                'status' => 'success',
                'data' => $product
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Producto no encontrado'
            ], 404);
        }
    }
}
