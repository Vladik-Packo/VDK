@extends('layouts.app')

@section('head')
    <style>
        .parallax-foto {
            height: calc(100vh - 56px);
        }
        a.bookmark {
            display: block;
            position: relative;
            top: -50px;
            visibility: hidden;
        }

        .collapsible, .collapsible-header {
            border: none;
        }

        .collapsible-body {
            padding-top: 0px;
            padding-bottom: 0px;
        }

    </style>

    <script>
        $(document).ready(function(){
            $('.parallax').parallax();
            $('.collapsible').collapsible();
            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: true
            });
        });
        
    </script>

@endsection
        
@section('main')
    <a class="bookmark" name="logo"></a>
    <div class="section grey darken-4 z-depth-2" style="position: relative; z-index: 1;">
        <h4 class="center">
            <img src="{{ asset('storage/logo.png')}}" />
        </h4>
    </div>

    <div class="section white themed-bg">
        <div class="row container center themed-text">
            <h3 class="center">{{ __('content.balance.header')[0] }}</h3>
            <p class="flow-text">{{ __('content.balance.paragraph')[0] }}</p>
            <p class="flow-text">{{ __('content.balance.paragraph')[1] }}</p>
            <p class="flow-text">{{ __('content.balance.paragraph')[2] }}</p>
            <img class="col s12 l6 offset-l3 z-depth-2" src="{{ asset('storage/driehoek.png') }}" style="margin-top: 40px;"/>
        </div>
    </div>

@endsection