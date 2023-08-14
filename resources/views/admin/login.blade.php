<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dore jQuery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="/css/vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="/css/main.css" />
</head>

<body class="background show-spinner no-footer">
<div class="fixed-background"></div>
<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">

                        <p class=" text-white h2">پنل ادمین</p>

                        <p class="white mb-0">
                            برای ورود به پنل ادمین لطفا اطلاعات حساب کاربری خود را وارد نمایید
                        </p>
                    </div>
                    <div class="form-side">
                        <a href="/admin">
                            <span class="logo-single"></span>
                        </a>
                        <h6 class="mb-4">ورود</h6>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <label class="form-group has-float-label mb-4">
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span>ایمیل</span>
                            </label>

                            <label class="form-group has-float-label mb-4">
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="" required />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span>رمز عبور</span>
                            </label>
                            <div class="d-flex justify-content-between align-items-center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                      رمز عبور خود را فراموش کرده ام
                                    </a>
                                @endif
                                <button class="btn btn-primary btn-lg btn-shadow" type="submit">ورود به پنل ادمین</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="/js/vendor/jquery-3.3.1.min.js"></script>
<script src="/js/vendor/bootstrap.bundle.min.js"></script>
<script src="/js/dore.script.js"></script>
<script src="/js/scripts.js"></script>
</body>

</html>
