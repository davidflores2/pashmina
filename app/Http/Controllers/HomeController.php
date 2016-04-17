<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Visa;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function checkout()
    {
        return view('checkout');
    }
    // VISA CODE 
    public function orders(Request $request)
    {

        $product = $request->input("product");
        $amount = $request->input("amount");
        
        Visa::pullFunds($product, $amount);
        Visa::pushFunds('David',10);

        echo $product, $amount;
    }
}
