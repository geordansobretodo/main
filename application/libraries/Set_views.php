<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Set_views
{
    // HOME

    public function home()
    {
        return 'pages/index';
    }

    // ABOUT

    public function about()
    {
        return 'pages/about';
    }

    // BLOG

    public function blog()
    {
        return 'pages/blog';
    }

    // BOOKING

    public function booking()
    {
        return 'pages/booking';
    }

    // CONTACT

    public function contact()
    {

        return 'pages/contact';
    }

    // DESTINATION

    public function destination()
    {
        return 'pages/destination';
    }

    // FORM

    public function form()
    {
        return 'pages/form';
    }

    // GALLERY

    public function gallery()
    {
        return 'pages/gallery';
    }

    // GUIDE

    public function guides()
    {
        return 'pages/guides';
    }

    // LOGIN

    public function login()
    {
        return 'Login/login';
    }

    // PACKAGES

    public function packages()
    {
        return 'pages/packages';
    }

    // REGISTER

    public function register()
    {
        return 'Login/register';
    }

    // SERVICES

    public function services()
    {
        return 'pages/services';
    }

    // TESTIMONIAL

    public function testimonial()
    {
        return 'pages/testimonial';
    }

    // TOUR

    public function tour()
    {
        return 'pages/tour';
    }
}
