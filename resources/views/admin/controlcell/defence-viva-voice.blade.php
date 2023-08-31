@extends('admin.layouts.app')
@section('heading', 'REPORT ON DEFENCE VIVA-VOICE OF Ph.D DEGREE')
@section('sub-heading', 'REPORT ON DEFENCE VIVA-VOICE OF Ph.D DEGREE')
@section('content')
<style>

    .table>:not(caption)>*>* {
        padding: .85rem .85rem;
        background-color: var(--bs-table-bg);
        border-bottom-width: none !important ;
        box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
    }
        tbody, td, tfoot, th, thead, tr {
        border-color: inherit;
        border-width: 0;
    }
    tbody, td, tfoot, th, thead, tr {
        border-color: inherit;
        border-width: 0;
    }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div style="padding: 0px 174px;">
                                <div class="row align-items-center" style="margin-top:50px;">
                                    <div class="col-md-3">

                                        <h5>Faculty and NCR:</h5>

                                    </div>
                                    <div class="col-md-9">

                                        <input type="text" class="form-control" />

                                    </div>
                                </div>
                                <div class="row align-items-center" style="margin-top:22px;">
                                    <div class="col-md-3">

                                        <h5 class="mb-0">Name of the Scholar:</h5>


                                    </div>
                                    <div class="col-md-9">

                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="row align-items-center" style="margin-top:22px;">
                                    <div class="col-md-3">

                                        <h5 class="mb-0">Title of the Thesis:</h5>
                                    </div>
                                    <div class="col-md-9">

                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <h5 class="mb-0" style="margin-top: 22px;font-weight: 500;">Review of Examiner's Report :</h5>
                                <div class="row" style="margin-top: 18px;">
                                    <div class="col-md-4">

                                        <h5 class="mb-0">1. Examiner : Prof./ Dr.</h5>
                                    </div>
                                    <div class="col-md-8">

                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">

                                        <h5 class="mb-0">2. Examiner : Prof./ Dr.</h5>
                                    </div>
                                    <div class="col-md-8">

                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-4">

                                        <h5 class="mb-0">3. Supervisor(s) : Prof./ Dr.</h5>
                                    </div>
                                    <div class="col-md-8">

                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-4">

                                        <h5 class="mb-0">4. Supervisor(s) : Prof./ Dr.</h5>
                                    </div>
                                    <div class="col-md-8">

                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-3">

                                        <h5 class="mb-0">Date of Viva Voice:</h5>
                                    </div>
                                    <div class="col-md-3">

                                        <input type="date" class="form-control" />
                                    </div>
                                    <div class="col-md-3">

                                        <h5 class="mb-0">No of members present in seminar:</h5>
                                    </div>
                                    <div class="col-md-3">

                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-3">

                                        <h5 class="mb-0">Recommendation:</h5>


                                    </div>
                                    <div class="col-md-9">

                                        <!-- <input type="text" class="form-control" /> -->
                                    </div>
                                </div>
                                <div class="row align-items-center" style="margin-top:22px;">
                                    <div class="col-md-3">

                                        <h5 class="mb-0">(a)Performance:</h5>


                                    </div>
                                    <div class="col-md-9">

                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-3">

                                        <h5 class="mb-0">(b)Degree(if recommended) to be awarded:</h5>
                                    </div>
                                    <div class="col-md-3">

                                        <input type="text" class="form-control" />
                                    </div>
                                    <div class="col-md-3">

                                        <h5 class="mb-0">Ph.D Programme:</h5>
                                    </div>
                                    <div class="col-md-3">

                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
