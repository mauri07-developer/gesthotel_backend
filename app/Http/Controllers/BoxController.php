<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Box;
use Exception;

class BoxController extends Controller
{
    //list all
    protected function index()
    {
        $box = Box::where('state', 1)->get();
        $data = \App\Http\Resources\BoxResource::collection($box);
        return response()->json(['data' => $data, 'state' => 1], 200);

    }

    //create
    protected function store(Request $request)
    {
        try {
            \DB::beginTransaction();
            $box = Box::create([
                'name' => $request->name,
                'comment' => $request->comment,
                'company_id' => $request->company_id,
            ]);
            \DB::commit();
            return response()->json(['data' => $box, 'state' => 1], 200);
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json(['message' => $e, 'state' => 0], 500);
        }
    }

    protected function update (Request $request,$id)
    {
        try{
            \DB::beginTransaction();
            $box = Box::findOrFail($id);
            $box->name = $request->name;
            $box->comment = $request->comment;
            $box->company_id = $request->company_id;
            $box->save();
            \DB::commit();
            return response()->json(['data' => $box, 'state' => 1], 200);
        } catch (Exception $e){
            \DB::rollBack();
            return response()->json(['message' => $e, 'state' => 0], 500);
        }
    }


}