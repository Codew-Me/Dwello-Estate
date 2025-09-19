<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agents = [
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@dwello.com',
                'phone' => '+1 (555) 123-4567',
                'bio' => 'Sarah has been helping clients find their dream homes for over 8 years. She specializes in luxury properties and has a deep understanding of the local market.',
                'specialization' => 'Luxury Properties',
                'experience_years' => 8,
                'status' => true,
            ],
            [
                'name' => 'Michael Chen',
                'email' => 'michael.chen@dwello.com',
                'phone' => '+1 (555) 234-5678',
                'bio' => 'Michael is a top-performing agent with expertise in first-time homebuyers and investment properties. He has closed over 200 transactions.',
                'specialization' => 'First-time Buyers',
                'experience_years' => 6,
                'status' => true,
            ],
            [
                'name' => 'Emily Rodriguez',
                'email' => 'emily.rodriguez@dwello.com',
                'phone' => '+1 (555) 345-6789',
                'bio' => 'Emily brings 12 years of experience in commercial and residential real estate. She is known for her attention to detail and client satisfaction.',
                'specialization' => 'Commercial & Residential',
                'experience_years' => 12,
                'status' => true,
            ],
            [
                'name' => 'David Thompson',
                'email' => 'david.thompson@dwello.com',
                'phone' => '+1 (555) 456-7890',
                'bio' => 'David specializes in waterfront properties and has extensive knowledge of the coastal real estate market. He has helped over 150 families find their perfect home.',
                'specialization' => 'Waterfront Properties',
                'experience_years' => 10,
                'status' => true,
            ],
        ];

        foreach ($agents as $agent) {
            Agent::create($agent);
        }
    }
}