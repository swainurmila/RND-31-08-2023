@extends('admin.layouts.app')
@section('heading', 'Renewal of Registration')
@section('sub-heading', 'Renewal of Registration')
@section('content')
    <style>
        .trbg {
            background-color: #89d4f02e;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .value {
            font-weight: bold;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="custom-accordion">
                                @if (session()->has('message'))
                                    <br />
                                    {!! session()->get('message') !!}
                                @endif
                                <span id="msg"></span>
                                <table class="mb-2">
                                    <tr class="trbg">
                                        <th colspan="4">
                                            <h5>View Information</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><span class="fix">Name</span><span class="value">:
                                                {{ $value->name }}</span></td>
                                        <td><span class="fix">Name Of NCR</span><span class="value">:
                                                {{ $value->ncr_name }}</span></td>

                                    </tr>
                                    <tr>
                                        <td> <span class="fix">Faculty of</span><span class="value">:
                                                {{ $value->faculty }}</span> </td>
                                        <td><span class="fix">Discipline / Specialisation</span><span class="value">:
                                                {{ $value->discipline }}</span></td>

                                    </tr>
                                    <tr>
                                        <td><span class="fix">Enrollment No</span><span class="value">:
                                                {{ $value->enrollment_no }}</span></td>
                                        <td><span class="fix">Date Of Enrollment</span><span class="value">:
                                                {{ Helper::date_format($value->enrollment_date, '-') }}</span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><span class="fix">Regd. No</span><span class="value">:
                                                {{ $value->regd_no }}</span></td>
                                        <td><span class="fix">Date Of Registration</span><span class="value">:
                                                {{ Helper::date_format($value->registration_date, '-') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'><span class="fix">Topic of the Research work</span><span
                                                class="value">: {{ $value->topic }}</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'><span class="fix">Progress in research work till
                                                date</span><span class="value">: {{ $value->progress }}</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'><span class="fix">Schedule period of completion of the
                                                work</span><span class="value">:
                                                {{ Helper::date_format($value->schedule_period, '-') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'><span class="fix">Reason of non-completion in due
                                                time</span><span class="value">:
                                                {{ $value->reason_of_non_completion }}</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'><span class="fix">Expected time of completion of
                                                work</span><span class="value">:
                                                {{ Helper::date_format($value->expected_completion, '-') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'><span class="fix">Expected time-frame for submission of thesis
                                                and period of extension sought</span><span class="value">:
                                                {{ $value->expected_submission }}</span></td>
                                    </tr>
                                </table>
                                <hr>
                                <form action="#" method="post">
                                    @csrf
                                    <div class="row">
                                        <h5><b>From Supervisor:</b></h5>
                                        <div class="col-6">
                                            <input type="hidden" name="type" value="" />
                                            <label for="">Application Status</label>
                                            <select name="at_supervisor" id="" class="form-control" readonly>
                                                <option>
                                                    @if ($value->status == 1 || $value->status == 2 || $value->status == 4 || $value->status == 6)
                                                        Recommended
                                                    @else
                                                        Not Recommended
                                                    @endif
                                                </option>

                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Remarks</label>
                                            <textarea name="remark_supervisor" class="form-control" readonly>{{ $value->remark_supervisor }}</textarea>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                @if ($value->status == 0 || $value->status == 1)
                                    <form action="{{ url('nodalcentre/renewal-registration-store', $value->id) }}"
                                        method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="hidden" name="type" value="" />
                                                <label for="">Application Status</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="2">Recommended</option>
                                                    <option value="3">Not Recommended
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Remarks</label>
                                                <textarea name="remark_nodal_center" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-12">
                                                <button class="btn btn-primary mt-2 mb-5" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <form action="#" method="post">
                                        @csrf
                                        <div class="row">
                                            <h5><b>From Nodal Center:</b></h5>
                                            <div class="col-6">
                                                <input type="hidden" name="type" value="" />
                                                <label for="">Application Status</label>
                                                <select name="at_supervisor" id="" class="form-control" readonly>
                                                    <option>
                                                        @if ($value->status == 1 || $value->status == 2 || $value->status == 4 || $value->status == 6)
                                                            Recommended
                                                        @else
                                                            Not Recommended
                                                        @endif
                                                    </option>

                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Remarks</label>
                                                <textarea name="remark_supervisor" class="form-control" readonly>{{ $value->remark_nodal_center }}</textarea>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end row -->
@endsection
