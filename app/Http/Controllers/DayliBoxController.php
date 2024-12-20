<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class DayliBoxController extends Controller
{
    //list for box
    protected function index($box_id)
    {
        $dayliBox = \App\Models\DailyBox::with('user', 'box')->where('state', 1)->where('box_id',$box_id)->first();
        return response()->json(['data' => $dayliBox, 'state' => 1], 200);
    }

    //create daylibox
    protected function open(Request $request)
    {
        try {
            \DB::beginTransaction();
            $dayliBox = \App\Models\DailyBox::create([
                'box_id' => $request->box_id,
                'user_id' => $request->user_id,
                'date_initial' => $request->date_initial,
                'initial' => $request->initial,
                'final' => 0.00,
                'income' => 0.00,
                'expense' => 0.00,
                'deposit' => 0.00,
                'retirement' => 0.00,
                'card' => 0.00,
                'transfer' => 0.00,
                'details' => json_encode($request->details),
                'state' => 1
            ]);
            \DB::commit();
            return response()->json(['data' => $dayliBox, 'state' => 1], 200);
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json(['message' => $e, 'state' => 0], 500);
        }
    }

    //close daylibox
    protected function close (Request $request){
        try {
            $dayliBox = \App\Models\DailyBox::findOrFail($request->id);
            $dayliBox->date_final = $request->date_final;
            $dayliBox->final = $request->final;
            $dayliBox->income = $request->income;
            $dayliBox->expense = $request->expense;
            $dayliBox->deposit = $request->deposit;
            $dayliBox->retirement = $request->retirement;
            $dayliBox->card = $request->card;
            $dayliBox->transfer = $request->transfer;
            $dayliBox->details = json_encode($request->details);
            $dayliBox->state = 0;
            $dayliBox->save();
            return response()->json(['data' => $dayliBox, 'state' => 1], 200);

        } catch (Exception $e) {
            return response()->json(['message' => $e, 'state' => 0], 500);

        }
    }

}
