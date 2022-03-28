<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
      return view('pages.backend.system.dummy.index');
  }
  public function table() {
      return view('pages.backend.system.dummy.table.index');
  }

}
