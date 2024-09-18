<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Notifications\Create;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Medicine;
use App\Models\User;
use App\Http\Requests\MedicineRequest;
use Notification;
class MedicineController extends Controller
{
    public function show(){
        $medicines=Medicine::where('Active',1)->get();
        return response()->json([
            'data'=>$medicines,
            'massege'=>"That Is All Medicines",
        ],200);
    }
    public function search(Request $request){

        $medicines=Medicine::where($request->category,$request->search)->get();
        if($medicines!=null){
            return response()->json([
                'data'=>$medicines,
                'massege'=>'That Is Your Result For Your Search',
            ],200);
        }

    }
    public function edit($id){
        $medicine=Medicine::where('id',$id)->first();
        return response()->json([
         'data'=>$medicine,
         'massege'=>"That Is The Medicine for Your Id",
        ],200);
    }
    public function insert($id,Request $request){
        $request->validate(
            [
                'amount'=>'required',
            ]
        );
        $m= Medicine::where('id',$id)->pluck('amount');
        $mName=Medicine::where('id',$id)->pluck('tName');
        $p= Medicine::where('id',$id)->pluck('price');
        $amount=$request->amount;
         if($amount > $m[0]){
             return response()->json('You Can\'t Request Because Amount You Need Not Avaiable Amount Avaiable  '.$amount);
          }
         DB::table('medicine_user')->insert([
             'user_id'=>auth()->user()->id,
             'medicine_id'=>$id,
             'amount'=>$amount,
             'user_name'=>auth()->user()->name,
             'medicine_name'=>$mName[0],
             'total_price'=>$amount*$p[0],
          ]);


          $admins=User::where('status',1)->get();
          Notification::send($admins,new Create());
          return response()->json(['massege'=>"Created Sucssfuly"
          ],200);
     }


     public function receive($id){
       DB::table('medicine_user')->where('id',$id)->update([
        'receive'=>1
       ]);
       return response()->json("You Have Receive Your Request");
     }
     public function markAll(){
        //auth()->user()->unreadnotifcations->markAsRead();
         auth()->user()->unreadnotifications->markAsRead();
     }
     public function deleteAccount(){
        $requests=DB::table('medicine_user')->where('user_id',auth()->user()->id)->get();
        $count=0;
        foreach($requests as $r){
            if($r->send==1 && $r->receive==1){
                $count++;

            }
        }
        if($requests->count()==$count){
            User::destroy(auth()->user()->id);
            return response()->json('Account Deleted Sucssfuly');
        }
        $pending=$requests->count()-$count;
        return response()->json('You Can\'t Delete Your Account Because You Have '.$pending." Pending Request"  );
     }



     }



