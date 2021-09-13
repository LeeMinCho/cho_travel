<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;
use App\Models\User;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Admin Account';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->ask("Type Email");
        $password = $this->ask("Type Password");
        $name = $this->argument("name");
        if ($email && $password) {
            User::create([
                "name" => $name,
                "email" => $email,
                "password" => Hash::make($password),
                "full_name" => "Administrator",
                "phone" => "-",
                "is_user" => 2
            ]);
            $this->info("Success create Admin Account");
        } else {
            $this->info("Please type email and password");
        }
    }
}
