<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>@yield('title') - Twins D.</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="/css/all.css">     
        <link rel="stylesheet" href="/css/app.css">       
    </head>

    <body class="@yield('body_class')">
        @yield('content')
        
        @include('includes.footer')
        
        <!-- particles.js container --> 
        <div id="particles-js"></div>
        
        <script src="/js/all.js"></script>
                         
    </body>        
</html>