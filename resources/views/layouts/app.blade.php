<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ __('content.home.header')[1] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <meta name="theme-color" content="#212121">

    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flags.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
        img, .feb, .material-icons {
            user-select: none;
        }

        .nav-button {
            position: relative;
            top: -4px;
            height: 60px;
            line-height: 60px;
        }

        .sidenav .collection {
            display: none; 
            margin: 0px;
            border: none; 
            position: relative;
            top: 4px;
        }

        .sidenav .collection-item {
            position: relative;
            padding-top: 6px;
        }

        .sidenav .material-icons: {
            margin-right: 16px !important;
        }

        .check-icon {
            position: absolute; 
            right: 15px;
            top: 0px;
        }

        .check-icon-mobile {
            position: absolute; 
            right: 0px; 
            top: 0px;
        }

        .sidenav .collection .material-icons {
            position: absolute; 
            right: 0px; 
            top: 0px;
        }

        .responsive-text-align {
            text-align: left;
        }

        .social-icon {
            padding: 5px 5px !important;
        }

        .copy-container {
            text-align: left !important;
            position: relative;
            margin: 15px 0px;
            font-size: 1.224rem;
        }

        .copy {
            position: absolute;
            right: 0px;
            top: 0px;
            width: 36px;
            padding: 6px 6px;
            height: 36px;
        }

        .copy-mobile {
            position: absolute;
            right: -16px;
            top: 4px;
            width: 36px;
            padding: 6px 6px;
            height: 36px;
        }

        .copy:hover {
            cursor: pointer;
        }

        .toast {
            border-radius: 24px;
            background-color: #FFFFFFE6;
            color: #000;
            text-align: center;
        }
        
        #toast-container {
            position: fixed;
            top: 80%;
            right: 50%;
            max-width: 86%;
            transform: translateX(50%);
        }

        .contact-icon {
            margin-right: 10px;
            position: relative;
            top: 5px;
        }

        .dark-hover:hover {
            background-color: #1F1F1F !important;
        }

        @media only screen and (max-width: 992px) {
            .responsive-text-align {
                text-align: center; 
            }

            #toast-container {
                position: fixed;
                min-width: initial;
                text-overflow: ellipsis;
                white-space: nowrap;
                top: 80%;
                right: 50%;
                max-width: 86%;
                transform: translateX(50%);
            }
        }

        .switch label input[type=checkbox]:checked + .lever:after {
            background-color: #5ca625;
        }

        .switch label input[type=checkbox]:checked + .lever {
            background-color: #a1c784;
        }

        .dark-border-top {
            border-top: 1px solid rgba(0, 0, 0, 0.2) !important;
        }

        .btn {
            text-transform: none;
        }

    </style>

    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        /**
         * Copies a string to clipboard
         * 
         * @param {string} str string to copy 
         * @return {undefined}
         */
        function copyToClipboard(str) {
            var e = $('#clipboard');
            e.val(str);
            e.css({ display: 'initial' });
            e.select();
            document.execCommand("copy");
            e.css({ display: 'none' });
        }

        /**
        * Toggles the theme
        *
        * theme can either be 0 or 'light' for light mode
        * or 1 and 'dark' for dark mode
        * 
        * @param {int|string} theme 
        * @return {undefined}
        */
        theme = function(theme) {
            if (theme == 0 || theme == 'light') {
                sessionStorage.setItem('theme', 0);
                $('.themed-bg').removeClass('grey darken-4');
                $('.themed-bg').addClass('white');
                $('.themed-border-top').removeClass('dark-border-top');
                $('.themed-text').removeClass('grey-text text-lighten-1');
                $('.option-theme').prop('checked', false);
                
            }

            if (theme == 1 || theme == 'dark') {
                sessionStorage.setItem('theme', 1);
                $('.themed-bg').removeClass('white');
                $('.themed-bg').addClass('grey darken-4');
                $('.themed-border-top').addClass('dark-border-top');
                $('.themed-text').addClass('grey-text text-lighten-1');
                $('.option-theme').prop('checked', true);
            }
        }

        $(function () {
            // initialize theme storage
            if (sessionStorage.getItem('theme') == null) {
                sessionStorage.setItem('theme', 0);
            };

            var theme = sessionStorage.getItem('theme');

            // theme change event
            $('.option-theme').on('change', function (event) {
                if (event.target.checked) {
                    window.theme('dark');
                } else {
                    window.theme('light');
                }
            })

            if (theme == 1) {
                $('.option-theme').prop('checked', true);
                window.theme('dark');
            }

            // copy event
            $('.copy, .copy-mobile').click(function (event) {
                copyToClipboard($(event.target).parent().children('span').html());
                M.Toast.dismissAll();
                M.toast({ html: '{{ __('content.clipboard') }}' });
            });

            $('.sidenav').sidenav().on('click tap', '.sidenav-trigger', () => {
                $('.sidenav').sidenav('close');
            });

            $('.dropdown-trigger-locale').dropdown({ coverTrigger: false, alignment: 'right' });
            $('.dropdown-trigger-options').dropdown({ coverTrigger: false, alignment: 'right', closeOnClick: false });
        });

    </script>

    @yield('head')

