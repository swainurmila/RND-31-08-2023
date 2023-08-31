 <!-- Footer Start -->
 <footer class="footer">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-6">
                 <script>
                     document.write(new Date().getFullYear())
                 </script> &copy; <a href="https://oasystspl.com/">Oasys Tech Solutions Pvt. LTD</a>
             </div>
             <div class="col-md-6">
                 <div class="text-md-end footer-links d-none d-sm-block">
                     <a href="javascript:void(0);">About Us</a>
                     <a href="javascript:void(0);">Help</a>
                     <a href="javascript:void(0);">Contact Us</a>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <!-- end Footer -->

 </div>

 <!-- ============================================================== -->
 <!-- End Page content -->
 <!-- ============================================================== -->

 </div>
 <!-- END wrapper -->

 <div class="modal fade" id="invoice_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="btn-close text-red" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="row center" id="invoice-content">
                     <div class="card-body">
                         <!-- Logo & title -->
                         <div class="clearfix">
                             <div class="float-start">
                                 <div class="auth-logo">
                                     <a href="/" class="logo logo-dark">
                                         <span class="logo-lg">
                                             <img src="{{ asset('admin_assets/images/BPUT.jpg') }}" alt=""
                                                 height="22" style="max-width:69px;">
                                         </span>
                                     </a>

                                 </div>
                             </div>
                             <div class="float-end">
                                 <h4 class="m-0 d-print-none">Invoice</h4>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-md-6">
                                 <div class="mt-3">
                                     <p><b>Hello, <span id="name"></span></b></p>

                                 </div>

                             </div><!-- end col -->
                             <div class="col-md-4 offset-md-2">
                                 <div class="mt-3 float-end">
                                     <p class="m-b-1
                                    0"><b>Enrollment No. : </b>
                                         <span class="float-end">
                                             &nbsp;&nbsp;&nbsp;&nbsp; <span id="el_no"></span></span>
                                     </p>
                                     <p class="m-b-10"><strong>Status : </strong> <span class="float-end"><span
                                                 class="badge bg-danger">Pending To Nodal</span></span></p>
                                     {{-- <p class="m-b-10"><strong>Order No. : </strong> <span class="float-end">000013 </span></p> --}}
                                 </div>
                             </div><!-- end col -->
                         </div>
                         <!-- end row -->

                         <div class="row">
                             <div class="col-12">
                                 <div class="table-responsive">
                                     <table class="table mt-4 table-centered">
                                         <thead>
                                             <tr>
                                                 <th colspan="6">
                                                     <h4 class="text-center">Payment Details</h4>
                                                 </th>
                                             </tr>
                                             <tr>
                                                 <th>#</th>
                                                 <th>Form Name</th>
                                                 <th>Transaction Id</th>
                                                 <th>Transaction Date</th>
                                                 <th>Transaction Type</th>
                                                 <th class="text-end">Amount</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td>1</td>
                                                 <td>
                                                     <b>Apllication fee for Phd student application</b>
                                                 </td>
                                                 <td><span id="tid"></span></td>
                                                 <td><span id="tdate"></span></td>
                                                 <td><span id="payment"></span></td>
                                                 <td class="text-end"><span id="amount"></span></td>
                                             </tr>


                                         </tbody>
                                     </table>
                                 </div> <!-- end table-responsive -->
                             </div> <!-- end col -->
                         </div>
                         <!-- end row -->




                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="modal fade" id="view_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="btn-close text-red" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="row center" id="content">
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Vendor js -->
 <script src="{{ asset('admin_assets/js/vendor.min.js') }}"></script>

 <!-- Plugins js-->
 <script src="{{ asset('admin_assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}">
 </script>
 <!-- Apex js-->
 <script src="{{ asset('admin_assets/libs/apexcharts/apexcharts.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/moment/min/moment.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/jquery.scrollto/jquery.scrollTo.min.js') }}"></script>


 <!-- Dashboard init-->
 <script src="{{ asset('admin_assets/js/pages/dashboard-crm.init.js') }}"></script>

 <!-- App js -->
 <script src="{{ asset('admin_assets/js/app.min.js') }}"></script>


 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

 <script src="{{ asset('admin_assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"
     referrerpolicy="no-referrer"></script>
 <script src="{{ asset('js/custom.js') }}"></script>


 {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
 <script src="{{ asset('admin_assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
 <script src="{{ asset('admin_assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
 <script src="{{ asset('js/custom.js') }}"></script>

 {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" />

 <!-- select2 -->
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
 
 @if (session('success'))
     <script>
         iziToast.success({
             title: 'Success',
             message: '{{ session('success') }}',
             position: 'topRight'
         });
     </script>
 @elseif(session('error'))
     <script>
         iziToast.error({
             title: 'Error',
             position: 'topRight',
             message: '{{ session('error') }}',
         });
     </script>
 @elseif(session('warning'))
     <script>
         iziToast.warning({
             title: 'Caution',
             position: 'topRight',
             message: '{{ session('warning') }}',
         });
     </script>
 @endif

 <script>
     $(document).ready(function() {
         $('#datatable-buttons').dataTable();
     });
     $('#dataTable').DataTable({
         "scrollX": true,
         "language": {
             "paginate": {
                 "previous": "<i class='mdi mdi-chevron-left'>",
                 "next": "<i class='mdi mdi-chevron-right'>"
             }
         },
         "drawCallback": function() {
             $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
         }
     });

     function view_file(url) {
         event.preventDefault();
         $('#content').html('<embed src="' + url +
             '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
         $('#view_modal').modal('show');
     }

     function view_remark(remark) {
         event.preventDefault();
         var content =
             '<div class="text-center"> <i class="bx bxs-no-entry h1 text-info"></i> <h4 class="mt-2">Given Remarks</h4> <p class="mt-3">' +
             remark +
             '</p> <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Continue</button> </div>'
         $("#content").html(content);
         $('#view_modal').modal('show');
     }

     function viewInvoice(id) {
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         $.ajax({
             type: 'POST',
             url: "{{ route('view-invoice') }}",
             data: {
                 id: id,
             },
             success: function(data) {
                 $("#el_no").html(data.en_no);
                 $("#name").html(data.name);
                 $("#tid").html(data.transaction_id);
                 $("#tdate").html(data.transaction_date);
                 $("#payment").html(data.payment_for);
                 $("#amount").html(data.amount);
                 $('#invoice_modal').modal('show');
             }
         });
     }
 </script>
 @yield('js')

 </body>

 </html>
