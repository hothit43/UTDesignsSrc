@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <h2>Whats up</h2>
  @if (! have_posts())
    @alert(['type' => 'warning'])
      {{ __('Sorry, no results were found.', 'sage') }}
    @endalert

    {!! get_search_form(false) !!}
  @endif

  @while (have_posts()) @php(the_post())
    @includeFirst(['partials.content-'.get_post_type(), 'partials.content'])
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection

@section('sidebar')
  @include('partials.sidebar')
@endsection
