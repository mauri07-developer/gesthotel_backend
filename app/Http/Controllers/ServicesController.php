<?php

namespace App\Http\Controllers;

use Exception;
use \App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //all services
    protected function index()
    {
        $data = Service::where('state', 1)->get();
        return response()->json(['data' => $data, 'state' => 1], 200);
    }
    //save a row
    protected function store(Request $request)
    {
        try {
            \DB::beginTransaction();
            $data = $request->all();
            $service = new Service();
            $service->name = $data['name'];
            $service->user_inserted_id = $data['user_id'];
            $service->descripcion = $data['descripcion'];
            $service->state = 1;
            $service->save();
            \DB::commit();
            return response()->json(['data' => $service, 'state' => 1], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'state' => 0], 500);

        }
    }

    //update a row
    protected function update(Request $request, $id)
    {
        try {
            \DB::beginTransaction();
            $data = $request->all();
            $service = Service::findOrFail($id);
            $service->name = $data['name'];
            $service->descripcion = $data['descripcion'];
            $service->save();
            \DB::commit();
            return response()->json(['data' => $service, 'state' => 1], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'state' => 0], 500);

        }
    }

    //delete a row
    protected function delete($id)
    {
        try {
            \DB::beginTransaction();
            $service = Service::findOrFail($id);
            $service->state = 0;
            $service->save();
            \DB::commit();
            return response()->json(['data' => $service, 'state' => 1], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'state' => 0], 500);
        }
    }

}
