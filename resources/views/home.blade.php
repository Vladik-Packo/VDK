@extends('layouts.app')

@section('head')
    <style>
        .parallax-foto {
            height: calc(100vh - 60px - 160px);
        }
        a.bookmark {
            display: block;
            position: relative;
            top: -50px;
            visibility: hidden;
        }

        .collapsible {
            padding-bottom: 1px;
        }

        .collapsible, .collapsible-header {
            border: none;
        }

        .collapsible-body {
            padding-top: 0px;
            padding-bottom: 0px;
            border: none;
        }

        .home-header {
            font-size: 5rem;
        }

        @media only screen and (max-width: 992px) {
            .home-header {
                font-size: 4rem;
            }
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
            var w = $(window);
            w.resize(function () {
                w.scrollTop(w.scrollTop() + 1);
                w.scrollTop(w.scrollTop() - 1);
            });
        });
    </script>

@endsection
        
@section('main')
    <div class="parallax-container parallax-foto">
        <div class="parallax">
            <img src="{{ asset('storage/foto.jpg')}}" style="width: 100%; min-width: 133vh;"/>
        </div>
        <div class="row">
            <h1 class="hide-on-med-and-down center white-text col s12 home-header" style="position: absolute; bottom: 100px; text-shadow: 4px 4px 2px rgba(0, 0, 0, 0.5);">
                <i class="center">&ldquo;{{ __('content.home.header')[0] }}&rdquo;</i>
            </h1>
            <h3 class="hide-on-large-only center white-text col s12" style="position: absolute; bottom: 100px; text-shadow: 4px 4px 2px rgba(0, 0, 0, 0.5);">
                <i class="center">&ldquo;{{ __('content.home.header')[0] }}&rdquo;</i>
            </h3>
        </div>
    </div>

    <a class="bookmark" name="logo"></a>
    <div class="section grey darken-4 z-depth-2" style="position: relative; z-index: 1; height: 160px;">
        <h4 class="center">
            <img src="{{ asset('storage/logo.png')}}" />
        </h4>
    </div>

    <div class="section white themed-bg">
        <div class="row container center themed-text">
            <h3 class="center">{{ __('content.home.header')[1] }}</h3>
            <p class="flow-text">{{ __('content.home.paragraph')[0] }}</p>
            <p class="flow-text">{{ __('content.home.paragraph')[1] }}</p>
            <p class="flow-text">{{ __('content.home.paragraph')[2] }}</p>
            <div class="row" style="margin: 0px;">
                <div class="col s4 m6 l12" style="height: 24px;"></div>
                <div class="col s4 m6 l12" style="height: 24px;"></div>
                <div class="col s4 m6 l12" style="height: 24px;"></div>
            </div>
            <ul class="collapsible col s12 m10 l8 offset-m1 offset-l2" style="padding: 0px;">
                <li>
                    <div class="collapsible-header z-depth-1 black-text"><i class="material-icons">desktop_windows</i><strong>{{ __('content.home.header')[2] }}</strong></div>
                    <div class="collapsible-body">
                        <p class="flow-text">{!! __('content.home.paragraph')[3] !!}</p>
                    </div>
                </li>
                
                <li>
                    <div class="collapsible-header z-depth-1 light-green accent-4 black-text"><i class="material-icons white-text">call_missed_outgoing</i><strong class="white-text">{{ __('content.home.header')[3] }}</strong></div>
                    <div class="collapsible-body">
                        <p class="flow-text">{!! __('content.home.paragraph')[4] !!}</p>
                    </div>
                </li>

                <li>
                    <div class="collapsible-header z-depth-1 grey lighten-1 black-text"><i class="material-icons">group</i><strong>{{ __('content.home.header')[4] }}</strong></div>
                    <div class="collapsible-body">
                        <p class="flow-text">{!! __('content.home.paragraph')[5] !!}</p>
                    </div>
                </li>

            </ul>
            <div class="row" style="margin: 0px;">
                <div class="col s4 m6 l12" style="height: 24px;"></div>
                <div class="col s4 m6 l12" style="height: 24px;"></div>
                <div class="col s4 m6 l12" style="height: 24px;"></div>
            </div>
            <a href="{{ route('success', ['locale' => App::getLocale()]) }}" class="waves-effect waves-light btn grey darken-2" style="padding-right: 40px; padding-left: 12px;">
                {{ __('pagination.about_success') }} <i class="large material-icons" style="position: absolute; right: 10px; top: 0px; font-size: 26px;">play_arrow</i>
            </a>
            <div class="row" style="margin: 0px;">
                <div class="col s4 m6 l12" style="height: 12px;"></div>
                <div class="col s4 m6 l12" style="height: 12px;"></div>
                <div class="col s4 m6 l12" style="height: 12px;"></div>
            </div>
        </div>
    </div>

@endsection