<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') | {{ config('app.name') }}</title>


    <link rel="stylesheet" href="{{asset('admin/customcss/style.css')}}">
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="hold-transition login-page">

    <!-- Content-box -->
    @yield('content')
    <!-- jQuery -->

    <!-- alert error box -->
    <div id="errorModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="icon-box">
                       X
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                </div>
                <div class="modal-body text-center">
                    <h4 id="errorTitle">Ooops!</h4>	
                    <p id="errorMsg">Something went wrong.</p>
                    <button class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> 
    <!-- alert error box -->

    <script>
        // Pass the base URL from Laravel to JavaScript
        window.appConfig = {
            baseUrl: @json(url('/')),
            apiUrl: @json(url('/api'))
        };
    </script>
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('admin/customjs/footer.js')}}"></script>
    <script src="{{asset('admin/customjs/app1.js')}}"></script>
</body>

</html>
