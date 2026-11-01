<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<title>{{ $settings['site_name'] }} - Under Maintenance</title>
	<meta name="description" content="">
	<meta name="author" content="Almir Frances">
	<!--FONT-->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:400,700">
	<link rel="stylesheet" href="{{ asset('soon/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('soon/css/code-style.css') }}" />
	<link rel="stylesheet" href="{{ asset('soon/css/animate.css') }}" />
	<link rel="stylesheet" href="{{ asset('soon/css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('soon/css/jquery.mmenu.all.css') }}" />

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
	<!--DEMO-->
</head>

<body>
	<!--PRELOADER-->
	<div id="preloader">
		<div id="status">
			<div class="status1"><i class="fa fa-clock-o fa-2x fa-spin"></i></div>
			{{-- <div class="status2"></div> --}}
		</div>
	</div>

	<div id="terminal"></div>

	<!--FRONT PAGE-->
	<!--ANIMATED TEXT-->
	<div class="content container">

		<!--LOGO-->
		<div class="wow bounceInDown" data-wow-duration="3s" data-wow-delay="3s">
			<img src="{{ asset('storage/' . $settings['logo_light']) }}" class="logo" alt="" />
		</div>

		<!--COMING SOON-->
		<div class="soon wow bounceInDown" data-wow-duration="3s" data-wow-delay="0s">
			{{ $settings['soon_title'] }}
		</div>

		<!--ROTATING TEXT-->
		<h1 class="text-rotator-fade wow bounceInDown" data-wow-duration="2s" data-wow-delay="2s">
			<span class="rotate">
				{{ $settings['soon_heading'] }}
			</span>
		</h1>

		<!--HOURGLASS-->
		<div class="si-icons si-icons-hover wow rotateIn pad30" data-wow-duration="3s" data-wow-delay="4s">
			<span class="si-icon si-icon-hourglass" data-icon-name="hourglass"></span>
		</div>


		<i class="fa fa-dot-circle-o size wow bounceIn" data-wow-duration="2s" data-wow-delay="6s"></i>

		<span class="link-effect wow bounceIn" data-wow-duration="2s" data-wow-delay="6.5s">
			<a href="#page-right">join</a><i class="fa fa-arrow-right marg-left5"></i>
		</span>
		<!--//LINKS-->
	</div>
	<!--//FRONT PAGE-->



	<!--RIGHT PAGE-->
	<div id="page-right">
		<div>
			<a href="#" class="back">
				<i class="fa fa-times close fa-2x fa-pull-right"></i>
			</a>

			<div class="container block">

				<!--MAIL-->
				<div class="si-icons si-icons-hover wow bounceIn" data-wow-duration="2s" data-wow-delay="1s">
					<span class="si-icon si-icon-mail" data-icon-name="mail"></span>
				</div>

				<h1 class="wow bounceInRight" data-wow-duration="2s">
                    Subscribe Now
				</h1>

				<p class="lead wow bounceInRight pad5" data-wow-duration="2s">
                    Join our mailing list to receive the latest news and updates from our team. Stay informed with our exclusive insights.
				</p>

				     <!--SUBSCRIBE FORM-->
                     <div class="contact_form wow bounceIn" data-wow-duration="2s" data-wow-delay="1s">
                        <div id="note"></div>
                        <div id="fields">

                                <form id="ajax-contact-form" action="{{ route('subscribe') }}" method="POST" onsubmit="return true;">

                                    @csrf
                                {{-- <input type="hidden" name="subject" value="SITE SUBSCRIPTION" /> --}}
                                <input class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2" type="text"
                                    name="name"  placeholder="Your Name" />
                                <input class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8" type="email" name="email"
                                    placeholder="Your Email" />
                                <div class="clearfix"></div>
                                <button class="btn" type="submit">submit</button>
                            </form>
                        </div>
                    </div>
                    <!--//FORM-->
			</div>
		</div>
	</div>



	<!--SCRIPTS-->
	<script src="{{ asset('soon/js/jquery.js') }}"></script>
	<script src="{{ asset('soon/js/retina.js') }}"></script>
	<script src="{{ asset('soon/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('soon/js/code-scripts.js') }}"></script>
	<script src="{{ asset('soon/js/wow.js') }}"></script>
	<script src="{{ asset('soon/js/jquery.mmenu.min.all.js') }}"></script>
	<script src="{{ asset('soon/js/modernizr.custom.js') }}"></script>
	<script src="{{ asset('soon/js/snap.svg-min.js') }}"></script>
	<script src="{{ asset('soon/js/svgicons-config.js') }}"></script>
	<script src="{{ asset('soon/js/svgicons.js') }}"></script>
	<script>
		//<![CDATA[
		(function () {
			[].slice.call(document.querySelectorAll('.si-icons-default > .si-icon')).forEach(function (el) {
				var svgicon = new svgIcon(el, svgIconConfig);
			});
			new svgIcon(document.querySelector('.si-icons-hover .si-icon-hourglass'), svgIconConfig, {
				easing: mina.backin,
				evtoggle: 'mouseover',
				size: {
					w: 80,
					h: 80
				}
			});
			new svgIcon(document.querySelector('.si-icons-hover .si-icon-clock'), svgIconConfig, {
				easing: mina.backin,
				evtoggle: 'mouseover',
				size: {
					w: 80,
					h: 80
				}
			});
			new svgIcon(document.querySelector('.si-icons-hover .si-icon-mail'), svgIconConfig, {
				easing: mina.backin,
				evtoggle: 'mouseover',
				size: {
					w: 80,
					h: 80
				}
			});
			new svgIcon(document.querySelector('.si-icons-hover .si-icon-flag'), svgIconConfig, {
				easing: mina.backin,
				evtoggle: 'mouseover',
				size: {
					w: 80,
					h: 80
				}
			});
		})();
		//]]>
	</script>
	<!--BACKGROUND IMAGE-->
	<script type="text/javascript" src="{{ asset('soon/js/jquery.vegas.min.js') }}"></script>
	<script>
		//<![CDATA[
		$(function () {
			$.vegas({
				src: 'soon/img/code-background.jpg'
			})('overlay');
		});
		//]]>
	</script>
	<script>
		//<![CDATA[
		$(document).ready(function () {
			$('#terminal').bgTerminal({
				url: '',
				glow: false,
				speed: 100,
				wait: 1000
			});
		});
		//]]>
	</script>

</body>

</html>
