<!DOCTYPE html>

<html>

	<head>

	 	<meta charset="utf-8">

	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	  	<title>Redirect | Login</title>

	  

	  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	  	

	  	{{ Html::style('assets/bootstrap/css/bootstrap.min.css') }}

		{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}

		{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}

		{{ Html::style('assets/dist/css/AdminLTE.min.css') }}

		{{ Html::style('assets/plugins/iCheck/square/blue.css') }}



	  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

		<!--[if lt IE 9]>

		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

		<![endif]-->



		<style type="text/css">

			.au-alert{

				width: 400px;

				position: absolute;

				right: 5px;

				top: 30px;

			}

		</style>

	</head>

	<body class="hold-transition login-page">

		@if($errors->has('error'))

			<div class="au-alert alert alert-danger alert-dismissible">



		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

		        <h4><i class="icon fa fa-ban"></i> Alert!</h4>

		        {{$errors->first('error')}}

		  	</div>

		@endif

		<div class="login-box">

		  	<div class="login-logo">

		    	<a href="{{url('/')}}">Redirect</a>

		  	</div>

  			<!-- /.login-logo -->

  			<div class="login-box-body">

    			<p class="login-box-msg">Sign in to start your session</p>



    			<form action="admin_login" method="post">

					<input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>

      				<div class="form-group @if($errors->has('user_email')) {{'has-error'}} @endif">

      						

      					@if($errors->has('user_email'))

      						<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$errors->first('user_email')}}</label>

                    	@endif



        				<input type="email" class="form-control" placeholder="Email" name="user_email" value="{{ old('user_email') }}" required />

      				</div>

      				<div class="form-group @if($errors->has('user_password')) {{'has-error'}} @endif">



      					@if($errors->has('user_password'))

      						<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$errors->first('user_password')}}</label>

                    	@endif



        				<input type="password" class="form-control" placeholder="Password" name="user_password" required />

      				</div>

      				<div class="row">

        				<!-- /.col -->

    					<div class="col-xs-offset-8 col-xs-4">

          					<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

        				</div>

        				<!-- /.col -->

      				</div>

    			</form>



    			<a href="#">I forgot my password</a>

  			</div>

			<!-- /.login-box-body -->

		</div>

		<!-- /.login-box -->



		{{ Html::script('assets/plugins/jQuery/jquery-2.2.3.min.js') }}

		{{ Html::script('assets/bootstrap/js/bootstrap.min.js') }}

		{{ Html::script('assets/plugins/iCheck/icheck.min.js') }}

		<script>

		  $(function () {

		    $('input').iCheck({

		      checkboxClass: 'icheckbox_square-blue',

		      radioClass: 'iradio_square-blue',

		      increaseArea: '20%' // optional

		    });

		  });

		</script>

	</body>

</html>