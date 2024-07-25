<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['technology_name'];

    public function CVform()
    {
        return $this->belongsToMany(CVForm::class, 'cv_tehcnoloies', 'tecnology_id', 'cv_form_id');
    }
}
