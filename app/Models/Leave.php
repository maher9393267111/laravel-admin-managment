<?php

namespace App\Models;

use App\Models\Leavetype;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leave extends Model
{
    use HasFactory;
    protected $table = 'leaves';
    protected $fillable = [
       'name',
       'email',
       'leavedays',
       'leavetype',
       'start_date',
       'end_date',
       'reason',
       'department',
       'position'
    ];
    public function leavetypes(){
        return $this->BelongsTo(Leavetype::class,'leavetype','id');
    }
    public function departments(){
        return $this->BelongsTo(Department::class,'department','id');
    }
}
