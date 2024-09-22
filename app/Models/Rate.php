<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $table = 'rates';
    protected $fillable=[
        'client_id',
        'employee_id',
        'rate',
    ];
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
