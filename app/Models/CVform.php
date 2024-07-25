<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CVform extends Model
{
    use HasFactory;

    protected $table = 'cv_forms';
    protected $fillable = ['name_id', 'university_id'];

    public function universities()
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'cv_technologies', 'cv_id', 'technology_id');
    }

    public function names()
    {
        return $this->belongsTo(Name::class, 'name_id');
    }
}
