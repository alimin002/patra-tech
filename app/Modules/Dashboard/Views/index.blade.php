@extends('main')
@section('title', 'Dashboards')
@section('content')
	<div class="page-content">
		<h2>Welcome {{ session('session_login')['username'] }}</h2>
  </div><!-- /.page-content -->

@endsection