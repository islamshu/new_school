<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="rtl">
  <!-- BEGIN: Head-->
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    {{-- <title>Dashboard Modern | Materialize - Material Design Admin Template</title> --}}
    @yield('css_meta')
    <link rel="apple-touch-icon" href="{{ asset('dashbord_style/app-assets/images/favicon/apple-touch-icon-152x152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dashbord_style/app-assets/images/favicon/favicon-32x32.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
  
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/vendors/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/vendors/animate-css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/vendors/chartist-js/chartist.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/vendors/chartist-js/chartist-plugin-tooltip.css') }}">
    <!-- END: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/css-rtl/style-rtl.min.css') }}">
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/css-rtl/themes/vertical-menu-nav-dark-template/materialize.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/css-rtl/themes/vertical-menu-nav-dark-template/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/css-rtl/pages/dashboard-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/css-rtl/pages/intro.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/vendors/data-tables/css/select.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/vendors/data-tables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/css/pages/data-tables.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashbord_style/app-assets/css-rtl/custom/custom.css') }}">
 <!--<script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script> -->

    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-menu-nav-dark preload-transitions 2-columns   " data-open="click" data-menu="vertical-menu-nav-dark" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('dashboard.partials.header')

    <!-- END: Header-->
 

@include('dashboard.partials.aside')
<div id="main">
  <div class="row">
@yield('content')
</div>
</div>

    <!-- BEGIN: Page Main-->
 

    @include('dashboard.partials.custom')


    <!-- BEGIN: Footer-->

    @include('dashboard.partials.footer')


    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('dashbord_style/app-assets/js/vendors.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('dashbord_style/app-assets/vendors/chartjs/chart.min.js')}}"></script>
    <script src="{{ asset('dashbord_style/app-assets/vendors/chartist-js/chartist.min.js')}}"></script>
    <script src="{{ asset('dashbord_style/app-assets/vendors/chartist-js/chartist-plugin-tooltip.js')}}"></script>
    <script src="{{ asset('dashbord_style/app-assets/vendors/chartist-js/chartist-plugin-fill-donut.min.js')}}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{ asset('dashbord_style/app-assets/js/plugins.min.js')}}"></script>
    <script src="{{ asset('dashbord_style/app-assets/js/search.min.js')}}"></script>
    <script src="{{ asset('dashbord_style/app-assets/js/custom/custom-script.min.js')}}"></script>
    <script src="{{ asset('dashbord_style/app-assets/js/scripts/customizer.min.js')}}"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->

    
    <script src="{{ asset('dashbord_style/app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('dashbord_style/app-assets/js/scripts/dashboard-modern.js')}}"></script>
    <script src="{{ asset('dashbord_style/app-assets/js/scripts/intro.min.js')}}"></script>
    <script src="{{ asset('dashbord_style/app-assets/js/scripts/form-elements.min.js')}}"></script>
    <script src="{{ asset('dashbord_style/app-assets/js/scripts/data-tables.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
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
  $('.redrow-confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `هل متأكد من إعادة خدمة الموظف ؟`,
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
   $('.drow-confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
       title: `هل متأكد من الغاء خدمة الموظف  ؟`,
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
@yield('script') 
   
<script>      
  $(document).ready(function() {
    M.updateTextFields();
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
  <script>
                    //    $("textarea").each(function(){
 //   CKEDITOR.inline( this );
//});
 
                        CKEDITOR.replace( '#ckeditor' );
  
 </script>
<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small' });
});</script> 
<script type="text/javascript">

  function setTime(){
var d = new Date();
currentDay = d.getTime();
return currentDay;


}




</script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
 function myFunction() {
    
     
          
                    swal({
                            title:'هل أنت متأكد من الحذف',
                            timer: 5000,
                            icon:"warning",
                            
                            showConfirmButton: false,
                            type: "success",
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Yes, delete it!'
                        });
                       
    //   event.preventDefault();
  }
  
  function getnotifications(){
    
    $.get("{{ route('user_not',Auth::id()) }}",{ dx: setTime(),},
function(data,status){
           var tersmwobj = jQuery.parseJSON(data);



      var response = tersmwobj ;

          if (tersmwobj == undefined || typeof response.id == 'undefined' || response.id < '1' || response.id == '-1' ) {
  
   window.open("{{ url('/') }}",'_blank');

   return false;}

if (response.count > 0) {

$('.notificount').html(response.count);
$('.notificount').show();
var thedata = response.data;

if (response.data  && response.data!=='' && thedata.length > 0) {

var $datxxxa = '' ;

thedata.forEach(function(mj){

var test= new Date(mj.created_at).toString();


$datxxxa += '    <li><a class="black-text" href="'+mj.data.url+'"><span class="material-icons icon-bg-circle cyan small">notifications</span> '+ mj.data.title;
  $datxxxa += '    </a>';
  $datxxxa += '   </li>';
});



var pane = $('.notifiuser');
$('.notifiuser').html($datxxxa);


}


}


});
}



getnotifications();
var dsklfjsd =  setInterval(function(){
  getnotifications();
}, 10000);

$("#read_not").on("click", function(){
      $.ajax({
                   type: "get",
            dataType: "json",
            url: '{{ route('user_not_read') }}',
            data: {"_token": "{{csrf_token()}}"},
            success: function (data) {
                console.log(data.message);
            }
        });
});
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

</html>