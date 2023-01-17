<?php

namespace App\Http\Controllers\Admin;

use App\Models\Leave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminStatusController extends Controller
{
    public function approved($id)
    {
        $leave = Leave::find($id);
        $leave->admin_status='Approved';
        $leave->save();
        return redirect()->back()->with('status', 'Leave Approved Successfully');
    }
    public function declined($id)
    {
        $leave = Leave::find($id);
        $leave->admin_status='Declined';
        $leave->save();
        return redirect()->back()->with('danger', 'Leave Declined');
    }
}
