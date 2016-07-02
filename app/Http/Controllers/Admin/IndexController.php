<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin/index');
    }
}
