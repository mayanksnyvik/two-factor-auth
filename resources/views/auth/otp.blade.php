<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div id="app">
        <div class="card col-5 mx-auto mt-5">
            <div class="card-header text-center">
                <p class="m-0">Two-Factor Authentication</p>
            </div>
            <div class="mt-4 card-body px-5">     
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        <p class="alert-message mb-0">{{ __('New code has been sent to your email address.') }}</p>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <p class="alert-message mb-0">{{ session('success') }}</p>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        <p class="alert-message mb-0">{{ session('error') }}</p>
                    </div>
                @endif


          
        
    

                <p>Your account is protected with two-factor authentication. We've sent you an email with the code. Please enter the code below.</p>
                <form method="POST" action="{{ route('2fa.verify') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="number" placeholder="Two-Factor Code" class="form-control @if(session('otp')) is-invalid @endif" name="otp" required autocomplete="off">
                    
                        @session('otp')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ session('otp') }}</p>
                        </span>
                      @endsession


                      @if (session('errors'))
                         <div class="alert alert-danger mt-2" role="alert">
                            @foreach (session('errors')->all() as $error)
                                  <p class="alert-message mb-0">{{ $error }}</p>
                            @endforeach
                        </div>
                  @endif

                      </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Continue') }}
                        </button>
                    </div>
                </form>

                <form class="d-inline" method="POST" action="{{ route('2fa.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0">{{ __('Click here to request another') }}</button>
                </form>

            </div>
        </div>
    </div>

    
</body>
</html>
