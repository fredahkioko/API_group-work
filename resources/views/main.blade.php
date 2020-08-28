<!doctype html>
    <html lang="en">
    <head>
        @include('partials._head')
    </head>
      <body>
          <br/>
              <div class="container">
                  @include('partials._messages')
                  @yield('content')
          @include('partials._footer')
           </div> <!--end of container row-->       
          @include('partials._javascript')
              <!--incase you want to add javascript-->
              @yield('scripts')
      </body>
</html>
