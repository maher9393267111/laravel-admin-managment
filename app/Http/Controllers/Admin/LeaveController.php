<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Role;
use App\Models\Leave;
use App\Models\Leavetype;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sleaves = Leave::with(['leavetypes'])->where('email',Auth::user()->email)->get();
       $mleaves = Leave::with(['leavetypes'])->where('department', Auth::user()->department)->get();
       $leaves = Leave::all();
       $leavetype = Leavetype::all();

       if(Auth::user()->position == 'C.E.O'){

        return view('leave.index',compact('leaves','leavetype'));

       }
       if(Auth::user()->position == 'manager'){

        return view('managerleave.index',compact('mleaves','leavetype'));

       }
       else{
            return view('staffleave.index',compact('sleaves','leavetype'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('manage-staff')){
            return redirect(route('leaves.index'));
                
        }
        $leavetype = Leavetype::all();
        $department = Department::all();
        return view('leave.create',compact('leavetype','department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //To store value into the leaves table
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'leavedays' => 'required',
        'leavetype' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'reason' => 'required',
        'department' => 'required',
        // 'position' => 'required'


        ]);

        $leave = new Leave();
        $hod_remark = "Pending";
        
        $leave->name = $request->input('name');
        $leave->email = $request->input('email');
        $leave->leavedays = $request->input('leavedays');
        $leave->leavetype = $request->input('leavetype');
        $leave->start_date = $request->input('start_date');
        $leave->end_date = $request->input('end_date');
        $leave->reason = $request->input('reason');
        $leave->department = $request->input('department');
        $leave->position = $request->input('position');

        $leave->hod_status = 'Pending';
        $leave->admin_status = 'Pending';


        $leave->save();

        $success = 'Leave Created Successfully';

        if(Auth::user()->position == 'C.E.O'){

            return redirect(route('leaves.index'))->with('status',"Leave Added Successfully");

        }
        if(Auth::user()->position == 'manager'){

            return redirect(route('leaves.index'))->with('status',"Leave Added Successfully");
            
        }
        else{
            return redirect(route('staffleave.index'))->with('status',"Leave Added Successfully");
        }

       //return redirect(route('departments.index'))->with('status',"Department Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        // dd($sleaves);
        // return view('staffleave.show',compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        // dd($leave);

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
    // public function admin_approve( $id)
    // {
    //     $leave = Leave::find($id);

    //     $leave->admin_status = 'Approved';
    //     $leave->save();
    //     return redirect(route('leaves.index'))->with('status',"Leave Approved Successfully");
    // }
}
