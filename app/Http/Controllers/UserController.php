<?php

namespace App\Http\Controllers;

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

    public function searchHospitalsByNameAPI($id=null){
        if($id){
            $hospitals = DB::table('hospitals')->where('hospital_name',$id)->get();
        }else {
            $hospitals = DB::table('hospitals')->get();
        }
        
        return $hospitals;
    }



}