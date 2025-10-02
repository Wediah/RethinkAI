<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impact extends Model
{
    use HasFactory, Sluggable;


    protected $fillable = [
        'name',
        'slug',
        'description',
        'impact_type',
        'content_type',
        'image',
        'video_url',
        'external_link',
        'content',
        'date',
        'is_published'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected $casts = [
        'date' => 'date',
        'is_published' => 'boolean',
    ];

    // Get content types
    public static function getContentTypes()
    {
        return [
            'article' => 'Article/Blog Post',
            'video' => 'YouTube Video',
            'external' => 'External Link'
        ];
    }

    // Get impact categories
    public static function getImpactTypes()
    {
        return [
            'education' => 'Education',
            'healthcare' => 'Healthcare',
            'agriculture' => 'Agriculture',
            'technology' => 'Technology',
            'community' => 'Community Development',
            'environment' => 'Environment',
        ];
    }

    // Extract YouTube video ID
    public function getYoutubeIdAttribute()
    {
        if (!$this->video_url) {
            return null;
        }

        preg_match('/[?&]v=([^&]+)/', $this->video_url, $matches);
        return $matches[1] ?? null;
    }

    // Get YouTube embed URL
    public function getYoutubeEmbedUrlAttribute()
    {
        $id = $this->youtube_id;
        return $id ? "https://www.youtube.com/embed/{$id}" : null;
    }
}
