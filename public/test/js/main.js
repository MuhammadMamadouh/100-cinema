/*global $, alert, console*/

$(function () {

    'use strict';

    // Adjust Header Height

    var myHeader = $('.header');

    myHeader.height($(window).height());

    $(window).resize(function () {

        myHeader.height($(window).height());
    });


    $('.gallery .sidebar-wrapper').hover(
        function () {
            $('.gallery .sidebar-wrapper .item-title ').css('opacity', 1);
        },
        function () {
            $('.gallery .sidebar-wrapper .item-title ').css('opacity', 0);
        }
    );
});