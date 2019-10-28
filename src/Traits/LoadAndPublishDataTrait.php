<?php

namespace LoiPham\WooCommerce\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

/**
 * Trait LoadAndPublishDataTrait
 * @package LoiPham\WooCommerce\Traits
 * @mixin ServiceProvider
 */
trait LoadAndPublishDataTrait
{
    /**
     * @var string
     */
    protected $namespace = null;

    /**
     * @var string
     */
    protected $basePath = null;

    /**
     * @return $this
     */
    public function loadTranslations(): self
    {
        $this->loadTranslationsFrom($this->getTranslationsPath(), 'woo-commerce');
        return $this;
    }
    /**
     * @return string
     */
    protected function getTranslationsPath(): string
    {
        return __DIR__.'/../../resources/lang/';
    }
}
