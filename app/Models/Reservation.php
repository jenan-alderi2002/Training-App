<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';
    protected $fillable = [
        'employee_services_id',
        'client_id',
        'start_time',
        'end_time',
        'date'
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function employee_services(){
        return $this->belongsTo(EmployeeService::class);
    }
}
