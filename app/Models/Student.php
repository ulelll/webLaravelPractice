<?php

namespace App\Models;
use App\Models\Department;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $with = ['grade', 'department'];
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
