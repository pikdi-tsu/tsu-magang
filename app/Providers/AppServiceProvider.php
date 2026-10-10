<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Database\Events\ConnectionEstablished;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;


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
        Password::defaults(function () {
            // Kita turunkan aturan sementara agar mudah diubah (misal min 8) atau pertahankan jika ingin ketat
            return Password::min(8)
            ->mixedCase()
            ->numbers();
        });

        // Daftarkan mapping enum hanya saat koneksi DB benar-benar dibuat, agar perintah
        // yang tidak butuh DB (mis. package:discover saat composer install) tidak ikut konek
        Event::listen(ConnectionEstablished::class, function (ConnectionEstablished $event) {
            $event->connection->getDoctrineSchemaManager()
                ->getDatabasePlatform()
                ->registerDoctrineTypeMapping('enum', 'string');
        });

        // Force HTTPS if APP_URL is https or FORCE_HTTPS env is true
        if (env('FORCE_HTTPS', false) || str_contains(config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }
    }
}
