<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Registration Form</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('resources/css/stylesuser.css') }}">
    <link rel="icon" href="{{ asset('logonew.png') }}">
    <style>
        .text-danger {
            color: rgb(236, 48, 48);
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container register-container">
            <form action="{{ route('register.submit') }}" method="post">
                @csrf
                <h1>Register here.</h1>

                <div class="" style="width: 100%">
                    <input type="text" name="name" placeholder="Nama Nasabah" required
                        value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="" style="width: 100%">
                    <input type="text" name="phone" placeholder="Telp" required value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>

                <div class=" content">
                    <div class="radio">
                        <input type="radio" id="laki-laki" name="gender" value="Laki-laki"
                            {{ old('gender') == 'Laki-laki' ? 'checked' : '' }}>
                        <label for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="radio">
                        <input type="radio" id="perempuan" name="gender" value="Perempuan"
                            {{ old('gender') == 'Perempuan' ? 'checked' : '' }}>
                        <label for="perempuan">Perempuan</label>
                    </div>
                </div>
                @if ($errors->has('gender'))
                    <span class="text-danger" style="margin: 0!important;">{{ $errors->first('gender') }}</span>
                @endif

                <div class="" style="width: 100%">
                    <input type="text" name="address" placeholder="Alamat" required value="{{ old('address') }}">
                    @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                </div>

                <div class="" style="width: 100%">
                    <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="" style="width: 100%">
                    <input type="password" name="password" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="" style="width: 100%">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>

                <button type="submit">Register</button>
            </form>
        </div>

        <div class="form-container login-container">
            <form action="{{ route('login.submit') }}" method="post">
                @csrf
                <h1>Login here.</h1>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
                <span>or use your account</span>
                <div class="social-container">
                    <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
                    <a href="#" class="social"><i class="lni lni-google"></i></a>
                    <a href="#" class="social"><i class="lni lni-linkedin-original"></i></a>
                </div>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">Hello <br> friends</h1>
                    <p>if You have an account, login here and have fun</p>
                    <button class="ghost" id="login">Login
                        <i class="lni lni-arrow-left login"></i>
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">Start your <br> journey now</h1>
                    <p>if you don't have an account yet, join us and start your journey.</p>
                    <button class="ghost" id="register">Register
                        <i class="lni lni-arrow-right register"></i>
                    </button>
                </div>
            </div>
        </div>

        <img src="{{ asset('img/image.gif') }}" alt="image">

    </div>

    <script src="{{ asset('resources/js/loginuser.js?v=1') }}"></script>

</body>

</html>
