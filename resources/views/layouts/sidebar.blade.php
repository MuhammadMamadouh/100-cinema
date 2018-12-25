<aside class="col-md-3 pull-right">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="">
        <?php
        $ads = \App\Models\Ads::where('status', 'enabled')
            ->where('page', '=', \Route::current()->uri())
            ->where('end_at', '>', time())
            ->get();
        ?>

        <ul class="">
            <!-- Sidebar Menu -->
            @foreach($ads as $ad)

                <li>
                    <div class="panel panel-success">
                        <a href="{{$ad->link}}">
                            <img class="card-img-top" src="{{\Storage::url($ad->image)}}" alt="Card image cap">
                        </a>
                        <div class="panel-body">
                            <a href="{{$ad->link}}" class="panel-title">{{$ad->name}}</a>
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