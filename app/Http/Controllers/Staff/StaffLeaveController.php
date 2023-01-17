<?php

namespace App\Http\Controllers\Staff;

use App\Models\Leave;
use App\Models\Leavetype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaffLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $leaves = Leave::all();
        $sleaves = Leave::with(['leavetypes'])->where('email', Auth::user()->email)->get();
        $leavetype = Leavetype::all();
        return view('staffleave.index',compact('sleaves','leavetype'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $leavetype = Leavetype::all();
        // return view('staffleave.create',compact('leavetype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // dd($leave);
        // return view('staffleave.show', compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $staffleave)
    {
        return view("staffleave.edit",compact("staffleave"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $staffleave)
    {
        //To update the LeaveType
        $request->validate([
            'leavedays' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required',
            ]);
    
        $staffleave->leavedays = $request->input('leavedays');
        $staffleave->start_date = $request->input('start_date');
        $staffleave->end_date = $request->input('end_date');
        $staffleave->reason = $request->input('reason');

    
        $staffleave->update();
        return redirect(route('staffleave.index'))->with('status',"Leave Updated Successfully");
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
}
