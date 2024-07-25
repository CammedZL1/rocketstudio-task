<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    use HasFactory;

    protected $fillable = ["fname", "mname", "lname", "dob"];

    public function cvForm()
    {
        return $this->hasOne(CVForm::class, 'name_id');
    }
}
