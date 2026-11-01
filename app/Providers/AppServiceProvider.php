<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Promo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
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

        $this->loadViewsFrom(resource_path('views/vendor/mail/html/'), 'mail');


        Blade::if('isGuest', function () {
            return !Auth::guard('admin')->check() && !Auth::guard('web')->check();
        });

         Blade::if('isAdmin', function () {
            return Auth::guard('admin')->check();
        });


        Blade::if('isUser', function () {
            return Auth::guard('web')->check();
        });


        Blade::if('isGuest', function () {
            return !Auth::guard('admin')->check() &&
                   !Auth::guard('web')->check();
        });


        // Share menus data with specific views only (not all views)
        View::composer(['front.*', 'layouts.front'], function ($view) {
            $menus = Cache::remember('site_menus', 3600, function () {
                return Menu::where('parent_id', null)
                          ->with('children')
                          ->get();
            });

            $randomPromo = Cache::remember('random_promo', 1800, function () {
                return Promo::where('status', 'active')->inRandomOrder()->first();
            });

            $view->with([
                'menus' => $menus,
                'randomPromo' => $randomPromo
            ]);
        });

        View::composer(['layouts.front', 'front.partials.footer'], function ($view) {
            $galleries = Cache::remember('site_galleries', 3600, function () {
                return Gallery::take(9)->get();
            });
            $view->with('galleries', $galleries);
        });

        // Only load email settings when actually needed (not on every request)
        if (app()->runningInConsole() || request()->is('admin/settings/email*')) {
            try {
                $emailSettings = Cache::remember('email_settings', 3600, function () {
                    return DB::table('settings')->whereIn('key', [
                        'email_method', 'smtp_host', 'smtp_port', 'smtp_username', 'smtp_password',
                        'smtp_encryption', 'smtp_from_email', 'smtp_from_name'
                    ])->pluck('value', 'key')->toArray();
                });

                // Set the mailer dynamically based on the settings
                Config::set('mail.default', $emailSettings['email_method'] ?? 'smtp');
                Config::set('mail.mailers.smtp.host', $emailSettings['smtp_host'] ?? 'smtp.mailtrap.io');
                Config::set('mail.mailers.smtp.port', $emailSettings['smtp_port'] ?? 2525);
                Config::set('mail.mailers.smtp.username', $emailSettings['smtp_username'] ?? null);
                Config::set('mail.mailers.smtp.password', $emailSettings['smtp_password'] ?? null);
                Config::set('mail.mailers.smtp.encryption', $emailSettings['smtp_encryption'] ?? null);
                Config::set('mail.from.address', $emailSettings['smtp_from_email'] ?? 'no-reply@example.com');
                Config::set('mail.from.name', $emailSettings['smtp_from_name'] ?? 'Example');
            } catch (\Exception $e) {
                // Fallback to default settings if database is not available
                Config::set('mail.default', 'smtp');
                Config::set('mail.from.address', 'no-reply@example.com');
                Config::set('mail.from.name', 'Example');
            }
        }

    }
}