<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();
        Broadcast::channel('streaming-channel.{streamId}', function ($user) {
            return ['id' => $user->id, 'name' => $user->name];
        });
        require base_path('routes/channels.php');
    }
}
