<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Customers;
use App\Models\Product;
use App\Models\quantityPrice;

class SalesController extends Controller {

  /**
   * Display a listing of the resource.
   */
  public function index() {
    $sales = Sales::orderBy('created_at', 'desc')->get();

    return view('index')->with('sales', $sales);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    $quantityPrices = DB::table('customers')->where('user_id', Auth::id())->join('quantityPrices', 'customers.role_id', '=', 'quantityPrices.role_id')->get();
    echo $quantityPrices;
    $products = Product::all();
    $quantity_prices = quantityPrice::all();

    return view('create')->with('products', $products)->with('quantity_prices', $quantity_prices);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {
    $this->validate($request,
      [
          'title' => 'required',
          'content' => 'required',
          'due' => 'required',
      ]
    );

    $sales = new Sales();
    $sales->title = $request->input('title');
    $sales->content = $request->input('content');
    $sales->due = $request->input('due');
    $sales->save();

    return redirect('/$sales')->with('success', 'Sales created successfully!');
  }
}
