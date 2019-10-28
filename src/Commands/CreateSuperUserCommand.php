<?php

namespace LoiPham\WooCommerce\Commands;

use LoiPham\WooCommerce\App\Models\User;
use LoiPham\WooCommerce\Exceptions\MakeUserException;
use Illuminate\Console\Command;

class CreateSuperUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new application user';

    /**
     * Execute the console command.
     *
     * Handle creation of the new application user.
     *
     * @return void
     */
    public function handle()
    {
        $email = $this->ask("Nhập địa chỉ Email");
        $name = $this->ask("Nhập tên hiển thị") ?: '';
        $username = $this->ask("Nhập tên đăng nhập") ?: '';
        $password = bcrypt($this->secret("Nhập mật khẩu"));
        try {
            app('db')->beginTransaction();
            $this->validateEmail($email);
            app(config('auth.providers.woo.model'))->create(array_merge(
                compact('email', 'name', 'username', 'password')
            ));
            $this->info("Tạo tài khoản thành công");
            app('db')->commit();
        } catch (Exception $e) {
            $this->error($e->getMessage());
            $this->error('Tài khoản chưa được tạo!');
            app('db')->rollBack();
        }
    }
    /**
     * Determine if the given email address already exists.
     *
     * @param  string  $email
     * @return void
     *
     * @throws \Dyrynda\Artisan\Exceptions\MakeUserException
     */
    private function validateEmail($email)
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw MakeUserException::invalidEmail($email);
        }
        if (app(config('auth.providers.woo.model'))->where('email', $email)->exists()) {
            throw MakeUserException::emailExists($email);
        }
    }
}
