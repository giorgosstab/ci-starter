@extends('public.app')

@section('title', '')

@section('extra-css')

@endsection

@section('content')
	<div class="top-right links">
		@if (ci()->ion_auth->logged_in())
			<a href="#">Home</a>
		@else
			<a href="#">Login</a>
			<a href="#">Register</a>
		@endif
	</div>
	<div class="content">
		<div class="title m-b-md">
			{{ config_item('name') }}
		</div>

		<div class="links">
			<a href="https://codeigniter.com/docs">Docs</a>
			<a href="https://codeigniter.com/community">Community</a>
			<a href="https://forum.codeigniter.com/">Forum</a>
			<a href="http://benedmunds.com/ion_auth/">IonAuth</a>
			<a href="https://github.com/bcit-ci/CodeIgniter/">GitHub</a>
		</div>
	</div>
@endsection

@section('extra-script')

@endsection
