<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Discount;
use App\Models\Product;

class DiscountController extends Controller
{
    public function index()
    {
        $discount = DB::table('discounts as d')
            ->join('products as p', 'd.id_product', '=', 'p.id')
            ->select('d.id', 'p.name as producto', 'd.date_start', 'd.date_end', 'p.image', 'd.discount', 'p.id as id_producto')
            ->get();
        $product = Product::all();
        return view('admin.discount.index')->with(['discount' => $discount, 'product' => $product]);
    }

    public function store(Request $request)
    {
        $discount = new Discount;
        $discount->id_product = $request->producto;
        $discount->discount = $request->descuento;
        $discount->date_start = $request->date_start;
        $discount->date_end = $request->date_end;
        $discount->save();

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $discount = Discount::findOrFail($id);
        $discount->discount = $request->descuento;
        $discount->date_start = $request->date_start;
        $discount->date_end = $request->date_end;
        $discount->save();

        return response()->json(['success' => true]);
    }

    public function delete($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return response()->json(['success' => true]);
    }
}
