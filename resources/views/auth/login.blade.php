<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/style.css') }}">
</head>

<body>
    <section class="log-in">
        <div class="log-in-container container">
            <div class="log-body">
                <div class="log-content">
                    <div class="login">
                        <strong>Login</strong>
                        <p>Enter login details to get access</p>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="username">
                            <label for="user-form">Username Or Email Address</label>
                            <input type="text" class="user-form" name="email"
                                placeholder="Username / Email Address">
                        </div>
                        <div class="password">
                            <label for="pw-form">Password</label>
                            <input type="password" class="pw-form" placeholder="password" name="password">
                        </div>
                        <div class="forgot">
                            <a href="#">Forgot Password?</a>
                        </div>
                        <div class="sign-up">
                            <p>Don’t have an account? <a href="signin.html" class="sign-here">Sign Up</a> here</p>
                            <button type="submit" class="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
