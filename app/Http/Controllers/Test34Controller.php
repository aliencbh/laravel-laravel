<?php

namespace App\Http\Controllers;

use App\Models\User;

class Test34Controller extends Controller {

  /**
   * Display the specified resource.
   */
  public function show(string $id) {
    $user = User::find($id);

    return 'Test34 email = ' . $user->email;
  }
}
