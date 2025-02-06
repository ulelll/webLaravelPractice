<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'desc'];

    public function students(): HasMany
    {
       return $this->hasMany(Student::class);
    }
}
