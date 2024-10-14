<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    //CRUD's room 
    protected function index(){
        $data = Room::where('state',1)->get();
        return response()->json(['data' => $data, 'state' => 1], 200);
    }

    protected function store(Request $request){
        try {
            \DB::beginTransaction();
            $room = Room::create([
                'floor_id' => $request->floor_id,
                'type_room_id' => $request->type_room_id,
                'name' => $request->name,
                'availability'=>$request->availability,
                'price' => $request->price,
                'user_inserted'=>$request->user_inserted,
            ]);
            \DB::commit();
            return response()->json(['data' => $room, 'state' => 1], 200);
        }catch (Exception $e) {
            \DB::rollBack();
            return response()->json(['message' => $e, 'state' => 0], 500);
        }
    }

    protected function update (Request $request,$id){
        try{
            \DB::beginTransaction();
            //primero buscamos el id
            $room = Room::find($id);
            //sobreescribo las propiedades
            $room->floor_id = $request->floor_id;
            $room->name = $request->name;
            $room->type_room_id = $request->type_room_id;
            $room->availability = $request->availability;
            $room->price = $request->price;
            $room->user_edit = $request->user_edit;
            $room->save();
            \DB::commit();
            return response()->json(['data' => $room, 'state' => 1], 200);
        } catch (Exception $e){
            \DB::rollBack();
            return response()->json(['message' => $e, 'state' => 0], 500);
        }

    }

    protected function delete ($id){
        \DB::beginTransaction();
        $room = Room::findOrFail($id);
        $room->update(['state' => 0]);
        \DB::commit();
        return response()->json(['data' => $room, 'state' => 1], 200);

    }
}
