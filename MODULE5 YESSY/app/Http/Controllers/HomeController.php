<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('template.home');
    }
    public function displayHistory(){
        $orders = Order::all();
        return view('template.history.index', ['orders' => $orders]);
    }
}
