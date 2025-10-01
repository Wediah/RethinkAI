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

    protected $casts = [
        'date' => 'date',
    ];

    public function setTimeAttribute($value)
    {
        $this->attributes['time'] = date('H:i', strtotime($value));
    }

    public static function getStatusOptions()
    {
        return [
            'online' => 'Online',
            'in-person' => 'In-Person'
        ];
    }

}
