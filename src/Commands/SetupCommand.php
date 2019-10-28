<?php

namespace LoiPham\WooCommerce\Commands;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use LoiPham\WooCommerce\App\Models\User;
use Config;
use LoiPham\WooCommerce\Commands\CreateSuperUserCommand;
class SetupCommand extends Command
{
    /**
     * @var CreateSuperUserCommand
     */
    protected $createSuperUserCommand;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $file;
    protected $signature = 'woo:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the WooCommerce';

    /**
     *
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CreateSuperUserCommand $createSuperUserCommand)
    {
        $this->file = app('files');
        $this->createSuperUserCommand = $createSuperUserCommand;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->setConfig();
        $this->call('config:cache');
        $this->info('Đang tiến hành cài đặt WooCommerce...');
        $this->file->copyDirectory('vendor/loipham/woo-commerce/public/app-assets', 'public/app-assets');
        $this->call('migrate');
        if ($this->confirm('Bạn có muốn tạo khoản Admin không? [yes|no]')) {
            $this->call($this->createSuperUserCommand->getName());
        }
        $this->info('Quá trình cài đặt WooCommerce đã hoàn tất');
        $this->call('media:setup');
        $this->call('config:cache');
    }
    protected function setConfig()
    {
        $auth_config_file = base_path('config/auth.php');
        $search = 'WooCommerce';
        if ($this->checkExist($auth_config_file, $search)) {
            $data = "<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication \"guard\" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: \"session\", \"token\"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
        // WooCommerce (Loi Pham created at: ".date('d/m/Y H:i:s', '1571673152').")
        'woo' => [
            'driver' => 'session',
            'provider' => 'woo',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: \"database\", \"eloquent\"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        // WooCommerce (Loi Pham created at: ".date('d/m/Y H:i:s', '1571673152').")
        'woo' => [
            'driver' => 'eloquent',
            'model' => LoiPham\WooCommerce\App\Models\User::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        // WooCommerce (Loi Pham created at: ".date('d/m/Y H:i:s', '1571673152').")
        'woo' => [
            'provider' => 'woo',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
";
            $this->file->put($auth_config_file, $data);
        }
    }
    /**
     * [checkExist description].
     *
     * @param [type] $file   [description]
     * @param [type] $search [description]
     * @author Loi Pham
     * @return [type] [description]
     */
    protected function checkExist($file, $search)
    {
        return $this->file->exists($file) && !Str::contains($this->file->get($file), $search);
    }
}
