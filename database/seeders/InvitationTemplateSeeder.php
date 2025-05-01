<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invitation\InvitationTemplate;

class InvitationTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Klasik Düğün Davetiyesi',
                'cover_image' => 'klasik-davetiyesi.jpg',
                'template_path' => 'templates/classic-wedding-invitation',
            ],
            [
                'name' => 'Modern Düğün Davetiyesi',
                'cover_image' => 'modern-davetiyesi.jpg',
                'template_path' => 'templates/modern-wedding-invitation',
            ],
            [
                'name' => 'Vintage Düğün Davetiyesi',
                'cover_image' => 'vintage-davetiyesi.jpg',
                'template_path' => 'templates/vintage-wedding-invitation',
            ],
            [
                'name' => 'Rustik Düğün Davetiyesi',
                'cover_image' => 'rustik-davetiyesi.jpg',
                'template_path' => 'templates/rustic-wedding-invitation',
            ],
        ];

        foreach ($data as $datum) {
            InvitationTemplate::query()->create($datum);
        }
    }
}
