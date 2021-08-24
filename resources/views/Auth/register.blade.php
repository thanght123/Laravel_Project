
<!DOCTYPE html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="../assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="../assets/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="../assets/css/font.css" type="text/css"/>
<link href="../assets/css/font-awesome.css" rel="stylesheet"> 
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- //font-awesome icons -->
<script src="../assets/js/jquery2.0.3.min.js"></script>


</head>
<body>
@if(session('message'))
      <span class = "alert alert-success" style="top: 0px;width: 100%;text-align: center;position: absolute;">
          <strong>{{session('message')}}</strong>
      </span>
      @endif
<div class="log-w3">
<div class="w3layouts-main" style="margin-top: 30px;">
	<h2>REGISTER</h2>
		<form action="{{ route('register.post') }}" method="post">
            @csrf
            <input type="text" class="ggg  @error('name') is-invalid @enderror"  name="name" placeholder="NAME" >
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
			<input type="email" class="ggg  @error('email') is-invalid @enderror"  name="email" placeholder="E-MAIL" >
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
			<input type="password" class="ggg @error('password') is-invalid @enderror " name="password" placeholder="PASSWORD">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror

          <input type="password" name="confirm-password"class="ggg @error('password') is-invalid @enderror" id="confim-password" placeholder="CONFIRM PASSWORD" >
      @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
			<span><input type="checkbox" />Remember Me</span>
			<h6><a href="#">Forgot Password?</a></h6>
				<div class="clearfix"> </div>
                <div class="form" style="display: flex;">
                <input type="submit" value="Register" name="register">
                <a class="button" href="{{ route('login') }}" style="display: table;background-color: #f0bcb4;font-size: 18px;padding: 12px 38px;border: none;cursor: pointer;margin: 45px auto 31px;outline: none;text-transform: uppercase;text-decoration: none;">LOGIN</a>
                </div>
				
		</form>
</div>
</div>
<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/jquery.slimscroll.js"></script>
<script src="../assets/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="../assets/js/jquery.scrollTo.js"></script>
</body>
</html>
