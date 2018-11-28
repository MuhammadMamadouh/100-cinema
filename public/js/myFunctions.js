$(document).ready(function () {


    $('.input').on('focus', function () {
        $(this).attr('data-place', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    });
    $('.input').on('blur', function () {
        $(this).attr('placeholder', $(this).attr('data-place'))
    });

    function checkAll() {
        $('input[class="item_checkbox"]:checkbox').each(function () {
            if ($('input[class="check_all"]:checkbox:checked').length == 0) {
                $(this).prop('checked', false);
            } else {
                $(this).prop('checked', true);
            }
        })
    }

    function delete_all() {
        $(document).on('click', '.delAll', function () {
            $('#form_data').submit();
        });

        $(document).on('click', '.delBtn', function () {

            $(document).on('click', '.del_all', function () {
                $('#form_data').submit();
            })
            var itemChecked = $('input[class="item_checkbox"]:checkbox').filter(":checked").length;
            console.log(itemChecked);
            if (itemChecked > 0) {
                $('.record_count').text(itemChecked);
                $('.not_empty_record').removeClass('hidden');
                $('.empty_record').addClass('hidden');

            } else {
                $('.record_count').text('');
                $('.not_empty_record').addClass('hidden');
                $('.empty_record').removeClass('hidden');

            }
            $('#mutlipleDelete').modal('show');
        })
        $('.carousel').carousel()
    }

    // var textarea = $('textarea');
    //
    // textarea.on('keyup', autosize());
    //
    // function autosize() {
    //     var el = this;
    //     setTimeout(function () {
    //         // el.style.cssText = 'height:auto; padding:0';
    //         // for box-sizing other than "content-box" use:
    //         // el.style.cssText = '-moz-box-sizing:content-box';
    //         el.style.cssText = 'height:' + el.scrollHeight + 'px';
    //     }, 0);
    // }

    $('textarea').on('keyup', function () {
        var el = this;
        setTimeout(function () {
            // el.style.cssText = 'height:auto; padding:0';
            // for box-sizing other than "content-box" use:
            // el.style.cssText = '-moz-box-sizing:content-box';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        }, 0);
    })
    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.result-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function () {
        readURL(this);
    });

    $(".upload-button").on('click', function () {
        $(".file-upload").click();
    });

    $('.js-description_readmore').moreLines({
        linecount: 1,
        // default CSS classes
        baseclass: 'b-description',
        basejsclass: 'js-description',
        classspecific: '_readmore',

        // custom text
        buttontxtmore: "read more",
        buttontxtless: "read less",

        // animation speed in milliseconds
        animationspeed: 250
    });


//search function
//

    $('#search_bar').on('focus', function () {
        $('#SearchDropdown').addClass('show');
    })
    $('#search_bar').on('keyup', function () {
        var input = $(this).val();
        var query = input.replace(' ', '+')
        console.log(query)
        $('#searchMenu').load('http://localhost/imdb/search?query=' + query);
    })


});


