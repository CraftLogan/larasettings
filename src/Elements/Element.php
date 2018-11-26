<?php

namespace Craftlogan\LaraSettings\Elements;

use Illuminate\Database\Eloquent\Builder;

interface Element
{
    /**
     * Add to the settings build
     *
     * @param mixed $type
     * @param array $options
     * @return mixed $value
     */
    public static function add($options = [], $label, $value);
}
