<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Box;

class BoxController extends Controller
{
    //list all
    protected function index(){
        return Box::where('state',1)->get();
    }
}
