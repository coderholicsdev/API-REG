<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hospitals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HospitalsController extends Controller
{
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'hospital_name'=>'required|min:2|max:100',
        'address'=>'required|min:2|max:100',
        'state'=>'required|min:2|max:100',
        'image_link' => 'required|url',
        'phone'=>'required|numeric|digits:11',
        
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message'=>'Failed to create hospital',
            'errors'=>$validator->errors()
        ],422);
    };

    

    $hospitals=Hospitals::create([
       'hospital_name'=>$request->hospital_name,
       'address'=>$request->address,
       'state'=>$request->state,
       'image_link'=>$request->image_link,
       'phone'=>$request->phone,
   ]);

    return response()->json([
         'message'=>'Hospital created successfully',
         'data'=>$hospitals
    ],200);


}
}
