<link rel="stylesheet" href="{{asset('admin/customcss/login.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Wix+Madefor+Display:wght@400..800&display=swap"
    rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
<x-guest-layout>
    @section('title')
        {{ 'Log in' }}
    @endsection

    <div id="login-page1">
        <div class="login-page-banner">
            <div class="login-page-container">
                <div class="login-page-content">
                    <div class="login-page-left-content">
                        <h1>
                            Welcome to <br><span>Crazy Simple</span>
                        </h1>
                        <img src="{{asset('admin/img/login2.png')}}" alt="">
                    </div>
                    <div class="login-page-right-form">
                        <div class="login-right-form">
                            <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header card_header11 text-center">
                <!-- <a href="/" class="h1"><b>{{ config('app.name') }}</a> -->
                <img src="{{asset('admin/img/login1.png')}}" alt="">
            </div>
            <div class="card-body">
                <!-- <p class="login-box-msg">Sign in to start your session</p> -->

                <form action="{{ route('two.step.verify') }}" method="POST">
    @csrf
    <div class="input-group mb-3 input_gp11">
        <label for="otp">OTP</label>
        <input id="otp" class="form-control" type="password" name="otp" required autocomplete="current-password">
        <x-input-error :messages="$errors->get('otp')" class="mt-2" />
    </div>

    <div class="row">
        <div class="col-8">
            <div class="icheck-primary ichk_pm">
                <!-- Resend OTP button -->
                <button type="button" id="resendOtpBtn" class="btn btn-link" {{ $remainingTime > 0 ? 'disabled' : '' }}>
                    Resend OTP (<span id="timer">{{ $remainingTime }}</span>s)
                </button>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Verify</button>
        </div>
        <!-- /.col -->
    </div>
</form>

<script>
    let remainingTime = {{ $remainingTime }};
    const timerElement = document.getElementById('timer');
    const resendButton = document.getElementById('resendOtpBtn');

    if (remainingTime > 0) {
        const interval = setInterval(() => {
            remainingTime--;
            timerElement.textContent = remainingTime;

            if (remainingTime <= 0) {
                clearInterval(interval);
                resendButton.disabled = false;
                timerElement.textContent = '';
            }
        }, 1000);
    }

    resendButton.addEventListener('click', function() {
        resendButton.disabled = true;

        fetch('{{ route('two.step.resend') }}', {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('OTP has been resent!');
                startTimer(120);
            } else {
                alert(data.error || 'Failed to resend OTP.');
                resendButton.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error occurred while resending OTP.');
            resendButton.disabled = false;
        });
    });

    function startTimer(seconds) {
        remainingTime = seconds;
        resendButton.disabled = true;
        const interval = setInterval(() => {
            remainingTime--;
            timerElement.textContent = remainingTime;

            if (remainingTime <= 0) {
                clearInterval(interval);
                resendButton.disabled = false;
                timerElement.textContent = '';
            }
        }, 1000);
    }
</script>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</x-guest-layout>