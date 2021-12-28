<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function get($id)
    {
        $product = Orders::with('details.products')->find($id);

        if ($product) {
            return ResponseFormatter::success($product, 'Data retrieved successfully');
        } else {
            return ResponseFormatter::error(null, 'Data failed to retrieve');
        }
    }
}
