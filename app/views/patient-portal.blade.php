@extends('layouts.navbar')

@section('head')
	<title>Patient portal</title>
@stop

@section('nav')
	<li><a href="/">Home</a></li>
	
    <li class="active" class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Patient Portal <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/patients-home">Home</a></li>
          <li><a href="/login">Login</a></li>
          <li><a href="/register">Register</a></li>
          <li class="active"><a href="/patient-portal">Patient Portal</a></li>
          <li><a href="/patient-details">Patient Details</a></li>
          <li><a href="/logout">Log Out</a></li>
        </ul>
	</li>
    <li><a href="/google-locations">Locations</a></li>
    <li><a href="/blog">Blog</a></li>
@stop

@section('content')
	<h1>Patient portal</h1>
	<p>&nbsp;</p>

	@if(Auth::user())

		<a href="patient-details-test" type="button" class="btn btn-lg btn-default">Get my patient details</a>
	
		<h2>Your information</h2>

		@if(Auth::user()['attributes'])		
			@foreach (Auth::user()['attributes'] as $key => $value)
				<?php if (($key) && ($value)) { ?>
					@if (isset(Auth::user()['niceNames'][$key]))
						<p><h3>{{ Auth::user()['niceNames'][$key] }}</h3><h4>{{ $value }}</h4></p>
					@endif
				<?php } ?>
			@endforeach
		@endif		
	@else
		<h2>Your information could not be retrieved</h2>
	@endif
	
	@if(!Session::has('message'))
		{{ Session::put('message', 'test'); }}
	@endif
	
	@if(Session::has('message'))
	    <script type="text/javascript">
	        $(document).ready(function() {
	            $('#popOverLogin').popover('show');
	            setTimeout(function() {
	                $('#popOverLogin').popover('hide');
	            }, 6000);
	        });
	    </script>
	@endif
@stop