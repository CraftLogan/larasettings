<?php

namespace Craftlogan\LaraSettings\Elements;

use Illuminate\Database\Eloquent\Builder;

class Standard implements Element
{
    /**
     * Add to the settings build
     *
     * @param mixed $type
     * @param array $options
     * @return mixed $value
     */
    public static function add($options = [], $value)
    {
      $element = '<div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" value="'.$value.'">
                    </div>';
      return $element;
    }
}
