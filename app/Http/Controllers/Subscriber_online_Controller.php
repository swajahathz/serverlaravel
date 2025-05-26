<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RS_subscriber_online;

class Subscriber_online_Controller extends Controller
{
    // User LIST API 
    public function subscriber_online(Request $request, $owner_id){


        $users = RS_subscriber_online::where('acctstoptime',null)
        ->where('ownerId', $owner_id)
        ->get();


       // Check if NAS records are found
       if($users->isEmpty()){
           return response()->json(['message' => 'Users not found!'], 200);
       } else {
           return response()->json($users, 200);
       }
   
    }   


    // User LIST API 
    public function subscriber_online_status(Request $request, $user_id){


        $users = RS_subscriber_online::where('acctstoptime',null)
        ->where('username',$user_id)
        ->get();


       // Check if NAS records are found
       if($users->isEmpty()){
           return response()->json(['message' => '0',
           'status' =>1], 200);
       } else {
        return response()->json(['message' => '1',
        'user_detail' => $users,
        'status' =>1], 200);
       }
   
    }  

     // User LIST API 
     public function subscriber_online_count(Request $request,$id,$roles_id){


        if($roles_id == 2){
                    $users = RS_subscriber_online::where('acctstoptime',null)
                            ->where('adminId',$id)
                            ->get();
        }

        if($roles_id == 3){
                    $users = RS_subscriber_online::where('acctstoptime',null)
                            ->where('franchiseId',$id)
                            ->get();
        }

        if($roles_id == 4){
                    $users = RS_subscriber_online::where('acctstoptime',null)
                            ->where('dealerId',$id)
                            ->get();
        }

        if($roles_id == 5){
                    $users = RS_subscriber_online::where('acctstoptime',null)
                            ->where('subdealerId',$id)
                            ->get();
        }

        if($roles_id == 6){
                    $users = RS_subscriber_online::where('acctstoptime',null)
                            ->where('ownerId',$id)
                            ->get();
        }

        


       // Check if NAS records are found
       if($users->isEmpty()){
           return response()->json($users, 200);
       } else {
           return response()->json($users, 200);
       }
   
    }   
}
