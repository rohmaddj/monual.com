<!DOCTYPE html>

<html lang="en">

 <head>

   @include('layout.includes.head')

 </head>



 <body>



@include('layout.includes.nav')



       @include('layout.includes.header')



@yield('content')



@include('layout.includes.footer')

@include('layout.includes.footer-scripts')




 </body>

</html>
