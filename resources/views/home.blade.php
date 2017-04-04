@extends('layouts.app')

@section('content')
<!-- Hero Area Section -->
<section id="hero-area">
    <div class="container">
        <div class="home-row">
            <div class="col-md-12">
                <h1 class="title">Recruitment Hut</h1>
                <h2 class="subtitle">The Leading Applicant Tracking System</h2>

                <img class="col-md-6 col-sm-6 col-xs-12 animated fadeInLeft" src="custom/images/macbook.png" alt="Recruitment Hut">

                <div class="col-md-6 col-sm-6 col-xs-12 animated fadeInRight delay-0-5">
                    <p>Recruitment Hut is an applicant tracking system (ATS) designed for small to midsized businesses that prides itself as being “the simplest recruiting software in the world for growing companies.” </p>
                    <p><a href="/vacancy" class="btn btn-common btn-lg">Try for Free</a></p>
                </div>

            </div>

        </div>
        <div class="home-row">&nbsp;</div>
    </div>
</section>

<!-- Hero Area Section End-->

<!-- Service Section -->
<section id="services">
    <div class="container text-center">
        <div class="home-row">
            <h1 class="title">What Can Recruitment Hut do?</h1>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="service-item">
                    <img class="candidate-logo" src="custom/images/candidate1.png" alt="">
                    <h3>Keep records of all candidates</h3>
                    <p>Keep a full record of every job candidate who has ever been sourced by, or applied to, your company. Search the candidate database and view individuals as rich candidate profiles, including resumes, and feedback from your hiring teams.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="service-item">
                    <img class="candidate-logo" src="custom/images/candidate2.png" alt="">
                    <h3>Manage Interview schedules</h3>
                    <p>Set up calls or interviews with candidates and members of your hiring team. Workable automatically notifies candidates and interviewers of the details.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="service-item">
                    <img class="candidate-logo" src="custom/images/candidate3.png" alt="">
                    <h3>Easily Evaluate Candidates</h3>
                    <p>Easily Rate your candidates during interviews and the system wil automatically give each candidate an Overall rating. Making decisions on whom to recruit is much easier now.</p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Service Section End -->

<!-- Client Section -->
<section id="clients">
    <div class="container">
        <div class="home-row">
            <h1 class="title">Our Clients</h1>

            <div class="wow fadeInDown">
                <img id="client-icon" class="col-md-3 col-md-3 col-sm-3 col-xs-12" src="custom/images/img1.png" alt="client-1">

                <img id="client-icon" class="col-md-3 col-md-3 col-sm-3 col-xs-12" src="custom/images/img2.png" alt="client-2">

                <img id="client-icon" class="col-md-3 col-md-3 col-sm-3 col-xs-12" src="custom/images/img3.png" alt="client-3">

                <img id="client-icon" class="col-md-3 col-md-3 col-sm-3 col-xs-12" src="custom/images/img4.png" alt="client-4">
            </div>
        </div>
    </div>
</section>
<!-- Client Section End -->

<!-- About Section -->
<section id="about">
    <div class="container">
        <div class="home-row">
            <h1 class="title">About us</h1>

            <div class="col-md-8 col-sm-12">
                <p>
                    Recruitment Hut is the most popular Application Tracking System, trusted by over 6000 companies to streamline their hiring. From posting a job to sourcing candidates, Recruitment Hut provides the tools you need to manage multiple hiring pipelines. Transparent communication, organized candidate profiles and structured interviews gives hiring teams the information they need to make the right choice. Recruitment Hut is available for desktop and mobile.
                </p>
                <p>
                    For years, we recruited for fast-growing companies. We trekked through forests of resumes and down bottomless email threads. We roughed it with clunky applicant tracking software and giant spreadsheets, all the while wrestling to coordinate interviews and feedback. At some point it got personal. We make software. Surely we could do better.
                </p>
            </div>
            <img class="col-md-4 col-md-4 col-sm-12 col-xs-12" src="custom/images/graph.png" alt="">
        </div>
        <div class="home-row">&nbsp;</div>
    </div>
</section>
<!-- About Section End -->

<!-- Conatct Section -->
<section id="contact">
    <div class="container text-center">
        <div class="home-row">
            <h1 class="title">Contact us</h1>

            <form role="form" class="contact-form" method="post">
                <div class="col-md-6 wow fadeInLeft" data-wow-delay=".5s">
                    <div class="form-group">
                        <div class="controls">
                            <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="controls">
                            <input type="email" class="form-control email" placeholder="Email" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="controls">
                            <input type="text" class="form-control requiredField" placeholder="Subject" name="subject">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="controls">
                            <textarea rows="7" class="form-control" placeholder="Message" name="message"></textarea>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-lg btn-common">Send</button><div id="success" style="color:#34495e;"></div>
                </div>
            </form>

            <div class="col-md-6 wow fadeInRight">
                <div class="social-links">
                    <a class="social" href="#" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
                    <a class="social" href="#" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
                    <a class="social" href="#" target="_blank"><i class="fa fa-google-plus fa-2x"></i></a>
                    <a class="social" href="#" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a>
                </div>

                <div class="contact-info">
                    <p><i class="fa fa-map-marker"></i> Port Louis, Mauritius</p>
                    <p><i class="fa fa-envelope"></i> info@recruitmenthut.com</p>
                </div>

                <h2>Recruit anytime, anywhere.</h2>
                <p>Don't like to be confined to the interview room? Take your interviews out to a coffee shop. Recruitment Hut runs with you everywhere. Get away from your desk while still getting work done. </p>
            </div>
        </div>
    </div>
</section>
@endsection
