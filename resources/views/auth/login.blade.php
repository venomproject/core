@extends('auth.layout.template')
@section('content')

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="#l"><b>Panel</b>CMS</a>
		</div>

		<div class="login-box-body">
			<p class="login-box-msg">
			<!-- 
				<a class="btn btn-link" href="{{ url('/password/reset') }}">{{trans('passwords.forgot')}}</a>
			 -->	
			</p>

			<form role="form" method="POST" action="{{ url('/login') }}">
				{!! csrf_field() !!}
				<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">

					<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email"> 
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>

					@if ($errors->has('email')) 
						<span class="help-block"> <strong>{{ $errors->first('email') }}</strong></span> 
					@endif

				</div>


				<div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
					<input type="password" class="form-control" name="password" placeholder="Password"> <span
						class="glyphicon glyphicon-lock form-control-feedback"></span> 
						@if ($errors->has('password')) 
							<span class="help-block"><strong>{{ $errors->first('password') }}</strong></span> 
						@endif
				</div>


				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<label> <input type="checkbox" name="remember">
								{{trans('auth.remember')}}
							</label>
						</div>
					</div>
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">
							<i class="fa fa-btn fa-sign-in"></i>{{trans('auth.login')}}
						</button>
					</div>
				</div>

			</form>
		</div>
	</div>
	@endsection