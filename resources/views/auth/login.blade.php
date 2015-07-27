@extends('app')

@section('content')
<div class="container auth-login">


        @include('left-preview')

		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@include('auth.login_form')
				</div>
			</div>
		</div>
</div>
@endsection
