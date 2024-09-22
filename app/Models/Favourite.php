<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $table = 'favourites';
    protected $fillable = [
        'client_id',
        'employee_id'
    ];
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
