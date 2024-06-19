<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name','address','googleMapHtml','openTime','closeTime'];

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    function branchPhones() {
        return $this->hasMany(BranchPhone::class);
    }
}
