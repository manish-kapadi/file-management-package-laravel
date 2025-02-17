<?php

namespace GoApptiv\FileManagement\Providers;

use GoApptiv\FileManagement\Repositories\BaseRepositoryInterface;
use GoApptiv\FileManagement\Repositories\FileManagement\FileManagementLogRepositoryInterface;
use GoApptiv\FileManagement\Repositories\MySql\FileManagement\FileManagementLogRepository;
use GoApptiv\FileManagement\Repositories\MySql\MySqlBaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $toBind = [
            BaseRepositoryInterface::class => MySqlBaseRepository::class,
            FileManagementLogRepositoryInterface::class => FileManagementLogRepository::class,
        ];

        foreach ($toBind as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
