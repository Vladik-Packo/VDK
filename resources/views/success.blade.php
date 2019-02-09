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
            <h3 class="center">{{ __('content.success.header')[0] }}</h3>
            <p class="flow-text">{{ __('content.success.paragraph')[0] }}</p>
            <h3 class="center">{{ __('content.success.header')[1] }}</h3>
            <p class="flow-text">{{ __('content.success.paragraph')[1] }}</p>
            <h3 class="center">{{ __('content.success.header')[2] }}</h3>
            <p class="flow-text">{{ __('content.success.paragraph')[2] }}</p>
            <h3 class="center">{{ __('content.success.header')[3] }}</h3>
            <p class="flow-text">{{ __('content.success.paragraph')[3] }}</p>
        </div>
    </div>

@endsection