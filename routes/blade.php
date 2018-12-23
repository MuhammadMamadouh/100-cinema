<?php

\Blade::directive('loginBtn', function () {
    return '<a href="#" data-toggle="modal" data-target="#login" class="btn btn-default">sign in</a>';
});