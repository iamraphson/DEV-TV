<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        return view('admin.index')->withTitle('DevTv - Administrator Dashboard');
    }
}
