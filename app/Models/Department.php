<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;


class Department extends Model
{
    use HasFactory;
    public function students(): HasMany
    {
       return $this->hasMany(Student::class);
    }
}
