<?php

namespace Botble\Language\Providers;

use Botble\Language\Models\Language;
use Illuminate\Support\ServiceProvider;
use Botble\Language\Repositories\Caches\LanguageCacheDecorator;
use Botble\Language\Repositories\Eloquent\LanguageRepository;
use Botble\Language\Repositories\Interfaces\LanguageInterface;
use LoiPham\Supports\Helper;
use Event;
use Illuminate\Routing\Events\RouteMatched;

class LanguageServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * @author Sang Nguyen
     */
    public function register()
    {
        $this->app->singleton(LanguageInterface::class, function () {
            return new LanguageCacheDecorator(new LanguageRepository(new Language));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    /**
     * @author Sang Nguyen
     */
    public function boot()
    {
        $this->setNamespace('plugins/language')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes();

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-language',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/language::language.name',
                'icon'        => 'fa fa-list',
                'url'         => route('language.list'),
                'permissions' => ['language.list'],
            ]);
        });
    }
}
