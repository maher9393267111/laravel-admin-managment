<?php

namespace App\Http\Controllers\Manager;

use App\Models\Leave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerStatusController extends Controller
{
    public function hodapprove($id)
    {
        $leave = Leave::find($id);
        $leave->hod_status='Approved';
        $leave->save();
        return redirect()->back()->with('status', 'Leave Approved Successfully');
    }
    public function hoddeclined($id)
    {
        $leave = Leave::find($id);
        $leave->hod_status='Declined';
        $leave->save();
        return redirect()->back()->with('danger', 'Leave Declined');
    }
}
