@extends('layouts.dashboard2')
@section('css_meta')
<title> {{$title}}</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>طلبات التسجيل</span></h5>
              <ol class="breadcrumbs mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                </li>
              </ol>
            </div>
          
          </div>
        </div>
      </div>
     
               
  
              <div class="row">
              
                <div class="col s12 m12 l12">
                    @include('dashboard.partials.success')
                    @include('dashboard.partials.error')
                                        @include('dashboard.partials.errorr')

                  <div id="button-trigger" class="card card card-default scrollspy">
                    <div class="card-content">
                     
                      <div class="row" id="testtt">
                     
                        <div class="col s12">
                                             @include('dashboard.student._student')

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            






    

@endsection
@section('script')

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script >
       $(document).ready(function() {
           
     $('#example').DataTable( {
  dom: 'Bfrtip',
  buttons: [
  'copy', 'csv', 'excel', 'print'
  ]
} );



    
       } );
</script>

    
@endsection