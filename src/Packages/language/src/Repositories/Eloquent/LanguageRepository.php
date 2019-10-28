<?php

namespace Botble\Language\Repositories\Eloquent;

use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Botble\Language\Repositories\Interfaces\LanguageInterface;

class LanguageRepository extends RepositoriesAbstract implements LanguageInterface
{
    /**
     * @var string
     */
    protected $screen = LANGUAGE_MODULE_SCREEN_NAME;
}
