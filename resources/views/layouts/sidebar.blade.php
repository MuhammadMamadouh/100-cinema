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
                    <a href="{{$ad->link}}" target="_blank">
                        <img class="img-thumbnail" src="{{\Storage::url($ad->image)}}">
                    </a>
                </li>
            @endforeach
        </ul>
    {{--@each('adminlte::partials.menu-item', $adminlte->menu(), 'item')--}}
    {{--</ul>--}}
    <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>