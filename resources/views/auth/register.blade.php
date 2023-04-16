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
                        <strong>Sign Up</strong>
                        <p>Sign up to make purchase</p>
                    </div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="username">
                            <label for="user-form">Username</label>
                            <input type="text" class="user-form" name="name" placeholder="Username">
                        </div>
                        <div class="username">
                            <label for="user-form">Email</label>
                            <input type="text" class="user-form" name="email" placeholder="Email Address">
                        </div>
                        <div class="password">
                            <label for="pw-form">Create Password</label>
                            <input type="password" class="pw-form" name="password" placeholder="password">
                        </div>
                        <div class="password">
                            <label for="pw-form">Re-enter Password</label>
                            <input type="password" class="pw-form" name="password_confirmation" placeholder="password">
                        </div>
                        <div class="sign-up">
                            <p>Already have an account? <a href="login.html" class="sign-here">Log in</a> here</p>
                            <button type="submit" class="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
