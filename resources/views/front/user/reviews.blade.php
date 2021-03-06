@extends('layouts.blog')
<!-- Main content -->
@section('title', $user->name . '')
@section('content')

    <div class=" main_container col-md-9">
        <div class="content_inner_bg row m0">

            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h2 class="pull-left">
                        <a href="#"> Reviews</a></h2>
                </div>
                <div class="portfolio_list_inner" id="reviews">
                    @include('front.user.loads.reviews')
                    {{ $reviews->links() }}
                </div>
            </section>
        </div>
    </div>

@endsection
@push('js')
    <script>
        $(function () {
            $('.pagination .page-item a').on('click', function (e) {
                e.preventDefault();

                $('#load a').css('color', '#dfecf6');
                $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

                var url = $(this).attr('href');
                getReviews(url);
                window.history.pushState("", "", url);
            });

            function getReviews(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    $('#reviews').html(data);
                }).fail(function () {
                    alert('Articles could not be loaded.');
                });
            }
        });


    </script>
@endpush