</head>
<body class="grey">
    <input type="text" value="" id="clipboard" style="display: none;">

    <div class="navbar-fixed" style="height: 60px !important;">
        <nav style="height: 60px !important;">
            <div class="nav-wrapper grey darken-4 white-text">
                <a href="{{ url('storage', ['cv.docx']) }}" class="hide-on-med-and-down waves-effect waves-dark btn light-green accent-4" style="margin-left: 12px; position: relative; top: -4px;">{{ __('content.cv') }}</a>
                <div class="brand-logo hide-on-med-and-down center"><img src="{{ asset('storage/logo.png')}}" style="height: 60px; position: relative; top: -1px;" /></div>
                <div class="brand-logo hide-on-large-only"><img src="{{ asset('storage/logo-small.png')}}" style="height: 50px; margin-top: 5px;" /></div>
                <a data-target="sidenav-mobile" class="sidenav-trigger waves-effect waves-light" style="margin: 0px;"><i class="material-icons" style="position: relaitve; width: 60px; height: 60px; text-align: center; user-select: none; line-height: 60px;">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="white-text waves-effect waves-light nav-button" href="{{ route('home', ['locale' => App::getLocale()]) }}">{{ __('pagination.home') }}</a></li>
                    <li><a class="white-text waves-effect waves-light nav-button" href="{{ route('success', ['locale' => App::getLocale()]) }}">{{ __('pagination.success') }}</a></li>
                    <li><a class="white-text waves-effect waves-light nav-button" href="{{ route('balance', ['locale' => App::getLocale()]) }}">{{ __('pagination.balance') }}</a></li>
                    <li><a class="white-text waves-effect waves-light nav-button" href="{{ route('contact', ['locale' => App::getLocale()]) }}">{{ __('pagination.contact') }}</a></li>
                    <li><a class="white-text waves-effect waves-light dropdown-trigger-locale nav-button" data-target="dropdown-locale">
                        @switch(App::getLocale())
                            @case('en')
                                <img src="{{ asset('storage/blank.gif') }}" class="flag flag-gb" alt="Netherlands" />English
                                @break
                            @case('nl')
                                <img src="{{ asset('storage/blank.gif') }}" class="flag flag-nl" alt="Great Brittan" />Nederlands
                                @break
                        @endswitch
                        </a>
                    </li>
                    <li>
                        <a class="white-text waves-effect waves-light dropdown-trigger-options nav-button" data-target="dropdown-options" style="width: 60px; padding: 0px;">
                            <i class="material-icons check-icon center" style="height: 60px; line-height: 60px; position: relative; left: 0px;">settings</i>
                        </a>
                    </li>
                </ul>
                <ul id='dropdown-locale' class='dropdown-content grey darken-4' style="min-width: 200px;">
                    <a class="white-text waves-effect waves-light dark-hover" href="{{ url('en', ['home']) }}" style="min-width: 200px; outline: 0;"><img src="{{ asset('storage/blank.gif') }}" class="flag flag-gb" alt="English" />English 
                        @if(App::getLocale() == 'en') 
                            <i class="material-icons check-icon">check</i>
                        @endif
                    </a>
                    <a class="white-text waves-effect waves-light dark-hover" href="{{ url('nl', ['thuis']) }}" style="min-width: 200px; outline: 0;"><img src="{{ asset('storage/blank.gif') }}" class="flag flag-nl" alt="Netherlands" />Nederlands 
                        @if(App::getLocale() == 'nl')
                            <i class="material-icons check-icon">check</i>
                        @endif
                    </a>
                </ul>
                <ul id='dropdown-options' class='dropdown-content grey darken-4' style="min-width: 250px;">
                    <a class="white-text dark-hover" style="min-width: 250px; outline: 0; cursor: default; user-select: none;">
                        <i class="material-icons" style="display: inline-block; margin-right: 15px;">format_color_fill</i>{{ __('pagination.theme') }}
                        <div class="switch" style="display: inline-block; position: absolute; top: 0px; right: 0px;">
                            <label>
                                <input type="checkbox" class="option-theme"/>
                                <span class="lever"></span>
                            </label>
                        </div>
                    </a>
                </ul>
            </div>
        </nav>
    </div>
    <ul class="sidenav grey darken-4" id="sidenav-mobile">
        <li><a class="grey darken-4 white-text center z-depth-2" href="{{ route('home', ['locale' => App::getLocale()]) }}" style="height: 92px; user-select: none;"><img src="{{ asset('storage/logo.png')}}" style="width: 250px; margin-top: 10px;" /></a></li>
        <li><a class="white-text sidenav-trigger waves-effect waves-light" href="{{ route('home', ['locale' => App::getLocale()]) }}"><i class="material-icons white-text">home</i>{{ __('pagination.home') }}</a></li>
        <li><a class="white-text sidenav-trigger waves-effect waves-light" href="{{ route('success', ['locale' => App::getLocale()]) }}"><i class="material-icons white-text">thumb_up</i>{{ __('pagination.success') }}</a></li>
        <li><a class="white-text sidenav-trigger waves-effect waves-light" href="{{ route('balance', ['locale' => App::getLocale()]) }}"><i class="material-icons white-text" style="transform: scaleY(-1);">details</i>{{ __('pagination.balance') }}</a></li>
        <li><a class="white-text sidenav-trigger waves-effect waves-light" href="{{ route('contact', ['locale' => App::getLocale()]) }}"><i class="material-icons white-text">local_phone</i>{{ __('pagination.contact') }}</a></li>
        <li style="position: relative; z-index: 2;">
            <a class="dropdown-trigger-locale-mobile white-text waves-effect waves-light z-depth-1" onclick="$('#menu-locale-mobile').slideToggle(150);"><i class="material-icons white-text">language</i>
                @switch(App::getLocale())
                    @case('en')
                        &nbsp;<img src="{{ asset('storage/blank.gif') }}" class="flag flag-gb" alt="Netherlands" />English
                        @break
                    @case('nl')
                        &nbsp;<img src="{{ asset('storage/blank.gif') }}" class="flag flag-nl" alt="Great Brittan"  />Nederlands
                        @break
                @endswitch
            </a>
        </li>
        <ul id="menu-locale-mobile" style="display: none;">
            <li>
                <a class="grey darken-4 white-text waves-effect waves-light z-depth-1 dark-hover" href="{{ url('en', ['home']) }}"><img src="{{ asset('storage/blank.gif') }}" class="flag flag-gb" alt="English" />English
                @if(App::getLocale() == 'en') 
                    <i class="material-icons white-text check-icon-mobile">check</i>
                @endif </a>
            </li>
            <li>
                <a class="grey darken-4 white-text waves-effect waves-light z-depth-1 dark-hover" href="{{ url('nl', ['thuis']) }}"><img src="{{ asset('storage/blank.gif') }}" class="flag flag-nl" alt="Netherlands" />Nederlands
                @if(App::getLocale() == 'nl')
                    <i class="material-icons white-text check-icon-mobile">check</i>
                @endif </a>
            </li>
        </ul>
        <li>
            <a class="white-text" style="position: relative; cursor: default;"><i class="material-icons white-text">format_color_fill</i>
                {{ __('pagination.theme') }}

                <div class="switch" style="display: inline-block; position: absolute; top: 0px; right: 0px;">
                    <label>
                        <input type="checkbox" class="option-theme"/>
                        <span class="lever"></span>
                    </label>
                </div>
            </a>
        </li>
        <footer class="page-footer grey darken-3">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="copy-container" style="padding-left: 24px; margin-bottom: 18px;"><i class="material-icons contact-icon">person</i>{{ config('content.name') }}</div>
                        <div class="copy-container">
                            <a class="btn waves-effect waves-light grey darken-4" href="tel:{{config('content.mobile')}}" style="height: 42px; font-size: 16px; width: 210px;">
                                <i class="material-icons contact-icon" style="font-size: 1.5rem; margin-right: 5px;">local_phone</i>
                                <span>{{ config('content.mobile') }}</span>
                            </a> 
                            <i class="material-icons copy-mobile waves-effect waves-light">content_copy</i>
                        </div>
                        <div class="copy-container">
                            <a class="btn waves-effect waves-light grey darken-4" href="mailto:{{config('content.email')}}" style="height: 42px; font-size: 16px; width: 210px;">
                                <i class="material-icons contact-icon" style="font-size: 1.5rem; margin-right: 5px;">email</i>
                                <span>{{ config('content.email') }}</span>
                            </a>
                            <i class="material-icons copy-mobile waves-effect waves-light">content_copy</i>
                        </div>
                        <div class="center"><a href="{{ url('storage', ['cv.docx']) }}" class="waves-effect waves-dark btn light-green accent-4" style="margin-top: 12px;">{{ __('content.cv') }}</a></div>
                        <div class="row" style="margin-top: 24px;">
                            <a class="col s4 center grey-text text-lighten-3 waves-effect waves-light social-icon" href="{{ config('content.url.facebook') }}" target="_blank"><i class="fab fa-facebook-f fa-3x"></i></a>
                            <a class="col s4 center grey-text text-lighten-3 waves-effect waves-light social-icon" href="{{ config('content.url.twitter') }}" target="_blank"><i class="fab fa-twitter fa-3x"></i></a>
                            <a class="col s4 center grey-text text-lighten-3 waves-effect waves-light social-icon" href="{{ config('content.url.linkedin') }}" target="_blank"><i class="fab fa-linkedin-in fa-3x"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright grey darken-4 center">
                <div class="container">
                    {{ config('content.copyright') }} <br /> KvK: {{ config('content.kvk') }} <br /> BTW nr.: {{ config('content.btw') }}
                </div>
            </div>
        </footer>
    </ul>

    <main>
        @yield('main')
    </main>

    <footer class="page-footer grey darken-3">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text responsive-text-align">{{ __('content.footer.header') }}: </h5>
                    <p class="grey-text text-lighten-4 responsive-text-align">{{ __('content.footer.paragraph') }}</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text responsive-text-align" style="margin-bottom: 36px;">Constantia et labore</h5>
                    <div class="responsive-text-align copy-container"><i class="material-icons contact-icon">person</i>{{ config('content.name') }}</div>
                    <div class="responsive-text-align copy-container">
                        <i class="material-icons contact-icon">local_phone</i>
                        <span>{{ config('content.mobile') }}</span>
                        <i class="material-icons copy waves-effect waves-light">content_copy</i>
                    </div>
                    <div class="responsive-text-align copy-container">
                        <i class="material-icons contact-icon">email</i>
                        <span>{{ config('content.email') }}</span> 
                        <i class="material-icons copy waves-effect waves-light">content_copy</i>
                    </div>
                    <div class="row" style="margin-top: 36px;">
                        <a class="col s4 center grey-text text-lighten-3 waves-effect waves-light social-icon" href="{{ config('content.url.facebook') }}" target="_blank"><i class="fab fa-facebook-f fa-3x"></i></a>
                        <a class="col s4 center grey-text text-lighten-3 waves-effect waves-light social-icon" href="{{ config('content.url.twitter') }}" target="_blank"><i class="fab fa-twitter fa-3x"></i></a>
                        <a class="col s4 center grey-text text-lighten-3 waves-effect waves-light social-icon" href="{{ config('content.url.linkedin') }}" target="_blank"><i class="fab fa-linkedin-in fa-3x"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright grey darken-4 center">
            <div class="container">
                {{ config('content.copyright') }} &nbsp; | &nbsp; KvK: {{ config('content.kvk') }} &nbsp; | &nbsp; BTW nr.: {{ config('content.btw') }}
            </div>
        </div>
    </footer>
</body>
</html>