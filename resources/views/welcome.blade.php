@extends('layouts.master')

@section('hero')
<!-- Hero -->

    <section class="hero">
        <div class="container text-center">
          <div class="row">
            <div class="col-md-12">
              {{-- <a class="hero-brand" href="index.html" title="Home">COURSE ADVISOR<!-- <img alt="Logo" src="img/logo.png"> --></a> --}}
            </div>
          </div>
    
          <div class="col-md-12">
            <h1>
                STUDENT COURSE ADVISORY SYSTEM
            </h1>
    
            <p class="tagline">
              We offer free advice on courses based on your capabilities and interests.
            </p>
            <a class="btn btn-full" href="#about">Get Started Now</a>
          </div>
        </div>
    
      </section>
      <!-- /Hero -->
@endsection

@section('home')
    <!-- Page Content
    ================================================== -->

  <!-- About -->

  <section class="about" id="about">
    <div class="container text-center">
      	<h2>
          Know Your Course
        </h2>
      <div class="row">
        <div class="col-lg-9 col-sm-12 text-lg-left text-center">
          <p>The system will guide you these process so that you can settle in a course suitable for you.</p>
          <ol>
            <li>Personality test.</li>
            <li>More about your Course.</li>
            <li>Entry Level of course i.e Degree, Diploma, Certificate.</li>
            <li>Institution.</li>
           </ol>
        </div>

        <div class="col-lg-3 col-sm-12 text-lg-right text-center">
          <a class="btn btn-ghost" href="/register">Get Started Now</a>
        </div>
      </div>
    </div>
  </section>
  <!-- /About -->
  <!-- Parallax -->

  <div class="block bg-primary block-pd-lg block-bg-overlay text-center" data-bg-img="images/parallax-bg.jpeg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
    <h2>
        "You make the best version of you"
      </h2>

    <p>
      This is the most powerful advisory system with thousands of options that you have never seen before.
    </p>
    <img alt="Bell - A perfect theme" class="gadgets-img hidden-md-down" src="images/courses.png">
  </div>
  <!-- /Parallax -->
  <!-- Features -->

  <section class="features" id="features">
    <div class="container">
      <h2 class="text-center">
      	Testimonials
      </h2>

      <div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-center m-auto">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Carousel indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>   
					<!-- Wrapper for carousel items -->
					<div class="carousel-inner">
						<div class="item carousel-item active">
							<div class="img-box"><img src="images/team-1.jpg" alt=""></div>
							<p class="testimonial">This system got content able to hel-p and assist students... very handy and appicable to the curent schools.</p>
							<p class="overview"><b>Kweyu Geoffrey</b>, school psychologist</p>
						</div>
						<div class="item carousel-item">
							<div class="img-box"><img src="images/team-2.jpg" alt=""></div>
							<p class="testimonial">ones temparament is a grouding for ones life career. recommend the system to all who have a doubt.</p>
							<p class="overview"><b>Gracie Troy</b>, Php programmer.</p>
						</div>
						<div class="item carousel-item">
							<div class="img-box"><img src="images/team-3.jpg" alt=""></div>
							<p class="testimonial"> your career is a conner stone to your life, make no mistake...try out this system for optimal result.</p>
							<p class="overview"><b>Michael Katsee</b>, Nurse</p>
						</div>
					</div>
					<!-- Carousel controls -->
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
				</div>
			</div>
		</div>
	</div>
    </div>
  </section>
  <!-- /Features -->

  <footer class="site-footer">
    <div class="bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-xs-12 text-lg-left text-center">
            <p class="copyright-text">
             2018 © Course Advisory
            </p>
          </div>

          <div class="col-lg-6 col-xs-12 text-lg-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="/">Home</a>
              </li>

              <li class="list-inline-item">
                <a href="/">Know Course</a>
              </li>

              <li class="list-inline-item">
                <a href="/">Testimonials</a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </footer>
  <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>
@endsection
