$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#frm-insert').on('submit', function (e) {

        e.preventDefault();

        var form = $('#frm-insert');

        var url = form.attr('action');

        var data = new FormData(form[0]);

        var formResults = $('#add-error');
        formResults.html('').removeClass();
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
                    toastr.success(results.success);
                    $('.table').DataTable().draw(true);
                    form.each(function () {
                        this.reset();
                    });
                }

                if (results.redirectTo) {
                    window.location.href = results.redirectTo;
                }
                if (results.error) {
                    toastr.warning(results.error);
                    formResults.html('').removeClass();
                }
                if (results.media) {
                    console.log(results);
                    $.each(results.media, function (index, val) {
                        $('#media').append(val);
                    });
                }
            })

            .fail(function (results) {
                $.each(results.responseJSON.errors, function (index, val) {
                    toastr.info(val)
                });
                formResults.removeClass().addClass('alert alert-danger').html(results.responseJSON.message);
            });
    });

    $('body').delegate('#table #edit', 'click', function () {
        var id = $(this).data('id');

        $('#frm-update-' + id).on('submit', function (e) {

            e.preventDefault();

            var form = $('#frm-update-' + id);

            var url = form.attr('action');

            var data = new FormData(form[0]);

            var formResults = $('#edit-error');

            $.ajax({
                url: url,
                data: data,
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function () {
                    formResults.removeClass().addClass('alert alert-info').html('Loading...');
                },
                cache: false,
                processData: false,
                contentType: false,

                success: (function (results) {

                    if (results.success) {
                        console.log();
                        formResults.removeClass().addClass('alert alert-success').html(results.success);
                        $('#edit_modal' + id).modal('hide').fadeOut(1500);
                        toastr.success(results.success);
                        $('.table').DataTable().draw(true);
                        form.each(function () {
                            this.reset();
                        });
                    }

                    if (results.redirectTo) {
                        window.location.href = results.redirectTo;
                    }
                }),
                error: (function (results) {
                    $.each(results.responseJSON.errors, function (index, val) {
                        toastr.info(val)
                    });
                    formResults.removeClass().addClass('alert alert-danger').html(results.responseJSON.message);

                }),
            });
        });
    });
    $('body').delegate('.table #delete', 'click', function (e) {

        var id = $(this).data('id');

        //Delete
        $('#frm-delete-' + id).on('submit', function (e) {

            e.preventDefault();

            var form = $('#frm-delete-' + id);

            var url = form.attr('action');

            var data = new FormData(form[0]);

            var formResults = $('#delete-error');
            console.log(url);

            $.ajax({
                url: url,
                data: data,
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function () {
                    formResults.removeClass().addClass('alert alert-info').html('Loading...');
                },
                cache: false,
                processData: false,
                contentType: false,

                success: function (results) {
                    console.log(results);
                    if (results.success) {
                        formResults.removeClass().addClass('alert alert-success').html(results.success);
                        $('#delete_modal' + id).modal('hide').fadeOut(1500);
                        toastr.success(results.success);
                        $('.table').DataTable().draw(true);
                        form.each(function () {
                            this.reset();
                        });
                    }

                    if (results.redirectTo) {
                        window.location.href = results.redirectTo;
                    }
                },

                error: function (results) {
                    $.each(results.responseJSON.errors, function (index, val) {
                        toastr.info(val)
                    });
                    formResults.removeClass().addClass('alert alert-danger').html(results.responseJSON.message);
                },
            })
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
    };
});

