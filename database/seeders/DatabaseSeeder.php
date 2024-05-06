<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->admin()->create();
        Role::factory()->teamLeader()->create();
        Role::factory()->mediaBuyer()->create();
        User::factory()->admin()->create();
        User::factory()->teamLeader()->create();
        User::factory()->mediaBuyer()->create();
    }
}
