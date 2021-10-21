@extends('layouts.dashboard2')
@section('css_meta')
<title> {{ $employee->name }}</title>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>


@endsection
@section('content')
    


  <div class="row">
    <div class="content-wrapper-before blue-grey lighten-5"></div>
    <div class="col s12">
      <div class="container">
        <!-- app invoice View Page -->
<section class="invoice-view-wrapper section">
<div class="row">
<!-- invoice view page -->
<div class="col xl9 m8 s12">
  <div class="card">
    <div class="card-content invoice-print-area">
      <!-- header section -->
      <div class="row invoice-date-number">
        <div class="col xl4 s12">
              <a href="{{ route('employee.print', $employee->id ) }}" class="mb-6 btn-floating waves-effect waves-light btn-info  gradient-shadow">
                                        <i class="material-icons">picture_as_pdf</i>
                                      </a>
        </div>
       
      </div>
      <!-- logo and title -->
      <div class="row mt-3 invoice-logo-title">
        <div class="col m6 s12 display-flex invoice-logo mt-1">
          <img src="{{ asset('uploads/'.App\Config::first()->logo) }}" alt="logo" height="80" width="164">
        </div>
     </div>
      <div class="divider mb-3 mt-3"></div>
      <!-- invoice address and contact -->
      <div class="row invoice-info">
        <div class="col m6 s12">
          <h6 class="invoice-from">الاسم : {{ $employee->name }}</h6>
          <div class="invoice-address">
            <h6 class="invoice-from">الجنسية : {{ $employee->nationality }}</h6>
          </div>
          <div class="invoice-address">
              <h6 class="invoice-from">الرقم المدني   : {{  $employee->id_number  }}</h6>
          </div>
          <div class="invoice-address">
            <h6 class="invoice-from">تاريخ الميلاد : {{ $employee->dob }}</h6>
          </div>
           <div class="invoice-address">
      <h6 class="invoice-from">تاريخ بدء العمل : {{ $employee->start_job }}</h6>
          </div>
         
        </div>
        <div class="col m6 s12">
          <div class="divider show-on-small hide-on-med-and-up mb-3"></div>
        <h6 class="invoice-to">الحالة الإجتماعية : @if($employee->social_status == 1) 
              عزباء @elseif($employee->social_status == 2) 
              متزوجة @elseif($employee->social_status == 3) مطلقة 
              @else($employee->social_status == 4) أرملة @endif </h6>
          <div class="invoice-address">
          <h6 class="invoice-to">مكان السكن : {{ $employee->address}}</h6>

          </div>
           <div class="invoice-address">
          <h6 class="invoice-to"> الفرع : {{$employee->git_branch()}}</h6>

          </div>
         
        </div>
      </div>
      <div class="divider mb-3 mt-3"></div>
      <!-- product details table-->
      <div class="invoice-product-details">
        <table class="striped responsive-table">
        
          <tbody>
            <tr>
              <td>الوظيفة    :</td>
              <td>{{ $employee->job }}</td>
                <td>الموهل  :

              </td>
            <td>{{ $employee->qualification }}</td>
            </tr>
            
            <tr>
            
              <td>الحالة الصحية :

              </td>
            <td>{{ $employee->helth_status }}</td>
              <td>مستوى الأداء   :
              </td>
            <td>{{ @$employee->rate }}</td>     
            </tr>
               <tr>
            
              <td>الراتب  :

              </td>
            <td>{{ $employee->salary }}</td>
        
            </tr>
           
               
          
        

           
          </tbody>
        </table>
      </div>
      <!-- invoice subtotal -->
      <div class="divider mt-3 mb-3"></div>
      <div class="invoice-subtotal">
        <div class="row">
          <div class="col m3 s12">
            <p>الخبرات</p>
          </div>
          <div class="col xl4 m9 s12 offset-xl3">
         {!! $employee->experience !!}
          </div>
        </div>
        <div class="row">
          <div class="col m3 s12">
            <p>الدورات</p>
          </div>
          <div class="col xl4 m9 s12 offset-xl3">
         {!! $employee->courses !!}
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
<!-- invoice action  -->




@endsection
@section('script')

 <script>
                        CKEDITOR.replace( '#ckeditor' );
    </script>
@endsection

