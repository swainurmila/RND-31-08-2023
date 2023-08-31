@include('frontend.layouts.header')
<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 50%;
    }

    td, th {
      border: 1px solid black;
      text-align: left;
      padding: 10px;
    }

    tr:nth-child(even) {

    }
    

@page {
  size: A4;

}
@media print {

   .horizontal-main {
    display: none;
}
.top-bar {
    display: none;
}
.btn-primary{
    display: none;
}
}
    </style>
@include('frontend.partials.navigation')

<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<section class="sptb portal_background ">
        <div class="section-title form-section-title">
<center>
<form action="" id="research_form">
    <table>
        <tr>
            <th>Category of Supervisor/Co-Supervisor</th>
            <th>Maximum no. of candidates at any point of time</th>
            <th>SC/ST Candidates</th>
            <th>Differently-abled or any other reserved category candidates</th>
            <th>QIP/FIP/NDF/UGC-NET(including JRF)/UGC-CSIR NET(including JRF)/SLET/GPAT/GATE/CAT or other similar national tests</th>
            <th>General Merit Candidates</th>
        </tr>
        <tr>
            <td>Professor Level </td> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>           
        </tr>
        <tr>
            <td>Associate Professor Level </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>            
        </tr>
        <tr>
            <td>Assistant Professor Level </td> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>           
        </tr>
    </table>
</form>
</center>
</div>
</section>
<div class="bg-dark  text-white p-0">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-12 col-sm-12 mt-3 mb-3 text-center ">Copyright &copy; 2021
                <a href="#" class="fs-14 text-primary textfooter"> Biju Patnaik University Of Technology </a> All
                rights reserved.
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    $(document).on('change', '#super_add', function(e) {
       // alert('hello');
        var option = $('option:selected', this).attr('sup-id');
        //alert(optionSelected);
        $('#sup_id').val(option);
    });
</script>
