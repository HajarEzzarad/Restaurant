<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resto extends Model
{
    use HasFactory;
    protected $table = '_resto';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'price','image','type'];
    
}
