<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'property_id',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper method to get property details by ID
    public function getPropertyDetails()
    {
        $properties = [
            1 => [
                'title' => 'Modern Luxury Villa',
                'location' => '123 Modern Drive, San Francisco, CA 94102',
                'price' => 2500000,
                'image' => 'im1.png',
            ],
            2 => [
                'title' => 'Contemporary Family Home',
                'location' => '456 Contemporary Ave, Beverly Hills, CA 90210',
                'price' => 850000,
                'image' => 'im2.png',
            ],
            3 => [
                'title' => 'Premium Modern Residence',
                'location' => '789 Premium Blvd, Palo Alto, CA 94301',
                'price' => 3700000,
                'image' => 'im3.png',
            ],
        ];

        return $properties[$this->property_id] ?? null;
    }
}
