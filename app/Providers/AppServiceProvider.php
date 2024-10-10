<?php

namespace App\Providers;

use App\Models\Consulta;
use App\Observers\ConsultaObserver;
use Faker\{Factory, Generator};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Generator::class, function () {
            return Factory::create('pt_BR');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(!$this->app->isProduction());
        Model::handleLazyLoadingViolationUsing(function (Model $model, string $relation) {
            $class = $model::class;
            info("Attempted to lazy load [{$relation}] on model [{$model}]");
        });
        Consulta::observe(ConsultaObserver::class);

    }
}
