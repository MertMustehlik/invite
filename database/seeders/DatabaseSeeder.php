<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\EventSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\InvitationTemplateSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email'=> 'test@demo.com',
            'password' => '123123',
        ]);
        
        $this->call([
            CountrySeeder::class,
            InvitationTemplateSeeder::class,
            EventSeeder::class,
        ]);
    }
}
