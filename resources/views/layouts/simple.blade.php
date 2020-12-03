<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')

  <body @php(body_class('overflow-x-hidden'))>
    @php(wp_body_open())
        @yield('home')
        @php(wp_footer())
  </body>
</html>
