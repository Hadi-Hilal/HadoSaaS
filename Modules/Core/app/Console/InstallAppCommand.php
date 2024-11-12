<?php

namespace Modules\Core\Console;

use App\Models\User;
use Artisan;
use DB;
use Hash;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class InstallAppCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     */
    protected $description = 'This Command Will Install App.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('migrate');

        $sqlFilePath = module_path('Core', 'database/db.sql');

        if (file_exists($sqlFilePath)) {
            DB::unprepared(file_get_contents($sqlFilePath));
        } else {
            $this->error('SQL file not found at path: ' . $sqlFilePath);
            Artisan::call('migrate:rollback');
            return;
        }

        $role = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);
        $role->syncPermissions(Permission::all());
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'mobile' => '0905000000000',
            'type' => 'admin'

        ]);

        $role->users()->attach($user);
        $this->alert('app installed');
        $this->alert('Login: email: admin@admin.com | password: 12345678');
    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments(): array
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
