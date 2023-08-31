


 <!-- footer begin -->
 <footer class="footer-1 bg-color-1">

    <!-- main footer begin -->
    <div class="main-footer">
        <div class="container">
            <div class="row">
                

                <div class="col-md-3">
                    <div class="compact-widget">
                        <h3 class="widget-title">BPUT</h3> 
                        <div class="widget-inner">
                            <ul>
                                <li><a href="#">About BPUT</a></li>
                                <li><a href="#">Vision & Mission</a></li>
                                <li><a href="#">Events & Gallery</a></li>
                                <li><a href="#">Contact Us</a></li>
                </ul>
                        </div>                                                   
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="compact-widget">
                        <h3 class="widget-title">Research</h3> 
                        <div class="widget-inner">
                            <ul>
                                <li><a href="#"> Research Statistics</a></li>
                                <li><a href="#">Research Policy</a></li>
                               
                            </ul>
                        </div>                                                   
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="compact-widget">
                        <h3 class="widget-title">Other Links</h3> 
                        <div class="widget-inner">
                            <ul>
                                <li><a href="#">Journel</a></li>
                                <li><a href="#">Funded Project</a></li>
                                <li><a href="#">R&D Consultancy</a></li>
                                <li><a href="#">CoE</a></li>
                            </ul>
                        </div>                                                   
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="compact-widget">
                        <h3 class="widget-title">Contact Us</h3>
                        <div class="widget-inner">
                            <p>Address:  Biju Patnaik University Of Technology, Odisha</p>
                            <p>Controller of Examination(Conduct): 0744-2473931</p>
                            <p>Recruitment Cell: 0744-2473062</p>
                            <!-- <p>Email: contact@compact.com</p> -->
                        </div>
                    </div>
                </div>

                

            </div>
        </div>
    </div>            
    <!-- main footer close -->

    <!-- sub footer begin -->
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                   Copyright © 2021 Biju Patnaik University Of Technology All rights reserved.
                </div>
            </div>
        </div>
    </div>
    <!-- sub footer close -->

</footer>
<!-- footer close -->
</div>

<a id="to-the-top" ><i class="fa fa-angle-up"></i></a>

<!-- LOAD JS FILES -->
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/sticky.min.j')}}js/sticky.min.js"></script>
    <script src="{{asset('assets/js/compact.js')}}"></script>
    <script src="{{asset('assets/js/custom-index2.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.themepunch.plugins.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('assets/js/revslider-custom.js')}}"></script>
    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> --}}
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js'></script>

{{-- validation script --}}
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js"></script>
    <script>
        $(window).scroll(function() {
        if ($(this).scrollTop() > 250){  
            $('.sub-header').addClass("sticky");
        }
        else{
            $('.sub-header').removeClass("sticky");
        }
    });


    </script>

    @yield('jss')


</body>
</html>

