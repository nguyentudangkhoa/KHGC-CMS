<?php

namespace Khgc\Cms\Providers;

use Illuminate\Support\ServiceProvider;
use Khgc\Cms\Console\Commands\VendorPublishKhgc;

class KhgcServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'khgc');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'khgc');
        if ($this->app->runningInConsole()) {
            $this->commands([
                VendorPublishKhgc::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/../../lang' => $this->app->langPath('vendor/khgc'),
        ],'khgc-lang');

        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/khgc'),
        ], 'khgc-views');

        $this->publishes([
            __DIR__.'/../../database/migrations' => resource_path('migrations/vendor/khgc'),
        ], 'khgc-migration');

        $this->publishes([
            __DIR__.'/../../public' => public_path('vendor/khgc'),
        ], 'khgc-public');
    }
}
