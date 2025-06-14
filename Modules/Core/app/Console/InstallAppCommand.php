<?php

namespace Modules\Core\Console;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class InstallAppCommand extends Command {
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
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle() {

        Artisan::call('key:generate');

        Artisan::call('migrate');

        $sqlFilePath = module_path('Core', 'database/db.sql');

        if (file_exists($sqlFilePath)) {
            DB::unprepared(file_get_contents($sqlFilePath));
        } else {
            $this->error('SQL file not found at path: '.$sqlFilePath);
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
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'mobile' => '0905000000000',
            'type' => 'admin'

        ]);

        $role->users()->attach($user);
        $this->alert("✅ Application installed successfully!");
        $this->alert("🔐 Login credentials:\nEmail: admin@example.com\nPassword: 12345678");
        $this->alert("✨ Developed with care by Hadi Hilal");

    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments(): array {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
