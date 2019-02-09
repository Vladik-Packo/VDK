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
        <div class="row">
            <div class="col s12 m6 l4 offset-l4 offset-m3 themed-text">
                <div class="card white themed-bg">
                    <div class="card-image">
                        <img src="{{ asset('storage/foto2.jpg') }}" />
                        <span class="card-title" style="text-shadow: 2px 2px 1px rgba(0, 0, 0, 1);">{{ config('content.name') }}</span>
                    </div>
                    <div class="card-content center">
                        <p class="flow-text">
                            {{ config('content.name') }}<br />
                            {{ config('content.street') }}<br />
                            {{ config('content.postcode').' '.config('content.city') }}<br /><br />
                            {{ config('content.mobile') }}<br />
                            {{ config('content.email') }}<br />
                        </p><br />
                        <p class="flow-text">
                            BTW nr.: {{ config('content.btw') }}<br />
                            KvK: {{ config('content.kvk') }}<br />
                        </p>
                    </div>
                    <div class="card-action center themed-border-top">
                        <a href="{{ url('storage', ['cv.docx']) }}" class="waves-effect waves-dark btn light-green accent-4">{{ __('content.cv') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection