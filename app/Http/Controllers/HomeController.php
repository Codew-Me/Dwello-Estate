<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Hardcoded properties for the "Our Popular Residences" section
        $featuredProperties = collect([
            (object) [
                'id' => 1,
                'title' => 'Modern Luxury Villa',
                'description' => 'Stunning two-story modern white house with minimalist box-like architecture. Features large glass windows, sliding doors, and a second-floor balcony with glass railing. Includes a rectangular swimming pool with light-colored paving and outdoor lounge chairs.',
                'location' => '123 Modern Drive',
                'city' => 'San Francisco',
                'state' => 'California',
                'zip_code' => '94102',
                'type' => 'villa',
                'price' => 2500000,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'area' => 3500,
                'image' => 'im1.png',
                'featured' => true,
                'is_featured' => true,
                'status' => true,
            ],
            (object) [
                'id' => 2,
                'title' => 'Contemporary Family Home',
                'description' => 'Beautiful two-story modern white house with complex multi-volume design featuring wooden accents and large floor-to-ceiling glass windows. Includes an irregularly shaped swimming pool with outdoor seating areas and lush green surroundings.',
                'location' => '456 Contemporary Ave',
                'city' => 'Beverly Hills',
                'state' => 'California',
                'zip_code' => '90210',
                'type' => 'house',
                'price' => 850000,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => 1500,
                'image' => 'im2.png',
                'featured' => true,
                'is_featured' => true,
                'status' => true,
            ],
            (object) [
                'id' => 3,
                'title' => 'Premium Modern Residence',
                'description' => 'Exceptional three-story modern white house with multiple stacked levels, each featuring balconies with glass railings. Incorporates wooden paneling accents and extensive floor-to-ceiling glass windows. Includes rectangular swimming pool with outdoor seating areas.',
                'location' => '789 Premium Blvd',
                'city' => 'Palo Alto',
                'state' => 'California',
                'zip_code' => '94301',
                'type' => 'house',
                'price' => 3700000,
                'bedrooms' => 6,
                'bathrooms' => 4,
                'area' => 4000,
                'image' => 'im3.png',
                'featured' => true,
                'is_featured' => true,
                'status' => true,
            ],
        ]);

        return view('home', compact('featuredProperties'));
    }
}
