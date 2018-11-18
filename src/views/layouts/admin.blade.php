@extends(Config::get('chatter.master_file_extend'))

@section(Config::get('chatter.yields.head'))
  <link href="{{ url('/vendor/devdojo/chatter/assets/vendor/spectrum/spectrum.css') }}" rel="stylesheet">
	<link href="{{ url('/vendor/devdojo/chatter/assets/css/chatter.css') }}" rel="stylesheet">
  <link href="{{ url('/chatter-admin/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ url('/chatter-admin/css/nexus.css') }}" rel="stylesheet">
  <link href="{{ url('/chatter-admin/css/animate.css') }}" rel="stylesheet">
  <link href="{{ url('/chatter-admin/css/chatteradmin.css') }}" rel="stylesheet">
  <link href="{{ url('/chatter-admin/css/tablet.css') }}" rel="stylesheet">
  <link href="{{ url('/chatter-admin/css/desktop.css') }}" rel="stylesheet">
@stop

@section('content')

<div id="chatter" class="chatter_home">

	<div id="chatter_hero">
		<div id="chatter_hero_dimmer"></div>
		<?php $headline_logo = Config::get('chatter.headline_logo'); ?>
		@if( isset( $headline_logo ) && !empty( $headline_logo ) )
			<img src="{{ Config::get('chatter.headline_logo') }}">
		@else
			<h1>@lang('chatter::intro.headline')</h1>
			<p>@lang('chatter::intro.description')</p>
		@endif
	</div>

  <div class="chatter-admin-extendedx">
    @yield('chattercontent')
  </div>
</div>
@endsection

@section(Config::get('chatter.yields.footer'))

<script src="{{ url('/vendor/devdojo/chatter/assets/vendor/spectrum/spectrum.js') }}"></script>
<script src="{{ url('/vendor/devdojo/chatter/assets/js/chatter.js') }}"></script>
<script src="{{ url('/chatter-admin/js/chatteradmin.js') }}"></script>
<script src="{{ url('/chatter-admin/js/jscolor.js') }}"></script>

@stop
