<?php

namespace App\Providers;

use EventSauce\EventSourcing\Serialization\ConstructingMessageSerializer;
use EventSauce\EventSourcing\Serialization\MessageSerializer;
use Illuminate\Support\ServiceProvider;

/**
 * Class EventSauceServiceProvider
 * @package App\Providers
 */
class EventSauceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/eventsauce.php' => $this->app->configPath('eventsauce.php'),
            ], ['eventsauce', 'eventsauce-config']);

            $this->publishes([
                __DIR__ . '/../database/migrations' => $this->app->databasePath('migrations'),
            ], ['eventsauce', 'eventsauce-migrations']);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/eventsauce.php', 'eventsauce');

        $this->app->bind(MessageSerializer::class, function () {
            return new ConstructingMessageSerializer();
        });
    }
}