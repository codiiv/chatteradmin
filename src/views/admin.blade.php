@extends('chatter::layouts.admin')
@section('chattercontent')
<div class="admin-inner">
  <div class="pure-g full-master">
    <div class="hand--1-8 nexus--1-8 main-menu-admin">
      @include('chatter::partials.navigation')
    </div><div class="nexus--7-8 hand--7-8">
      @if($ismaster)
        @yield('page')
      @else
        @include('chatter::partials.errors.restricted')
      @endif
    </div>
  </div>
</div>
@endsection
