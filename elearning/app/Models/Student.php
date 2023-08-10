<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = ['id', 'student_name', 'user_id', 'status'];

    use HasFactory;

    public function grade(): BelongsToMany
    {
        return $this->BelongsToMany(Grade::class, 'student_grades');
    }
}
