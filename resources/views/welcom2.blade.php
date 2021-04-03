<!DOCTYPE html>
<html lang="en">
<head>
	<title>Studafrik</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('welcom/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('welcom/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('welcom/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('welcom/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('welcom/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('welcom/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="bg-g1 size1 flex-w flex-col-c-sb p-l-15 p-r-15 p-b-30">
		<div class="flex-w flex-c cd100 wsize1 bor1">
			{{-- <div class="flex-col-c-m size2 bg0 bor2">
				<span class="l1-txt3 p-b-7 days">35</span>
				<span class="s1-txt1">Days</span>
			</div>

			<div class="flex-col-c-m size2 bg0 bor2">
				<span class="l1-txt3 p-b-7 hours">17</span>
				<span class="s1-txt1">Hours</span>
			</div>

			<div class="flex-col-c-m size2 bg0 bor2">
				<span class="l1-txt3 p-b-7 minutes">50</span>
				<span class="s1-txt1">Minutes</span>
			</div>

			<div class="flex-col-c-m size2 bg0">
				<span class="l1-txt3 p-b-7 seconds">39</span>
				<span class="s1-txt1">Seconds</span>
			</div> --}}
		</div>


		<div class="flex-col-c w-full p-t-50 p-b-80">
			<h3 class="l1-txt1 txt-center p-b-10">
				Nous reviendrons bientôt
			</h3>

			<p class="txt-center l1-txt2 p-b-43 wsize2">
				Site en construction !!
			</p>

			
		</div>

		<span class="s1-txt2 txt-center">
			@ 2021 Studafrik
		</span>

	</div>



	

<!--===============================================================================================-->	
	<script src="{{ asset('welcom/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('welcom/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ asset('welcom/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('welcom/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('welcom/vendor/countdowntime/moment.min.js')}}"></script>
	<script src="{{ asset('welcom/vendor/countdowntime/moment-timezone.min.js')}}"></script>
	<script src="{{ asset('welcom/vendor/countdowntime/moment-timezone-with-data.min.js')}}"></script>
	<script src="{{ asset('welcom/vendor/countdowntime/countdowntime.js')}}"></script>
	<script>
		$('.cd100').countdown100({
			// Set Endtime here
			// Endtime must be > current time
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: ,
			endtimeHours: 18,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York", can be empty
			// go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('welcom/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('welcom/js/main.j')}}s"></script>

</body>
</html>