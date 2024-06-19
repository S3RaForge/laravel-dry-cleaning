<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, Sluggable;
    
    protected $fillable = ['clientName', 'clientPhone', 'clientAddress', 'uniqid'];

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    function services() {
        return $this->belongsToMany(Service::class);
    }
}
