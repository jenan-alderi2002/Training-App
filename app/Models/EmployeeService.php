<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeService extends Model
{
    use HasFactory;
    protected $table = 'employee_services';

    protected $fillable = [
        'employee_id',
        'service_id',
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Define the relationship to the Service model
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
