<?php

namespace Craftlogan\LaraSettings\Elements;

use Illuminate\Database\Eloquent\Builder;

class Checkbox implements Element
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
      if($value == 'true'){
        $checked = "checked";
      }else{
        $checked = "";
      }
      $element = '<div class="checkbox">
                      <input id="'.$label.'" type="checkbox" value="'.$value.'"'.$checked.'>
                      <label for="'.$label.'">'.$label.'</label>
                    </div>';
      return $element;
    }
}
