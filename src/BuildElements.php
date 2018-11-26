<?php

namespace Craftlogan\LaraSettings;
use Craftlogan\LaraSettings\Card;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BuildElements
{

    public static $settings;

    private static $view;


    public function __construct($settings)
    {
      self::$settings = $settings;

      static::applySettingHeaders();

    }


    private static function applySettingHeaders()
    {

        foreach(self::$settings as $settingName => $settingValue)
        {
          static::applySetting($settingValue);
        }

    }

    private static function applySetting($settings)
    {
        foreach($settings as $settingName => $settingValue)
        {
          $decorator = static::createElementDecorator($settingValue['type']['type']);
          if (static::isValidDecorator($decorator)) {
              self::$view = self::$view.$decorator::add($settingValue['type']['type_options'], $settingValue['type']['label'], $settingValue['type']['selected']);
          }
        }

    }


    private static function createElementDecorator($name)
    {
        return __NAMESPACE__ . '\\Elements\\' . str_replace(' ', '',ucwords(str_replace('_', ' ', $name)));
    }

    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    public function get(){
      return Card::built(self::$view);
    }

  }




/*


private static function applyDecoratorsFromRequest(Request $request, Builder $query)
{
    foreach ($request->all() as $filterName => $value) {

        $decorator = static::createFilterDecorator($filterName);

        if (static::isValidDecorator($decorator)) {
            $query = $decorator::apply($query, $value);
        }

    }
    return $query;
}
    private static function getResults(Builder $query)
    {
        return $query->get();
    }


    private static function addEntities(Builder $query, $entities)
    {
      $userEntites = [];
      foreach($entities as $entity){
        $userEntites[] = $entity->id;
      }
      $decorator = static::createFilterDecorator('UserEntity');
      if (static::isValidDecorator($decorator)) {
          $query = $decorator::apply($query, $userEntites);
      }
      return $query;
    }

}*/
