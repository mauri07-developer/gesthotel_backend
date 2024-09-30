<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    //CRUD's Bedroom 
    protected function index(){
        $data = Room::where('state',1)->get();
        return $data;
    }

    protected function store(Request $request){
        $bedroom = Room::create($request->all());
    }
}
