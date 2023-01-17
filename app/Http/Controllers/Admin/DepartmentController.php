<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use Gate;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //to view all departments
        $departments = Department::all();
        return view('department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // this will return the form to create department
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //To store value into the department table
        $request->validate([
            'name' => 'required',
            'code' => 'required'
        ]);

        $department = new Department();
        
        $department->name = $request->input('name');
        $department->code = $request->input('code');


        $department->save();

        $success = 'User Created Successfully';

          return redirect(route('departments.index'))->with('status',"Department Added Successfully");
       //    return redirect(route('departments.index'))->with('status',"Department Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $project = Project::find($id);
        // return response()->json(['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        // To edit the department

        if(Gate::denies('edit-users')){
            return redirect(route('departments.index'));
        }
        return view('department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //To update the Department
        $request->validate([
            'name' => 'required',
            'code' => 'required'
         ]);

       $department->name = $request->input('name');
       $department->code = $request->input('code');

       $department->update();
        return redirect(route('departments.index'))->with('status',"Department Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('departments.index'));
                
        }
        $department->delete();
      
        $danger = 'User Deleted Successfully';
        return redirect(route('departments.index'))->with('danger',"Department Deleted Successfully");
    }
}
