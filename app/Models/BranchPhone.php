<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branchPhone extends Model
{
    use HasFactory;
    
    protected $fillable = ['phone', 'branch_id'];

    protected $with = ['Branch'];

    function branch() {
        return $this->belongsTo(Branch::class);
    }

}