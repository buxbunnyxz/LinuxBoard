<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - {{ __('intelboard.site_title') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/variables.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.0/css/line.css">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon.png') }}">
</head>
<body>
    <main class="main-content">
        <div class="admin" style="background-image:url({{ asset('assets/img/admin-bg-light.png') }});">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                        <div class="edit-profile">
                            <div class="edit-profile__logos">
                                <img class="dark" src="{{ asset('assets/img/logo-dark.png') }}" alt="">
                                <img class="light" src="{{ asset('assets/img/logo-white.png') }}" alt="">
                            </div>
                            <div class="card border-0">
                                <div class="card-header">
                                    <div class="edit-profile__title">
                                        <h6>{{ __('login.sign_in_title') }}</h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('authenticate', ['locale' => app()->getLocale()]) }}" method="POST">
                                        @csrf
                                        <div class="edit-profile__body">
                                            <div class="form-group mb-20">
                                                <label for="email">{{ __('login.username_or_email') }}</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="{{ __('login.email_placeholder') }}">
                                                @if($errors->has('email'))
                                                    <p class="text-danger">{{$errors->first('email')}}</p>
                                                @endif
                                            </div>
                                            <div class="form-group mb-15">
                                                <label for="password-field">{{ __('login.password') }}</label>
                                                <div class="position-relative">
                                                    <input id="password-field" type="password" class="form-control" name="password" placeholder="{{ __('login.password_placeholder') }}">
                                                    <span toggle="#password-field" class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2"></span>
                                                </div>
                                                @if($errors->has('password'))
                                                    <p class="text-danger">{{$errors->first('password')}}</p>
                                                @endif
                                            </div>
                                            <div class="admin-condition">
                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="check-1">
                                                    <label for="check-1">
                                                        <span class="checkbox-text">{{ __('login.keep_logged_in') }}</span>
                                                    </label>
                                                </div>
                                                <a href="{{ route('forget_password', ['locale' => app()->getLocale()]) }}">{{ __('login.forget_password') }}</a>
                                            </div>
                                            <div class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                <button class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                                                    {{ __('login.sign_in_button') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="px-20">
                                    <p class="social-connector social-connector__admin text-center">
                                        <span>{{ __('login.or') }}</span>
                                    </p>
                                    <div class="button-group d-flex align-items-center justify-content-center">
                                        <ul class="admin-socialBtn">
                                            <li>
                                                <button class="btn text-dark google">
                                                    <img class="svg" src="{{ asset('assets/img/google-Icon.svg') }}" alt="img" />
                                                </button>
                                            </li>
                                            <li>
                                                <button class=" radius-md wh-48 content-center facebook">
                                                    <i class="uil uil-facebook-f"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="radius-md wh-48 content-center twitter">
                                                    <i class="uil uil-twitter"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="radius-md wh-48 content-center github">
                                                    <i class="uil uil-github"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="admin-topbar">
                                    <p class="mb-0">
                                        {{ __('login.no_account') }}
                                        <a href="{{ route('register', ['locale' => app()->getLocale()]) }}" class="color-primary">
                                            {{ __('login.sign_up') }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="overlayer">
        <div class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </div>
    </div>
    <div class="enable-dark-mode dark-trigger">
        <ul>
            <li>
                <a href="#">
                    <i class="uil uil-moon"></i>
                </a>
            </li>
        </ul>
    </div>
    <script src="{{ asset('assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.min.js') }}"></script>
</body>
</html>
