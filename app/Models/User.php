<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Department;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'department',
        'position',
        'address',
        'image',
        'salary',
        'password',
        'employment_date',
        'state',
        'lga',
        'staff_leave',
        'birthdate',
        'gender'


    ];
    public function departments(){
        return $this->BelongsTo(Department::class,'department','id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function hasAnyRoles($roles)
    {
        if($this->roles()->whereIn('name',$roles)->first())
        {
            return true;
        }
        return false;
    }
    public function hasRole($role)
    {
       if($this->roles()->where('name',$role)->first()){
           return true;
       }
        return false;
    }
    
}
