<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Events extends Model
{
    use Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
