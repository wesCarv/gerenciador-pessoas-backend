<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taxes;

class TaxesController extends Controller
{
    public function create(Request $request)
    {
        return Taxes::create($request->all());
    }

    public function index()
    {
        $taxes = Taxes::all();

        return response()->json($taxes);
    }

    public function update(Request $request, $id)
    {
        if (Taxes::where('id', $id)->exists()) {
            $taxes = Taxes::find($id);
            $taxes->name = is_null($request->name) ? $taxes->name : $request->name;
            $taxes->save();
            return response()->json($request, 202);
        } else {
            return response()->json(["Taxes not found"], 404);
        }
    }

    public function destroy($id){
        if(Taxes::where('id', $id)->exists()){
            $taxes = Taxes::find($id);
            $taxes->delete();

            return response()->json(null,204);
        }else{
            return response()->json("Taxes not found",404);
        }
    }
}
