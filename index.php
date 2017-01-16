<?php
// Show errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-type: text/html; charset=utf-8');

// Stop user's browser from caching, so only latest version of page loaded
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-type: text/html; charset=utf-8');

?>


  <!DOCTYPE html>
  <html ng-app="loansharkbanksApp" ng-controller="myCtrl">

  <head>

    <meta charset="utf-8" />
    <title>Loan Shark Banks</title>
    <meta property="og:title" content="Loan Shark Banks" />
    <meta property="og:description" content="blah blah blah............" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://something........" />
    <link rel="canonical" href="http://something........">
    <meta property="og:image" content="http://image................" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Bevan|Nunito+Sans" rel="stylesheet">
		
		<!-- AngularJS -->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <!-- Recaptcha used to check person isn't a bot -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
		
		<!-- Unslider -->
		<!--
		<script src="unslider/unslider-min.js"></script>
		<script src="//stephband.info/jquery.event.move/js/jquery.event.move.js"></script>
		<script src="//stephband.info/jquery.event.swipe/js/jquery.event.swipe.js"></script>
		<link rel="stylesheet" href="unslider/unslider.css" />
		<link rel="stylesheet" href="unslider/unslider-dots.css" />
		-->

    <!-- Google Analytics -- add later -->
		
		<link rel="stylesheet" href="/styles.css">

  </head>

  <body>

		<div id="titles">
				<div class="holder">
					<h1>
						Loan shark banks
					</h1>
					<h2>
						are crippling our local services with sky-high interest rates we didn&apos;t sign up for and can&apos;t afford.
					</h2>
					<h2>
						They&apos;re profiting every day by taking millions from our schools, old people&apos;s homes and more.
					</h2>
					<div id="topbanklogos">
						Featuring 
						<img src="images/logo_barclays_small_trans.png" alt="Barclays" /> 
						<img src="images/logo_rbs_small_trans.png" alt="RBS" /> 
						and more
					</div>
			</div>
		</div>
			
			<div id="getstarted">
				<div class="holder">
					<h2>
						See how your community is being fleeced
					</h2>
					<form name="myForm">
						<input type="text" id="postcode" name="postcode" ng-model="postcode" placeholder="Enter your postcode" ng-pattern="/^[a-z]{1,2}[0-9][a-z0-9]?\s?[0-9][a-z]{2}$/i" required ng-minlength="5" ng-maxlength="8" ng-change="">
						<button id="gobutton" ng-click="getCouncilName()" ng-disabled="myForm.postcode.$invalid">Go</button>
						<div id="postcodeerror" ng-show="myForm.postcode.$dirty && !myForm.postcode.$valid">Please enter your full UK postcode</div>
					</form>
				</div>
			</div>
			
			<div id="mycouncil" ng-show="council.name" ng-class="{elderlycare: elderlycare}">
				<div class="holder">
					<h2 id="councilname">
						<span id="councilnametext">{{ council.name }}</span>
					</h2>
					<div id="amountperyear" ng-show="council.interestPerYear > 0">
						We&apos;re having to pay loan shark banks
						<div id="interestamount">&pound;{{ council.interestPerYear }} million a year</div> <strong>in interest alone</strong>
					</div>
					<div id="humanexample" ng-show="council.interestPerYear > 0">
						{{ council.humanExample.start }} <div id="humaninterestnumber">{{ council.humanExample.number }}</div> {{ council.humanExample.end }}
					</div>
					<div id="sharing" ng-show="council.interestPerYear > 0">
						Isn&apos;t that where our money should go?
					</div>
					<div id="nodatayet" ng-show="council.interestPerYear == 0">
						Unfortunately we don&apos;t have data yet for your area. 
						<div id="nodatasuggestions">
							<p>
								Try entering postcode E16 4HP to see an example from elsewhere. 
							</p>
							<p>
								<a href="http://lada.debtresistance.uk/project/based-on-your-expertise/" target="_blank">Get involved in researching loan shark bank loans to your council.</a>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div id="explainer">
				<div class="holder">
					<h2>
						What&apos;s it all about?
					</h2>
					<iframe src="https://www.youtube.com/embed/y37t8NuPYxQ?showinfo=0" frameborder="0" allowfullscreen></iframe>
					<div id="findoutmore">
							<a href="http://www.independent.co.uk/news/business/news/sent-loco-by-lobos-the-great-council-loan-controversy-a6922286.html" target="_blank">Read more</a> | 
							<a href="http://lada.debtresistance.uk/" target="_blank">Join the fightback</a>
					</div>
				</div>
			</div>

  		<div id="about">
				<div class="holder">
					This is a rough prototype made for a hackathon in support of 
					<a href="http://debtresistance.uk/" target="_blank">Debt Resistance UK</a> and has not been checked or approved by them. Code freely available at <a href="https://github.com/joefhall/loan-shark-banks" target="_blank">GitHub</a> &ndash; please take it, use it and make it better.
				</div>
			</div>
    
    <script>
      
      
    </script>
		
		<!-- AngularJS -->
		<script src="app.js"></script>
		<script src="controller.js"></script>

  </body>


  </html>