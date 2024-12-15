<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create {email?} {password?}';
    protected $description = 'Create an admin user';

    public function handle()
    {
        $email = $this->argument('email') ?? $this->ask('What is the admin email?');
        $password = $this->argument('password') ?? $this->secret('What is the admin password?');

        $user = User::where('email', $email)->first();

        if ($user) {
            if (!$this->confirm("User {$email} already exists. Do you want to update their password?")) {
                $this->error('Operation cancelled.');
                return 1;
            }
            
            $user->update([
                'password' => Hash::make($password),
            ]);

            $this->info("Password updated for user {$email}");
            return 0;
        }

        User::create([
            'name' => 'Admin',
            'email' => $email,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
        ]);

        $this->info("Admin user {$email} created successfully!");
        return 0;
    }
}
