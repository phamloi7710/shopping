<?php

namespace LoiPham\WooCommerce\Supports;

class PageTitle
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @param $title
     * @author Sang Nguyen
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param bool $full
     * @return string
     * @author Sang Nguyen
     */
    public function getTitle($full = true)
    {
        if (empty($this->title)) {
            return config('woo-commerce.base_name');
        }

        if (!$full) {
            return $this->title;
        }

        return $this->title . ' | ' .config('woo-commerce.base_name');
    }
}
