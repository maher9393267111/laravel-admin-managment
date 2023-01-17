<?php

namespace App\Http\Controllers\Admin;

use App\Models\Leavetype;
use Illuminate\Http\Request;
use Gate;
use App\Http\Controllers\Controller;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //This method will load the index page of the leave type
        $leavetypes = Leavetype::all();
        return view('leavetype.index',compact('leavetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leavetype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //To store value into the leavetypes table
        $request->validate([
            'leavename' => 'required',
            // 'code' => 'required'
        ]);

        $leavetype = new Leavetype();
        
        $leavetype->leavename = $request->input('leavename');
        // $department->code = $request->input('code');


        $leavetype->save();

        $success = 'LeaveType Created Successfully';

        return redirect(route('leavetypes.index'))->with('status',"LeaveType Added Successfully");
       //return redirect(route('departments.index'))->with('status',"Department Added Successfully");
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
    public function edit(Leavetype $leavetype)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('leavetypes.index'));
        }
        return view('leavetype.edit',compact('leavetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leavetype $leavetype)
    {
        //To update the LeaveType
        $request->validate([
        'leavename' => 'required',
        // 'code' => 'required'
        ]);

       $leavetype->leavename = $request->input('leavename');
    //    $department->code = $request->input('code');

       $leavetype->update();
        return redirect(route('leavetypes.index'))->with('status',"LeaveType Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leavetype $leavetype)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('leavetypes.index'));
                
        }
        $leavetype->delete();
      
        $danger = 'User Deleted Successfully';
        return redirect(route('leavetypes.index'))->with('danger',"LeaveType Deleted Successfully");
    }
}
