<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','phone','profile','company_id'];

    public function companies()
    {
        return $this->hasMany(Companies::class, 'company_id');
    }
}
