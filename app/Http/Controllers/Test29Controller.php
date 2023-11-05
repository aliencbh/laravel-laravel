<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test29Controller extends Controller {

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {
    return 'Test 29 store';
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id) {
    echo 'Test 29 show';
  }
}
