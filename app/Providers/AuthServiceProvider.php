<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Post::class' => 'App\Policies\PostPolicy::class',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::resource('users', 'App\Policies\UserPolicy');
//        Gate::resource('posts', 'App\Policies\PostPolicy');

//        Gate::define('update-post', function ($user, $post) {
//            return $user->id == $post->user_id;
//        });

        Gate::define('update-post', 'App\Policies\PostPolicy@update');
        Gate::define('delete-post', 'App\Policies\PostPolicy@delete');
        Gate::define('update-comment', 'App\Policies\CommentPolicy@update');
        Gate::define('delete-comment', 'App\Policies\CommentPolicy@delete');
    }
}
