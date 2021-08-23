<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $table = 'employee';
	public $timestamps = true;
	protected $fillable = [
		'name', 'Address','email', 'phone', 'Position','resume',
            
	];
}
