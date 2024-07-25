<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = ['university_name', 'university_score'];

    public function CVform()
    {
        return $this->hasMany(CVform::class, 'university_id');
    }
}
