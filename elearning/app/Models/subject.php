<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subject extends Model
{
    protected $fillable = ['id', 'subject_name', 'day', 'time_start', 'time_end', 'grade_id', 'teacher_id'];

    use HasFactory;

    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    public function grade(): HasOne
    {
        return $this->hasOne(Grade::class);
    }
}
