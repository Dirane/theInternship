<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 10;
            }
            @media (max-width: 360px){
				#title{
					font-size: 44px;
				}
				.links {
					font-size: 8px;
					font-weight: 300;
				}
			}

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body> <div class="container-fluid">
        <div class="flex-center full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div id="title" class="title m-b-md">
                    TheInternship
                </div>

                	Build your skill with industrial standard by doing internships in 
                	<div class="divider"> </div>
                	<br />
                <div class="row">
                	<form method="post" action="/search">
                		{!! csrf_field() !!}

	                    <div id ="search" class="col-xs-5 col-sm-3 col-md-3">
	                    	<span class="links"> search keyword </span>
	                    <input type="text" name="search" class="form-control" placeholder="company type or field of specialty">
	                    </div>
	                    
	                    <div id="country-search" class="col-xs-5 col-sm-3 col-md-3">
	                    	<span class="links"> country</span>
	                    <input type="text" name="country" class="form-control" placeholder="country">
	                    </div>
	                    <div id="state-search" class="col-xs-5 col-sm-3 col-md-3">
	                    	<span class="links"> state</span>
	                    <input type="text" name="state" class="form-control" placeholder="state">
	                    </div>
	                    <div class="col-xs-3 col-sm-3 col-md-3">
	                    	<span class="links"> &nbsp</span>
	                    <button type="button" class="btn btn-primary">search</button>
	                    </div>
                	</form>
                </div>
            </div>
        </div>

    </div>
<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
