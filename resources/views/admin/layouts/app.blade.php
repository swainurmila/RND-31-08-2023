@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">@yield('heading', 'Dashboard')</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>


                                <li class="breadcrumb-item active">@yield('sub-heading')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
        </div>
    </div>
</div>
@include('admin.layouts.footer')
