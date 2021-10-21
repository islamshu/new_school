<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>{{ App\Config::first()->title }}</title>
    <!-- Favicon-->
    <link rel="icon" href="https://madares-abqary.com/uploads/site_logo/7KlIYLEG6UbFTU8N08bl2UR0uwhliCilmAbT9IB9.png" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <!-- Theme style. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('assets/css/styles/all-themes.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ asset('assets/css/form.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/bundles/multiselect/css/multi-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css') }}" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<style>
    td{
        text-align: right;
    }
    .rtl [type="checkbox"]+span:not(.lever):before, .rtl [type="checkbox"]:not(.filled-in)+span:not(.lever):after, .rtl [type="checkbox"].filled-in+span:not(.lever):before, .rtl [type="checkbox"].filled-in+span:not(.lever):after, .rtl [type="radio"]+span:before, .rtl [type="radio"]+span:after {
    display: none;
    }
</style>

    @yield('css')
</head>

<body>
    
    
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
      
            <p>يرجى الانتظار ...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    @include('dashboard.partials2.nav')
    <!-- #Top Bar -->
    @include('dashboard.partials2.side')

    <section class="content">
        

        @yield('content')
    </section>
    <!-- Plugins Js -->
    {{-- <script data-cfasync="false" src="../../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"> </script>--}}
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    <script src="{{ asset('assets/js/pages/sparkline/sparkline-data.js') }}"></script>
    <script src="{{ asset('assets/js/pages/index.js') }}"></script>
    <script src="{{ asset('assets/js/table.min.js') }}"></script>

    <script src="{{ asset('assets/js/form.min.js') }}"></script>
    <script src="{{ asset('assets/js/bundles/multiselect/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('assets/js/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/js/pages/forms/advanced-form-elements.js') }}"></script>



    <script src="{{ asset('assets/js/pages/ecommerce/product-detail.js') }}"></script>


<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>

 
    CKEDITOR.replace( '#ckeditor' );

</script>
<script>
 $('.delete-confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `هل متأكد من حذف العنصر ؟`,
        icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });
  </script>
    <script>
        $(document).ready(function () {
    
            $(".image").change(function () {
            
                 if (this.files && this.files[0]) {
                    var reader = new FileReader();
            
                   reader.onload = function (e) {
                        $('.image-preview').attr('src', e.target.result);
                   }
           
                    reader.readAsDataURL(this.files[0]);
               }
            
           });
          });
      </script>
    
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script>
let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
        let switchery = new Switchery(html,  { size: 'small' });
    });</script> 


<script >
       $(document).ready(function() {
        $(".table").dataTable().fnDestroy();

     $('.table').DataTable( {

   
        paging:         true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

        dom: 'Bfrtip',
        buttons: [
            {
                        title: function() {
            return "<div style='font-size: 14px;'></div>";
            } ,
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '12px' )
                        .css('direction','rtl')
                        
                  
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                        
                }
            }
        ]
  
} );
  } );
</script>
    @yield('script')
    <script>
         $('.check_st').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let student = $(this).data('id');
       
        $.ajax({
            type: "get",
            dataType: "json",
            url: '{{ route('student.withdrawn') }}',
            data: {'status': status, 'student': student},
            success: function (data) {
            $(".refresh-table").replaceWith(data);


            }
        });
    });
    </script>

</body>