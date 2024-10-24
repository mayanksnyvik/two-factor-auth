<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="display: flex; justify-content: center; align-items: center; height:100vh; width:100%; background-color:#edf2f7;" >
    <div id="app"> 
        <div class="container">
            <div class="row">
              <div class="col-10 col-sm-12 col-md-12 m-auto">
                  <div class="card">
                      {{-- <div>{{ __('Your One-Time Password (OTP)') }}</div> --}}
                    <div class="card-body">
                        <p>Hello User,</p>
                        <p>Your OTP code for two-factor authentication is:</p>
                        <div style="font-size: 18px; font-weight: bold;">
                            {{ $otp }}
                        </div>
                        <p>Thank you for using our service!</p>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
                <div class="col-12">
                  <div class=" footer mt-4">
                    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                  </div>
              </div>
            </div>
        </div>
    </div>
</body>
</html>
