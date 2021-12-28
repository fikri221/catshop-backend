<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'order_total' => 'required',
            'order_status' => 'nullable',
            'order_details' => 'required|array',
            'order_details.*' => 'integer|exists:products,id',
        ]);

        $order = Orders::create([
            'uuid' => 'TRX-' . mt_rand(10000, 99999) . mt_rand(100, 999),
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'order_total' => $request->order_total,
            'order_status' => $request->order_status,
        ]);

        // Membuat order_details menjadi array untuk kemudian dimasukkan ke checkout
        foreach ($request->order_details as $product) {
            $details[] = new OrderDetails([
                'orders_id' => $order->id,
                'product_id' => $product,
            ]);

            Product::find($product)->decrement('qty');
        }

        $order->details()->saveMany($details);

        return ResponseFormatter::success($order);
    }
}
