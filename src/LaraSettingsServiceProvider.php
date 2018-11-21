<?php
namespace Craftlogan\LaraSettings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
class LaraSettingsServiceProvider extends ServiceProvider {
/**
* Bootstrap any application services.
*
* @return string
*/
public function boot()
{
     /** Website */
     Blade::directive('settings', function ($key) {
          
         return "<?php echo website($key); ?>";
     });
}
/**
* Register any application services.
*
* @return void
*/
public function register()
{
//
}
}
