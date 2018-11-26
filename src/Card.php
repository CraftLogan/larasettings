<?php

namespace Craftlogan\LaraSettings;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class Card
{

    private static $view;

    public static function built($elements)
    {
      static::buildHeader();
      static::buildBody($elements);
      static::buildfooter();
      return self::$view;
    }

    private static function buildHeader()
    {
      $header = '
          <div class="card">
                  <div class="header">
                      <h2><strong>Security</strong> Settings</h2>
                  </div>';

      self::$view = $header;

    }


    public static function buildBody($elements)
    {
      $body = '<div class="body">'.$elements.'
          <button class="btn btn-primary btn-round">Save Changes</button>
      </div>';

      self::$view = self::$view.$body;
    }



    private static function buildFooter()
    {
      $footer = '</div>';
      self::$view = self::$view.$footer;
    }

}
