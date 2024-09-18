<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateMedicines;
use App\Notifications\CreateMedicine;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Http\Requests\MedicineRequest;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Notification;
class MedicineController extends Controller
{
    public function insert(MedicineRequest $request){

        Medicine::create($request->all());
        Notification::send(User::where('id','!=',auth()->user()->id)->get(),new CreateMedicine(auth()->user()->name));
        return  response('Created Sucssfully');
    }

    public function show(){

        $medicines=Medicine::where('Active',1)->get();
    return view('show',compact('medicines'));
    }
    public function update(){
        Medicine::where('exDate','<=',now())->update([
            'Active'=>0
         ]);
         Medicine::where('amount',0)->update([
            'Active'=>0
         ]);

    }

    public function search(Request $request){
        $medicines=Medicine::where($request->category,$request->search)->where('Active',1)->get();
          return view('showcategory',compact('medicines'));
    }
    public function edit($id){
        $medicine=Medicine::where('id',$id)->first();
        return view('edit',compact('medicine'));
    }
    public function updateMedicine($id){
        $medicine=Medicine::where('id',$id)->first();
        return view('update',compact('medicine'));

    }
    public function updateMedicineAdmin( $id,Request $request){
      $request->validate([ 'amount'=>'required',
    'sName'=>'required',
'tName'=>'required','price'=>'required','category'=>'required','company'=>'required',]);
      $medicine= Medicine::findOrFail($id);

        $medicine->update($request->all());
        return redirect()->back();
    }
    public function archive(){
       $medicines= Medicine::where('Active',0)->get();
     return view('archive',compact('medicines'));
    }
    public function delete($id){
        Medicine::destroy($id);
        return redirect()->back();}
    }
