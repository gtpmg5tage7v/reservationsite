<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Time;
use Illuminate\Support\Facades\Redirect;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myappointments = Appointment::latest()->where('user_id',auth()->user()->id)->get();
        
        return view('admin.appointment.index',compact('myappointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'date'=>'required|unique:appointments,date,NULL,id,user_id,'.\Auth::id(),
            'time'=>'required'
        ]);
        $appointment = Appointment::create([
            'user_id'=> auth()->user()->id,
            'date' => $request->date
        ]);
        foreach($request->time as $time){
            Time::create([
                'appointment_id'=> $appointment->id,
                'time'=> $time,
                //'stauts'=>0
            ]);
        }
        return redirect()->back()->with('message','予定を作成しました'.$request->date);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function check(Request $request){
        
        $date = $request->date;
        $appointment= Appointment::where('date',$date)->where('user_id',auth()->user()->id)->first();
        if(!$appointment){
            return redirect()->to('/appointment')->with('errmessage','この日付の予約時間はご利用されていません');
        }

        $appointmentId = $appointment->id;
        $times = Time::where('appointment_id',$appointmentId)->get();
        //return $times;
        return view('admin.appointment.index',compact('times','appointmentId','date'));


    }

    public function updateTime(Request $request){

        $appointmentId = $request->appointmentId;
        $appointment = Time::where('appointment_id',$appointmentId)->delete();
        foreach($request->time as $time){
            Time::create([
                'appointment_id'=>$appointmentId,
                'time'=>$time,
                'status'=>0

            ]);
        }
        return redirect()->route('appointment.index')->with('message','更新しました');
        
        
    }
}
