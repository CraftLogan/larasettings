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

    private static function builtHeader()
    {
      $header = '
          <div class="card">
                  <div class="header">
                      <h2><strong>Security</strong> Settings</h2>
                  </div>';

      self::$view = $header;

    }


    public function buildBody($elements)
    {
      $body = '<div class="body">

          <div class="form-group">
              <input type="password" class="form-control" placeholder="Current Password">
          </div>
          <div class="form-group">
              <input type="password" class="form-control" placeholder="New Password">
          </div>
          <button class="btn btn-info btn-round">Save Changes</button>
      </div>';

      self::$view = self::$view.$body;
    }



    private static function buildFooter($settings)
    {
      $footer = '</div>';
      self::$view = self::$view.$footer;
    }

}
