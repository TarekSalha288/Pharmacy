<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicineRequest;
use App\Models\Medicine;
use Carbon\Traits\ToStringFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Notifications\SendAmount;
use Notification;
use App\Http\Controllers\Api\MedicineController;
class UserController extends Controller
{
    public function create(){
        return view('create');
    }

    public function getMedicines(){

        $requests=DB::table('medicine_user')->where('user_id',auth()->user()->id)->get();
       return response()->json([
        'data'=>$requests],200);

    }
    public function requests(){
        $requests=DB::table('medicine_user')->where('send',0)->get();
        auth()->user()->unreadnotifications->markAsRead();
       return view('requests',compact('requests'));

    }
    public function showSend(){
        $requests=DB::table('medicine_user')->where('send',1)->where('receive',0)->get();
        return view('showsending',compact('requests'));
    }
    public function showReceive(){
        $requests=DB::table('medicine_user')->where('receive',1)->get();
        return view('showreceive',compact('requests'));
    }
    public function deleteRequest($id){
        DB::table('medicine_user')->where('id',$id)->delete();
        return redirect()->back();
            }
            public function accept($id){
                $request=DB::table('medicine_user')->where('id',$id)->get();
                $medicine=Medicine::where('id',$request->pluck('medicine_id'))->get();
                $avaiable=$medicine->pluck('amount');
                $amount=$request->pluck('amount');
                if($amount[0]  >  $avaiable[0]  && $avaiable[0]!=0){
                    $user=User::where('id',$request->pluck('user_id'))->get();
                    Notification::send($user,new SendAmount($avaiable));

               DB::table('medicine_user')->where('id',$id)->delete();
               return response("You Can't Do That");
               // send massege said that the amount is end or your amound is big than avaiable

                }
               $avaiable[0] =$avaiable[0]-$amount[0];
               DB::table('medicine_user')->where('id',$id)->update([
                'send'=>1
               ]);
               Medicine::where('id',$request->pluck('medicine_id'))->update([
                'amount'=>$avaiable[0],

               ]);
                return redirect()->back();
            }
            public function ShowNotidication(){

                return response()->json([
                    'data'=>auth()->user()->unreadNotifications->pluck('data'),
                ]);
        }}
