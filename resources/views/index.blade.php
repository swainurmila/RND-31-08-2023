@extends('layouts.app')
@section('content')
    <!-- slider -->
    <div class="row">
        <div class="col-md-9">

            <div id="slider">
                <!-- revolution slider begin -->
                <div class="fullwidthbanner-container narrow-dark">
                    <div id="revolution-slider-2">
                        <ul>
                            <li data-transition="fade" data-slotamount="7" data-masterspeed="2500" data-delay="5000">
                                <!--  BACKGROUND IMAGE -->
                                <img src="{{ asset('assets/images/slider/bg-5.jpg') }}" alt="">
                            </li>

                            <li data-transition="fade" data-slotamount="7" data-masterspeed="2500" data-delay="5000">
                                <!--  BACKGROUND IMAGE -->
                                <img src="{{ asset('assets/images/slider/bg-4.jpg') }}" alt="">
                            </li>

                            {{-- <li data-transition="fade" data-slotamount="7" data-masterspeed="2500" data-delay="5000">
                    <!--  BACKGROUND IMAGE -->
                    <img src="{{ asset('assets/images/slider/bg-5.jpg') }}" alt="">
                </li> --}}
                        </ul>
                    </div>
                </div>
                <!-- revolution slider close -->
            </div>




        </div>


        <div class="col-md-3 col-lg-3 news-wrapper">
            <div class="latest-news-title">
                <h2><i class="fa fa-newspaper-o" aria-hidden="true"></i><b> Latest </b> News</h2>
            </div>
            <div class="events-details">


                <div class="content">


                    <div class="item-list">
                        <ul class="marquee-vertical" style="padding-left: 0px;">
                            <li>
                                <div class="date">
                                    <span class="day">08</span>
                                    <span class="month"> Mar <br> 2022</span>
                                </div>
                                <a href="#"
                                    title="Correigendum for extending the last date for submission of RFP documents for selection of Agency…">Correigendum
                                    for extending the last date for submission of RFP documents for selection of Agency…
                                </a>
                            </li>
                            <li>
                                <div class="date">
                                    <span class="day">28</span>
                                    <span class="month"> Feb <br> 2022</span>
                                </div>
                                <a href="/news/corrigendum-and-addendum-notice"
                                    title="CORRIGENDUM and ADDENDUM NOTICE">CORRIGENDUM and ADDENDUM NOTICE
                                </a>
                            </li>
                            <li>
                                <div class="date">
                                    <span class="day">25</span>
                                    <span class="month"> Feb <br> 2022</span>
                                </div>
                                <a href="/news/contractual-engagement-retied-employees-legal-consultant-department-agriculture-fe"
                                    title="Contractual engagement of retied employees as Legal Consultant in the Department of Agriculture…">Contractual
                                    engagement of retied employees as Legal Consultant in the Department of Agriculture…
                                </a>
                            </li>


                        </ul>
                    </div>


                </div>


            </div>
            <a href="#" class="know-more-news pull-right knw-mrg" title="Know More">Know More</a>

        </div>
        <!-- revolution slider begin -->

        <!-- revolution slider close -->
    </div>
    <!-- slider close -->

    <div class="clearfix"></div>

    {{-- <div class="slid_btm" style="padding: 5px;background-image: linear-gradient(#111111, #cccccc) !important;color: #fff;"> --}}



    <!-- Marquee starts-->
    {{-- <div class="scroll" >
    <marquee scrollamount="7" onmouseover="if (!window.__cfRLUnblockHandlers) return false; this.stop();" onmouseout="if (!window.__cfRLUnblockHandlers) return false; this.start();" data-cf-modified-9fae1e6b896f6f1e117bac4f-="">
        <ul style="list-style-type: disc;">
            <li>
                <a style="font-weight: bolder;color:#fff; " href="#" target="_blank">Biju Patnaik University Of Technology Research and Development Team. 
                    <img src="{{asset('/upload/photo/newicon1.gif')}}" alt="newicon" height="8" width="27"> 
                </a>
            </li>
        </ul>
    </marquee>
</div> --}}
    <!-- Marquee Ends-->
    </div>




    <!-- content begin -->
    <div id="content" class="no-padding">
        <!-- section begin -->
        <section id="section-service">
            <div class="container">
                <div class="row">
                    @foreach ($portal as $item)
                    <div class="col-md-3">
                        <div class="service-box">
                            <img src="/upload/portal/{{$item->image}}" alt="" class="img-responsive">
                            <div class="service-content">
                                <h3><a href="{{$item->link}}">{{$item->title}}</a> </h3>
                                <p>{{$item->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    {{-- <div class="col-md-3">
                        <div class="service-box">
                            <img src="{{ asset('assets/images/studentportal.png') }}" alt="" class="img-responsive">
                            <div class="service-content">
                                <h3><a href="http://115.243.153.202:8040/">Student Portal</a> </h3>
                                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-box">
                            <img src="{{ asset('assets/images/training.png') }}" alt="" class="img-responsive">
                            <div class="service-content">
                                <h3> <a href="http://115.243.153.202:8050/"> Training & Placement</a> </h3>
                                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-box">
                            <img src="{{ asset('assets/images/RD.png') }}" alt="" class="img-responsive">
                            <div class="service-content">
                                <h3> <a href="http://115.243.153.202:8060/">R & D</a></h3>
                                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <!-- section close -->

        <section class="key_person">
            <div class="hot-news" style="color:red; font-size: 15px; padding:0px 0px;">
                <div class="left_head">Announcement</div>
                <div class="right_marq">
                    <marquee scrollamount="3" onmouseout="this.setAttribute('scrollamount', 3, 0);this.start();"
                        onmouseover="this.setAttribute('scrollamount', 0, 0);this.stop();">
        @foreach ($announcements as $item)
        <a style="font-weight: bolder; " href="#" target="_blank">{{$item->announcements_title}}
            <img src="{{ asset('assets/images//newicon1.gif') }}" alt="newicon" height="8" width="27">
        </a> ||
        @endforeach
                        
                    </marquee>
                </div>
            </div>
        </section>

        <!-- section begin -->
        <section id="section-about" class="bg-grey">
            <div class="container">
                <div class="row">
                    <div class="text-center">
                        <h2 class="box-title">Research & Development</h2>
                        <div class="tiny-border"></div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <img src="{{ asset('assets/images/computer2.png') }}" alt="about image" class="img-responsive">
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="about-history">
                            <p style="text-align: justify;">
                                In a world increasingly propelled by technology, university research is the foundation of
                                any nation's economic growth. And IIT Bombay is committed to basic long-term research in
                                frontier areas. BPUT, ODISHA has made concerted efforts to align its R&D focus with the
                                national goal of achieving technological self-reliance. Students and faculty conduct
                                research projects in thrust areas of science and engineering. The institute has ongoing
                                academic and research collaborations with many national and international universities,
                                governments and industries in order to keep pace with expanding frontiers of knowledge and
                                global developments; it is also constantly in touch with national needs. Its pre-eminent
                                position at the cutting-edge of research is reflected in its impressive list of research
                                projects, which cater to both our national needs and global developments. The research
                                funding and industrial interactions of the institute is managed by the Industrial Research
                                and Consultancy Center (IRCC). For details regarding available areas of expertise,
                                consultancy services, research racilities, technologies for transfer and licensing, research
                                internship, and industry research partnership go to the IRCC Webpage.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <!-- section begin -->
        {{-- <section id="section-pricing">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h2 class="box-title">Portal</h2>
                            <div class="tiny-border"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="pricing-item featured">

                            <div class="plan-name">
                                <p>SCHOLAR / SUPERVISOR</p>
                            </div>

                            <p class="plan-btn"><a href="#" class="btn btn-primary">Log In</a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="pricing-item">

                            <div class="plan-name">
                                <p>NODAL CENTRE</p>
                            </div>

                            <p class="plan-btn"><a href="#" class="btn btn-primary">Log In</a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="pricing-item featured">

                            <div class="plan-name">
                                <p>INSTITUTE / R&D CENTER</p>
                            </div>

                            <p class="plan-btn"><a href="#" class="btn btn-primary">Log In</a></p>
                        </div>
                    </div>
                </div>
            </div> 
        </section>--}}
        <!-- section close -->

        <!-- section begin -->
        <section id="section-testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonials-slider-wrapper">
                            <div class="text-center">
                                <h2 class="box-title">Research & Innovation</h2>
                                <div class="tiny-border"></div>
                            </div>

                            <div class="testimonials-slider-2 text-center">
                                <div class="item">
                                    <div class="col-md-3">
                                        <div class="card1">
                                            <img src="https://farm1.staticflickr.com/505/31980127730_ea81689413_m.jpg"
                                                alt="sample image">
                                            <div class="texts">
                                                <h4>Nano Technology</h4>
                                                <p>Nano Technology 2021</p>
                                                <button type="submit">More details..</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card1">
                                            <img src="https://farm1.staticflickr.com/505/31980127730_ea81689413_m.jpg"
                                                alt="sample image">
                                            <div class="texts">
                                                <h4>Nano Technology</h4>
                                                <p>Nano Technology 2021</p>
                                                <button type="submit">More details..</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card1">
                                            <img src="https://farm1.staticflickr.com/505/31980127730_ea81689413_m.jpg"
                                                alt="sample image">
                                            <div class="texts">
                                                <h4>Artificial Intelligence</h4>
                                                <p>Nano Technology 2021</p>
                                                <button type="submit">More details..</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card1">
                                            <img src="https://farm1.staticflickr.com/505/31980127730_ea81689413_m.jpg"
                                                alt="sample image">
                                            <div class="texts">
                                                <h4>Health Monitor</h4>
                                                <p>Nano Technology 2021</p>
                                                <button type="submit">More details..</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-3">
                                        <div class="card1">
                                            <img src="https://farm1.staticflickr.com/505/31980127730_ea81689413_m.jpg"
                                                alt="sample image">
                                            <div class="texts">
                                                <h4>Educational Inequality</h4>
                                                <p>Nano Technology 2021</p>
                                                <button type="submit">More details..</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card1">
                                            <img src="https://farm1.staticflickr.com/505/31980127730_ea81689413_m.jpg"
                                                alt="sample image">
                                            <div class="texts">
                                                <h4>Nano Technology</h4>
                                                <p>Nano Technology 2021</p>
                                                <button type="submit">More details..</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="item">
                                    <div class="testi-boxes">
                                        <div class="testi-info clearfix">
                                            <img alt="" src="images/testimonial/thumb-3.png" class="img-circle">
                                            <div class="testi-details">
                                                <span>Frank Furius</span>
                                                Art Director
                                            </div>
                                        </div>
                                        <blockquote>
                                            Morbi auctor vel mauris facilisis lacinia. Aenean suscipit lorem leo, et hendrerit odio fermentum et. Donec ac dolor eros. Mauris arcu nunc, iaculis sit amet lacus iaculis, faucibus faucibus nunc. Vestibulum sit amet lacinia massa
                                        </blockquote>
                                        
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->


        <!-- section begin -->
        <section id="section-project" class="bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-projects-2 clearfix">
                            <div class="latest-projects-wrapper">
                                <div class="text-center">
                                    <h2 class="box-title">Latest Projects</h2>
                                    <div class="tiny-border"></div>
                                </div>
                                <div id="latest-projects-items-2" class="latest-projects-items">
                                    <div class="item">
                                        <img src="{{ asset('assets/images/projects/medium-1.jpg') }}" alt=""
                                            class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Plan For Your Bussiness</a></p>
                                            <p class="folio-cate"><i class="fa fa-tag"></i><a href="#">Finance</a>,
                                                <a href="#">Marketing</a></p>
                                            <div class="folio-buttons">
                                                <a href="{{ asset('assets/images/projects/medium-1.jpg') }}"
                                                    title="Plan For Your Bussiness" class="folio"><i
                                                        class="fa fa-search"></i></a>
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('assets/images/projects/medium-2.jpg') }}" alt=""
                                            class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Business Growth Solutions</a></p>
                                            <p class="folio-cate"><i class="fa fa-tag"></i><a href="#">Finance</a>,
                                                <a href="#">Marketing</a></p>
                                            <div class="folio-buttons">
                                                <a href="{{ asset('assets/images/projects/medium-2.jpg') }}"
                                                    title="Business Growth Solutions" class="folio"><i
                                                        class="fa fa-search"></i></a>
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('assets/images/projects/medium-3.jpg') }}" alt=""
                                            class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Enterprise Development</a></p>
                                            <p class="folio-cate"><i class="fa fa-tag"></i><a href="#">Finance</a>,
                                                <a href="#">Marketing</a></p>
                                            <div class="folio-buttons">
                                                <a href="{{ asset('assets/images/projects/medium-3.jpg') }}"
                                                    title="Enterprise Development" class="folio"><i
                                                        class="fa fa-search"></i></a>
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('assets/images/projects/medium-4.jpg') }}" alt=""
                                            class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Successful Business</a></p>
                                            <p class="folio-cate"><i class="fa fa-tag"></i><a href="#">Finance</a>,
                                                <a href="#">Marketing</a></p>
                                            <div class="folio-buttons">
                                                <a href="{{ asset('assets/images/projects/medium-4.jpg') }}"
                                                    title="Successful Business" class="folio"><i
                                                        class="fa fa-search"></i></a>
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('assets/images/projects/medium-5.jpg') }}" alt=""
                                            class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Marketing Strategy</a></p>
                                            <p class="folio-cate"><i class="fa fa-tag"></i><a href="#">Finance</a>,
                                                <a href="#">Marketing</a></p>
                                            <div class="folio-buttons">
                                                <a href="{{ asset('assets/images/projects/medium-5.jpg') }}"
                                                    title="Marketing Strategy" class="folio"><i
                                                        class="fa fa-search"></i></a>
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('assets/images/projects/medium-6.jpg') }}" alt=""
                                            class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Effective Recruitment</a></p>
                                            <p class="folio-cate"><i class="fa fa-tag"></i><a href="#">Finance</a>,
                                                <a href="#">Marketing</a></p>
                                            <div class="folio-buttons">
                                                <a href="{{ asset('assets/images/projects/medium-6.jpg') }}"
                                                    title="Effective Recruitment" class="folio"><i
                                                        class="fa fa-search"></i></a>
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->




        <!-- section begin -->

        <!-- section close -->



        <!-- section begin -->
        <section id="section-cta">
            <div class="sep-background-mask"></div>
            <div class="container">
                <div class="row">
                    <div class="quick_newsletter">
                        <div class="newsletter-info col-md-4 col-sm-4">
                            <h3>Subscribe to Newsletters</h3>
                            <p>And stay informed about our news and events</p>
                        </div>
                        <div class="newsletter-element">
                            <form action="inc/newsletter.php" method="post">
                                <p class="col-md-3 col-sm-3"><input class="newsletter-firstname input-text"
                                        type="text" placeholder="Your Name"></p>
                                <p class="col-md-3 col-sm-3"><input class="newsletter-email input-text" type="email"
                                        placeholder="Enter email"></p>
                                <p class="col-md-2 col-sm-2"><button class="newsletter-submit btn" type="submit"><i
                                            class="fa fa-paper-plane"></i> Subscribe</button></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

    </div>
    <!-- content close -->
@endsection
