<?php

namespace Craftlogan\LaraSettings\Elements;

use Illuminate\Database\Eloquent\Builder;

class Time implements Element
{
    /**
     * Add to the settings build
     *
     * @param mixed $type
     * @param array $options
     * @return mixed $value
     */
    public static function add($options = [], $label, $value)
    {
      $element = '<div class="checkbox">
                      <input id="procheck1" type="checkbox">
                      <label for="procheck1">Profile Visibility For Everyone</label>
                    </div>';
      return $element;
    }
}
