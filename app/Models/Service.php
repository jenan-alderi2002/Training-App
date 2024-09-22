<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable=[
        'category_id',
        'name',
        'image',
        'description',
        'price',

    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_services');
    }

}
