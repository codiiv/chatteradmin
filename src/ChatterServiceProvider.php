<?php

namespace Codiiv\Chatter;

use Illuminate\Support\ServiceProvider;
use Codiiv\Chatter\Models\Common;

class ChatterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      //
      include __DIR__.'/routes/web.php';
      $this->publishes([
        __DIR__.'/config/chatteradmin.php' => config_path('chatteradmin.php'),
        __DIR__.'/public' => public_path('chatter-admin'),
      ]);
      $this->loadMigrationsFrom(__DIR__.'/database/migrations');


      /************************  TO VIEWS ***************************/

      view()->composer('*', function ($view){
       // $request =  Request();
       if(\Auth::check()) {
         $ismaster =  Models\Option::where('option_name','master_admin')
         ->where('option_value', auth()->user()->id)
         ->first();
         if($ismaster){
           $view->with('ismaster', true);
         }else{
           $view->with('ismaster', false);
         }
       };
       $users  = \App\User::paginate(20);
       $view->with('users', $users);

       $categories = Models\ForumCategory::whereNull('parent_id')->with('children')->get();
       $categoriesUl = Models\ForumCategory::whereNull('parent_id')->with('children')->paginate(5);

       $view->with('categories', $categories);
       $view->with('categoriesul', $categoriesUl);
       $view->with('cat', new Models\ForumCategory());
       $view->with('common', new Common());
       $view->with('discs', Models\Discussion::paginate(20));

      });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      // register our controller
      $this->app->make('Codiiv\Chatter\Controllers\ChatterController');
      $this->loadViewsFrom(__DIR__.'/views', 'chatter');
      $this->commands([
        Console\Commands\AssignSuperadmin::class
      ]);
    }
}
