<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BindingServiceProvider extends ServiceProvider {

  public function register()
  {
    // Repositories
		$this->app->bind('App\Contracts\IPostRepository', 'App\Repositories\VdmPostRepository');

		// Services
    $this->app->bind('App\Contracts\IScraperService', 'App\Services\VdmScraperService');
  }

}
