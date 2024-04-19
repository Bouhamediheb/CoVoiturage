<template>



	<section class="sec-2">
		<div class="container">

			<h2 class="heading-2">How It Work</h2>
			<div class="border"></div>
			<br>
			<div class="col3">
				<div class="box">
					<i class="fa fa-hand-o-up icon-1"></i>
					<h3>Book in just 2 Tabs</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
				</div>
			</div>
			<div class="col3">
				<div class="box">
					<i class="fa fa-automobile icon-1"></i>
					<h3>Get a Driver</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
				</div>
			</div>
			<div class="col3">
				<div class="box">
					<i class="fa fa-map-o icon-1"></i>
					<h3>Track Your Driver</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
			</div>
			<div class="col3">
				<div class="box">
					<i class="fa fa-user icon-1"></i>
					<h3>Arrive Safely</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
				</div>
			</div>
			<div class="clearfix"></div>

		</div>
	</section>


	<section class="sec-3">
		<br><br>
		<div class="container">
			<h2 class="heading-3">About us</h2>
			<div class="clearfix"></div>
			<br><br>
			<div class="col6">
				<p class="p3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is
					simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the
					printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting
					industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is
					simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the
					printing and typesetting industry.

				</p>
				<br><br>
				
				<button class="btn-r">Read More</button>
			</div>
			<div class="col6">
				<img src="../../assets/img/test3.png" style="width: 80%; margin-top: -100px;">
			</div>
			<div class="clearfix"></div>
		</div>
	</section>

	<section class="sec-4">
		<div class="container">

			<h2 class="heading-2">Download Carpool</h2>
			<div class="border"></div>
			<img src="../../assets/img/test4.webp" style="float:left; padding-left: 2%; width: 40%;">
			<div class="content">
				<h2 class="heading-3">Download the Carpool mobile application</h2>
				<br>
				<span class="mb-5"></span>

				<p class="p3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is
					simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the
					printing and typesetting industry.
					Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply
					dummy text of the printing and typesetting industry.
				</p>

				<br>
				
				<!-- div align right with padding top --> 
				<div style="padding-top: 10px;">
					<button class="btn-r">Download our app</button>
				</div>
				

			</div>
			<div class="clearfix"></div>

		</div>
	</section>


	<section class="sec-5" style="margin-bottom: 10px;">
		<div class="container">
			<h2 class="heading-2" style="color: #fff">What About passenger says</h2>
			<div class="border"></div>

			<div class="testimonial">
				<p class="p5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is
					simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the
					printing and typesetting industry.
					Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply
					dummy text of the printing and typesetting industry.
					Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply
					dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing
					and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
				</p>
				<!-- author name on the right side -->
				<p class="p5" style="float: right;"> - Mounir  </p>

			</div>
		</div>
	</section>

	<section class="map">
		<iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="yes"
				marginheight="0" marginwidth="0" height="500"
				src="https://maps.google.com/maps?width=2048&amp;height=545&amp;hl=en&amp;q=sfax&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
	</section>

	

</template>

<style scoped>
:root {
	--yellow: #EBB14D;
	--darkblue: #3A3C6C;
	--light: #cfd8ef;
	--white: #fff;
}

* {
	margin: 0px;
	padding: 0px;
	font-family: system-ui;
}

.clearfix {
	clear: both;
}

header {
	padding: 10px 0px 0px 0px;
}

.container {
	width: 1200px;
	max-width: 100%;
	margin: 0 auto;
}

.col2 {
	width: 20%;
	float: left;
}

.col3 {
	width: 25%;
	float: left;
}

.col4 {
	width: 33.3%;
	float: left;
}

.col6 {
	width: 50%;
	float: left;
}

.input-box {
	display: inline-block;
	padding: 10px 18px;
	border: 1px solid #ddd;
	margin-left: 60px;
	width: 300px;
}

.input-box input {
	border: none;
	padding-left: 15px;
	outline: none;
	width: 82%;
}

.logo {
	display: block;
	float: left;
}

.s-btn {
	height: 45px;
	width: 52px;
	margin: -11px;
	background: #3A3C6C;
	color: white;
	border: none;
	margin-right: -20px;
	cursor: pointer;
}

