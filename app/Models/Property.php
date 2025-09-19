<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'city',
        'state',
        'zip_code',
        'type',
        'price',
        'bedrooms',
        'bathrooms',
        'area',
        'image',
        'gallery',
        'gallery_images',
        'featured',
        'is_featured',
        'status'
    ];

    protected $casts = [
        'gallery' => 'array',
        'gallery_images' => 'array',
        'featured' => 'boolean',
        'is_featured' => 'boolean',
        'status' => 'boolean',
        'price' => 'decimal:2'
    ];

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }

    protected static function boot()
    {
        parent::boot();

        // When a property is deleted, also delete all related inquiries
        static::deleting(function ($property) {
            $property->inquiries()->delete();
        });
    }
}
