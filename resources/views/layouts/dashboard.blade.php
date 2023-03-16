<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
   @include('includes.backsite.meta')

   <title>@yield('title') | Lapori Backoffice</title>

   <link rel="apple-touch-icon" href="{{ asset('/assets/backsite/app-assets/images/ico/apple-icon-120.png') }}">
   <link rel="shortcut icon" type="image/x-icon"
      href="{{ asset('/assets/backsite/app-assets/images/ico/favicon.ico') }}">


   @stack('before-style')
   @include('includes.backsite.style')
   @stack('after-style')
</head>

<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu"
   data-col="2-columns">
   @include('sweetalert::alert')
   @include('components.backsite.header')
   @include('components.backsite.menu')
   @yield('content')
   @include('components.backsite.footer')

   @stack('before-script')
   @include('includes.backsite.script')
   @stack('after-script')

</body>

</html>