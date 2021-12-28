<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Orders;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $income = Orders::where('order_status', 'success')->sum('order_total');
        // $income = Orders::whereHas('details', function ($query) {
        //     return $query->where('order_status', '=', 'success')->sum('order_total');
        // });
        $sales = Orders::where('order_status', 'success')->count();
        $items = OrderDetails::with('orders', 'products')->orderBy('created_at', 'DESC')->get();

        return view('pages.dashboard', compact('income', 'sales', 'items'));
    }
}
