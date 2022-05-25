<?php

namespace App\Http\Controllers;

use App\Models\Hospitals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psr\Log\NullLogger;

class UserController extends Controller
{
    public function usersAPI($id=null){
        if($id){
            $users = DB::table('users')->where('id',$id)->get();
        }else {
            $users = DB::table('users')->get();
        }
        
        return $users;
    }

    function search($name)
    {
        $result = Hospitals::where('hospital_name', $name)->get();
        if(count($result)){
         return Response()->json($result);
        }
        else
        {
        return response()->json(['Result' => 'Result not found'], 404);
      }
    }


    public function hospitals($id=null){
        if($id){
            $hospitalsList = DB::table('hospitals')->where('id',$id)->get();
        }else {
            $hospitalsList = DB::table('hospitals')->get();
        }
        
        return $hospitalsList;
    }

    // public function searchHospitalsByNameAPI($id=null){
    //     if($id){
    //         $hospitals = DB::table('hospitals')->where('hospital_name',$id)->get();
    //     } 
    //      else{
            
    //         $hospitals = DB::table('hospitals')->get();
    //     }
        
        
    //     return $hospitals;
    // }

    



}