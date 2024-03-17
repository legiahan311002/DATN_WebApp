<?php

namespace App\Providers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Validator::extend('exclusive_discount', function ($attribute, $value, $parameters, $validator) {
            $otherField = $parameters[0];
            $otherValue = $validator->getData()[$otherField];

            return ($value === null && $otherValue !== null) || ($value !== null && $otherValue === null);
        });

        
    }
}
