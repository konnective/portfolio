<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $posts = Order::with('user','product')->orderBy('created_at', 'desc')
            ->paginate(10);
        $pageHeading = 'Orders';    

        return view('admin.order.index', compact('posts','pageHeading'));
    }
}
