<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public function subCriteria()
    {
        return $this->belongsTo(SubCriteria::class, 'sub_criteria_id', 'id');
    }
}