.s-btn:hover {
	background: #EBB14D;
	color: #3A3C6C;
}

.topnav li {
	list-style: none;
	float: left;
	padding: 15px 20px;
}

.topnav li a {
	text-decoration: none;
	color: #3A3C6C;
}

.btn-r {
	padding: 11px 25px;
	background: #3A3C6C;
	color: white;
	border: none;
	margin-top: -16px;
	font-size: 15px;
	cursor: pointer;
}

.btn-r:hover {
	background: #EBB14D;
	color: #3A3C6C;
}

.topnav {
	float: right;
}

.topnav li a:hover {
	color: #EBB14D;
}

.header-bottom {
	background: #3A3C6C;
}

.bottomnav li {
	list-style: none;
	float: left;
	padding: 13px 30px;
}

.bottomnav li a {
	text-decoration: none;
	color: #fff;
	font-weight: 200;
}

.active {
	background: #EBB14D;
}

.active a {
	color: #3A3C6C !important;
}

.b-btn {
	padding: 13px 25px;
	background: #EBB14D;
	color: white;
	border: none;
	font-size: 16px;
	float: right;
	margin-right: 20px;
	cursor: pointer;
}

.taxi-img {
	width: 100%;
}

.sec-1 {
	padding: 50px 0px 0px 0px;
	height: 280px;
	background: linear-gradient(#cfd8ef, #fff);
}

.heading {
	font-size: 50px;
	color: #3A3C6C;
}

.sec-2 {
	margin-top: 3%;
	padding: 100px 0px;
}

.heading-2 {
	color: #3A3C6C;
	text-align: center;
}

.border {
	text-align: center;
	margin-bottom: 50px;
}

.box {
	width: 200px;
	text-align: center;
}

.sec-4 {
	padding: 100px 0px;
}

.box h3 {
	font-size: 15px;
	color: #3A3C6C;
	margin: 15px 0px;
	font-weight: 500;
}

.box p {
	font-size: 13px;
	letter-spacing: 1px;
	line-height: 20px;
}

.icon-1 {
	font-size: 30px;
	background: #ecb34c;
	border-radius: 33px;
	color: #3a3c6c;
	height: 60px;
	width: 60px;
	line-height: 60px;
}

.heading-3 {
	color: #3A3C6C;
}

.p3 {
	font-size: 13px;
	letter-spacing: 1px;
	line-height: 20px;
	width: 500px;
}

.p5 {
	font-size: 13px;
	letter-spacing: 1px;
	line-height: 20px;
	color: #fff;
}



.content {
	float: left;
	padding: 41px;
}

.sec-5 {
	background: #3A3C6C;
	padding: 100px 0px;
	position: relative;
	height: auto;
	margin-top: -100px;
}

.footer-distributed {
	background-color: #3A3C6C;
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
	box-sizing: border-box;
	width: 100%;
	text-align: left;
	font: normal 16px sans-serif;
	padding: 45px 50px;
}

.footer-distributed .footer-left p {
	color: #fff;
	font-size: 14px;
	margin: 0;
}

.footer-distributed p.footer-links {
	font-size: 18px;
	font-weight: bold;
	color: #ffffff;
	margin: 0 0 10px;
	padding: 0;
	transition: ease .25s;
}

.footer-distributed p.footer-links a {
	display: inline-block;
	line-height: 1.8;
	text-decoration: none;
	color: inherit;
	transition: ease .25s;
}

.footer-distributed .footer-links a:before {
	content: "/";
	font-size: 10px;
	left: 0;
	color: #fff;
	display: inline-block;
	padding-right: 5px;
}

.footer-distributed .footer-links .link-1:before {
	content: none;
}

.footer-distributed .footer-right {
	float: right;
	margin-top: 6px;
	max-width: 180px;
}

.footer-distributed .footer-right a {
	display: inline-block;
	width: 35px;
	height: 35px;
	background-color: #EBB14D;
	border-radius: 2px;
	font-size: 20px;
	color: #3A3C6C;
	text-align: center;
	line-height: 35px;
	margin-left: 3px;
	transition: all .25s;
}

.footer-distributed .footer-right a:hover {
	transform: scale(1.1);
}

.footer-distributed p.footer-links a:hover {
	text-decoration: underline;
}
</style>
