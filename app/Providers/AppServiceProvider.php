<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
        \App\Models\Dictionary::observe(\App\Models\DictionariesObservers::class);
        \App\Models\SearchConfig::observe(\App\Models\SearchConfigsObservers::class);
        \App\Models\Functionality::observe(\App\Models\FunctionalitiesObservers::class);
        \App\Models\AdminUser::observe(\App\Models\AdminUsersObservers::class);
        \App\Models\AdminRole::observe(\App\Models\AdminRolesObservers::class);
        \App\Models\BasicMethod::observe(\App\Models\BasicMethodObservers::class);
        \App\Models\SeriesWay::observe(\App\Models\SeriesWayObservers::class);
        \App\Models\WayGroup::observe(\App\Models\WayGroupObservers::class);
        \App\Models\Lottery::observe(\App\Models\LotteriesObservers::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {

        $this->app->bind('db.connection.mysql', function ($app, $parameters) {
            $rc = new \ReflectionClass('App\Database\TidbConnection');
            return $rc->newInstanceArgs($parameters);
        });
    }
}
