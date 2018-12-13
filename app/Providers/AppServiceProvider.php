<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // share a variable with footer
        $mostLikedPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->limit(3)->get();
        View::share('mostLikedPosts', $mostLikedPosts);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
