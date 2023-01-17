<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lga;
use App\Models\Role;
use App\Models\User;
use App\Models\State;
use App\Models\Department;
use Illuminate\Http\Request;
use Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department =  Department::all();
        $roles = Role::all();
        $users = User::with(['departments'])->get();
        // dd($users);
        $user = User::all();
        $state = State::all();
        $localgvt = Lga::all();
        return view('users.index')->with([
            'user'=>$user,
            'roles'=>$roles,
            'users'=>$users,
            'department' =>$department,          
            'state' =>$state,
            'localgvt' =>$localgvt
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::all();
        $state = State::all();
        $localgvt = Lga::all();
        return view('users.create',compact('department','state','localgvt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'department' => 'required',
        'position' => 'required',
        'address' => 'required',
        'salary' => 'required',
        'password' => 'required',
        'employment_date' => 'required',
        'state' => 'required',
        'lga' => 'required',
        'staff_leave' => 'required',
        'birthdate' => 'required',
        'gender' => 'required'


        ]);
        $user = new User();

        $image = $request->image;
        $imagename = time().'.'.$image->getClientoriginalExtension();
        $request->image->move('staffimage',$imagename);
        $user->image = $imagename;
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->department = $request->input('department');
        $user->position = $request->input('position');
        $user->address = $request->input('address');
        $user->staff_leave = $request->input('staff_leave');
        $user->birthdate = $request->input('birthdate');
        $user->gender = $request->input('gender');
        $user->salary = $request->input('salary');
        $user->employment_date = $request->input('employment_date');
        $user->state = $request->input('state');
        $user->lga = $request->input('lga');
        $user->password = Hash::make($request['password']);
    
        $user->save();
        return redirect(route('user.index'))->with('status',"Staff Added Successfully"); 
    
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-user')){
            return redirect(route('user.index'));
        }
        $roles = Role::all();
        return view('users.edit')->with([
            'user'=>$user,
            'roles'=>$roles
        ]);
        // return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //This method will obdate the user record and assign role to user
        // dd($request);
        
        $user->roles()->sync($request->roles);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'position' => $request->position,
        ]);


        $status = 'User Updated Successfully';

        return redirect(route('user.index'))->with('status', $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('user.index'));
                
        }
        $user->roles()->detach(); 
        $user->delete();
      
        $danger = 'User Deleted Successfully';
        return redirect(route('user.index'))->with('danger', $danger);
    }
  
}
