<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class Ads extends Model
{
    protected $table = 'ads';
    protected $fillable = [
        'name',
        'link',
        'image',
        'start_at',
        'end_at',
        'page',
        'status',
    ];

    /**
     * Get Enabled Ads for the current page
     *
     * @return array
     */
    public function enabled()
    {
        $currentRoute = url()->current();
        $router = app()->make('router');

//        dd($router->getCurrentRoute()->uri);
//        $currentRoute = Route::current()->uri();
//        $currentRoute = Route::getFacadeRoot()->current()->uri();
//        $currentRoute = new Request();
//        $currentRoute = $router->getCurrentRoute()->uri();
        $now = time();

        return Ads::where('status', 'enabled')
            ->where('page', $currentRoute)
            ->where('start_at', '<=', $now)
            ->where('end_at', '>=', $now)
            ->get();
    }
}
