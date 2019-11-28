<html lang="en">
  @include('inc.head')
  
    <body>

    <div class="container">
        <div class="container">

         @include('inc.nav')

         @include('inc.bootstrap_alert')
        
      <div>
        {{-- <div class="jumbotron"> --}}
          @yield('content')
        {{-- </div> --}}
      </div>
    
   </div>

    @include('inc.footer')

    @include('inc.scripts')

    </body>
</html>