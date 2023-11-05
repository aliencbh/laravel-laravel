<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test22Controller extends Controller {

  /**
   * Display a listing of the resource.
   */
  public function index() {
    $url = route('name is route 22', ['id' => 222]);
    return 'Test 22 Url = ' . $url;
  }
}
