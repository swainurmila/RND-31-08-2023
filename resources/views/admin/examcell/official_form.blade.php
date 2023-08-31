@extends('admin.layouts.app')
@section('heading', 'Student Preview Details')
@section('sub-heading', 'Student Preview Details')
@section('content')
<style>

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            border:none;
        }
        td,
        th {
           border: none;
            text-align: left;
            padding: 8px;
        }
        tr,tbody{
            border: none;
        }
        
       
        

 
</style>
<div class="container-fluid">
            <!-- start page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="panel-container show" role="content">
                                <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                    <div class="panel-content p-4">
                                        
                                        <table>
                                            <tr>
                                                <th style="text-align: center" colspan="2"><h4>For Official Use Only</h4></th>
                                            </tr>
                                            <tr>
                                                <td style="width:50%;">Serial No. of the Application</td>
                                                <td style="width:50%;">
                                                    -------------------------------------------------------
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:50%;">Date of Receipt</td>
                                                <td style="width:50%;">
                                                    -------------------------------------------------------
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:50%;text-align:left;padding:50px 0 0 0"><h5>J.E.(R&D Cell), BPUT</h5></td>
                                                <td style="width:50%;text-align:right;">
                                                    <h5>PIC(R&D), BPUT</h5>
                                                </td>
                                            </tr>
                                        </table>

                                        <table>
                                            <tr>
                                                <th colspan="3">
                                                    <h4>Remarks of DRDC (<small>for official use only</small>)</h4>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>The candidate may be called for Written Test(BPUT-ETR)</td>
                                                <td><div style="width:50px; height:50px; border:1px solid #ccc;"></div></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>The candidate may be exemted from appearing the Written Test(BPUT-ETR)</td>
                                                <td><div style="width:50px; height:50px;border:1px solid #ccc"></div></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>The candidate does not satisfy short listing criteria,So, Recommended to be
                                                    rejected</td>
                                                <td><div style="width:50px; height:50px;border:1px solid #ccc"></div></td>
                                            </tr>
                                        </table>

                                        <table style="margin-top: 10px;">
                                            <tr>
                                                <td style="padding: 40px 0;"><div style="border-bottom:1px solid #000; " ></div></td>
                                                <td><div style="border-bottom:1px solid #000; " ></div></td>
                                                <td><div style="border-bottom:1px solid #000; " ></div></td>
                                                <td><div style="border-bottom:1px solid #000; " ></div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="border-bottom:1px solid #000; " ></div></td>
                                                <td><div style="border-bottom:1px solid #000; " ></div></td>
                                                <td><div style="border-bottom:1px solid #000; " ></div></td>
                                                <td><div style="border-bottom:1px solid #000; " ></div></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="text-align: center">(signature of members with date)</td>
                                            </tr>
                                        </table>

                                        <table>
                                            <tr>
                                                <td style="text-align: right;">signature of Chairperson,  DRDC, BPUT<br>(with date)</td>

                                                
                                            </tr>
                                            <tr>
                                                <td><div style="border-bottom:1px solid #000; " ></div></td>
                                            </tr>
                                           
                                        </table>
                                        <table>
                                            <tr>
                                                <td style="text-align: left;" colspan="2">Forwarded to: <br> The PIC(R&D), BPUT for taking further necessary action</td>
                                            </tr>
                                            <tr>
                                                <td>Date: ----------------</td>
                                                <td><b>Chairperson,DRDC,BPUT</b></td>
                                            </tr>
                                        </table>
                                        <table style="margin-top: 25px;">
                                            <tr>
                                                <th colspan="2" style="text-align: center">
                                                    <h4>Remarks of the PIC (R&D), BPUT</h4>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left;" colspan="2">Forwarded to: <br> The Director of Examination, BPUT for necessary action</td>
                                            </tr>
                                            <tr>
                                                <td>Date: ----------------</td>
                                                <td style="text-align: right"><b>PIC(R&D),BPUT</b></td>
                                            </tr>
                                        </table>
                                        

                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-primary waves-effect waves-light" onclick="window.print()">Print this page</button>
                                        </div>
                                        

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection      
@section('js')
<script>
</script>
@endsection