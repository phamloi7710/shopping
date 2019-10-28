<?php

namespace LoiPham\WooCommerce\App\Providers;

use Illuminate\Support\ServiceProvider;
use LoiPham\Media\Commands\PackageSetup;
use LoiPham\WooCommerce\Traits\LoadAndPublishDataTrait;
use LoiPham\WooCommerce\Supports\Helper;
use Illuminate\Routing\Router;
use LoiPham\WooCommerce\App\Http\Middlewares\CheckRoleAdmin;
use Config;
use View;
use LoiPham\WooCommerce\App\Models\User;
use Barryvdh\Debugbar\ServiceProvider as Debugbar;
use LoiPham\WooCommerce\Commands\SetupCommand;
use LoiPham\WooCommerce\Commands\CreateSuperUserCommand;
class WooCommerceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    use LoadAndPublishDataTrait;
    public function register()
    {
        Helper::autoload(__DIR__ . '/../../../helpers');
        $this->mergeConfigFrom(__DIR__.'/../../../config/woo-commerce.php', 'woo-commerce');
        $router = $this->app['router'];
        //Khai bao middleware
        $router->aliasMiddleware('checkRoleAdmin', CheckRoleAdmin::class);
        $this->app->singleton('woo-commerce', function () {
            return true;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../../Routes/woo-commerce.php', 'woo-commerce');
        $this->loadViewsFrom(__DIR__ . '/../../../resources/Views', 'woo-commerce');
        $this->loadMigrationsFrom(__DIR__ . '/../../../Database/migrations');
        $this->command();
//        dd(__DIR__.'/vendor/loipham/woo-commerce/resources/lang/');
//        $this->loadTranslationsFrom(__DIR__ . '/../../../resources/lang', 'woo-commerce');
        $this->loadTranslations();
    }
    protected function command()
    {
        $this->commands([
            SetupCommand::class,
            CreateSuperUserCommand::class,
        ]);
    }

}
