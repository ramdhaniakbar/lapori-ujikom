<!DOCTYPE html>
<html lang="en">

<head>
   @include('includes.frontsite.meta')

   <title>@yield('title') | {{ config('app.name', 'lapor!') }}</title>

   @include('includes.frontsite.style')

</head>

<body>

   @yield('content')

   @yield('scripts')
   @include('includes.frontsite.script')
</body>

</html>