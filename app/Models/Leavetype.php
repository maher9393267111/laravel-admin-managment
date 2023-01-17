<?php

namespace App\Models;

use App\Models\Leave;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leavetype extends Model
{
    use HasFactory;

    protected $table ='leavetypes';
    protected $fillable = [
        'leavename'
    ];
  
}
