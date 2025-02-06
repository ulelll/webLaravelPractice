<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;
    protected $with = ["department"];

    protected $fillable = ["name", "department_id"];

     public function students(): HasMany
     {
        return $this->hasMany(Student::class);
     }

     public function department(): BelongsTo
     {
        return $this->belongsTo(Department::class);
     }

     //add query here
}
