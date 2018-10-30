<aside class="sidebar col-lg-3 pull-right">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <?php
        $ads = \App\Models\Ads::where('status', 'enabled')
            ->where('page', '=', \Route::current()->uri())
            ->where('start_at', '<=', time())
            ->where('end_at', '>=', time())
            ->get();

        ?>

        <ul class="">
            <!-- Sidebar Menu -->
            @foreach($ads as $ad)

                <li>
                    <div class="card">
                        <img class="card-img-top" src="{{\Storage::url($ad->image)}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$ad->name}}</h5>
                            <p class="card-text">.</p>
                            <a href="{{$ad->link}}" class="btn btn-primary">{{$ad->link}}</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    {{--@each('adminlte::partials.menu-item', $adminlte->menu(), 'item')--}}
    {{--</ul>--}}
    <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>