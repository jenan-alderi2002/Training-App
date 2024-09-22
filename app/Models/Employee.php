<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    use HasFactory,HasApiTokens,Notifiable, HasRoles;
    protected $table = 'employees';
    protected $fillable=[
        'name',
        'email',
        'password',
        'phone_number',
        'image',
    ];
    protected $hidden=[
      'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed'

    ];

    public function experience(){
        return $this->hasMany(Experience::class);
    }
    public function  rate(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Rate::class);

    }
    public function favourite(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Favourite::class);
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'employee_services');
    }


}
