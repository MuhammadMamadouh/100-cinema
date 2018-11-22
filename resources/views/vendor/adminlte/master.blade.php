<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('public/ltevendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/ltevendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('public/ltevendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">


@if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables with bootstrap 3 style -->
        <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css">
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<script src="{{ asset('public/vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('public/vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('public/vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endif

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables with bootstrap 3 renderer -->
    <script src="{{ asset('public/vendor/adminlte/dist/js/datatables.min.js') }}"></script>
    <script src="{{ asset('public/vendor/adminlte/dist/js/select2.min.js') }}"></script>

    {{--<script src="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>--}}
@endif

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>--}}
@endif

@yield('adminlte_js')
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {

        $('#frm-insert').on('submit', function (e) {

            e.preventDefault();

            var form = $('#frm-insert');

            var url = form.attr('action');

            var data = new FormData(form[0]);

            var formResults = $('#add-error');

            $.ajax({
                url: url,
                data: data,
                type: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    formResults.removeClass().addClass('alert alert-info').html('Loading...');
                },
                cache: false,
                processData: false,
                contentType: false,
            })
                .done(function (results) {
                    if (results.success) {
                        formResults.removeClass().addClass('alert alert-success').html(results.success);
                        $('#add_modal').modal('hide').fadeOut(1500);
                        $('#msg').html(data.success).fadeOut(2000);
                        toastr.success('well done')
                        $('#posts').DataTable().draw(true);
                        $('#frm-insert').each(function () {
                            this.reset();
                        });
                    }

                    if (results.redirectTo) {
                        window.location.href = results.redirectTo;
                    }
                })

                .fail(function (results) {
                    $.each(results.responseJSON.errors, function (index, val) {
                        toastr.info(val)
                    });
                    formResults.removeClass().addClass('alert alert-danger').html(results.responseJSON.message);
                });
        });
    });
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $('#click').click(function () {
        toastr.info('Are you the 6 fingered man?')
    });
</script>

</body>
</html>
