<?php

namespace Itsmejoshua\Novaspatiepermissions;

use Illuminate\Support\ServiceProvider;

class NovaSpatiePermissionsServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-spatie-permissions');
		$this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'nova-spatie-permissions');

		$this->publishes([
			__DIR__.'/../resources/lang' => resource_path('lang/vendor/nova-spatie-permissions'),
		], 'nova-spatie-permissions');
	}

	/**
	 * Register any application services.
	 */
	public function register()
	{
	}
}