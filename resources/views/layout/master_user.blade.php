<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Perbaiah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/css/bootstrap-toggle.min.css" rel="stylesheet">
    {{--  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
          rel="stylesheet">  --}}
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/pages/dashboard.css" rel="stylesheet">
    <link href="/css/pages/signin.css" rel="stylesheet">
    <link href="/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <!--<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>-->
    <![endif]-->
    @yield('styles')
</head>
<body>

@include('layout.navbar_user')
<!-- /subnavbar -->
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>
<!-- /main -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/jquery-1.7.2.min.js"></script>
<script src="/js/excanvas.min.js"></script>
<script src="/js/chart.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/bootstrap-notify.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/bootstrap-toggle.min.js"></script>
<script src="/js/full-calendar/fullcalendar.min.js"></script>

<script src="/js/base.js"></script>
@include('layout.notification_success')
@yield('scripts')
</body>
</html>
