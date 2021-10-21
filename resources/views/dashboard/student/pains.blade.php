@extends('layouts.dashboard2')
@section('css_meta')
 @php 
      $student = App\Student::find($studentpains->first()->student_id);
      @endphp
<title>الطالب :  {{ $student->student_name }}  القبيلة : {{ $student->student_tribe }}</title>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>الفروع</span></h5>
              <ol class="breadcrumbs mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                </li>
              </ol>
            </div>
          
          </div>
        </div>
      </div>
      @include('dashboard.partials.success')
      @include('dashboard.partials.error')
     
      <div class="row">
        <div class="col s12">
          <div id="prefilling-text" class="card card-tabs">
            <div class="card-content">
              <div class="card-title">
                <div class="row">
                  <div class="col s12 m6 l6">
                    <h4 class="card-title">   اسم الطالب : {{$student->student_name}} </h4>
                  </div>
                  
                </div>
              </div>
              
               
             
              </div>
            </div>
          </div>
        </div>
      </div>     
  
              <div class="row">
              
                <div class="col s12 m12 l12">
                   
               <div id="button-trigger" class="card card card-default scrollspy">
                    <div class="card-content">
                     
                      <div class="row">
                        
                        <div class="col s12">
                              <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                            
                           <tr >
                            <th >#</th>
                            <th >المبلغ</th>
                            <th >الحالة</th>
                            <th >تحقق من الدفع</th>
                            <th >تاريخ الاستحقاق</th>
                
                
                          </tr>
                             </thead>
                            <tbody>
                                 
                                @foreach ($studentpains as $key=>$item)
                              
                                     <tr>
            <input type="" hidden name="student_id" value="{{ $item->student_id }}">

            <th >{{ $key + 1 }}</th>
            <td>{{ $item->amount }}</td>
            <td  @if ($item->status == 1 ) style="background-color :#9fff9f " @else style="background-color :#ffaeae "  @endif >@if($item->status == 1 ) مدفوع @else غير مدفوع @endif</td>
            <td >
          
                
                @if($item->status == 0  && $item->session_id != '0' && $item->session_id[0] != '0')
                <form method="post" action="{{route('student_paids',$item->session_id)}}">
                    @csrf
                    <input type="submit" value="تحقق من الدفع" class="btn btn-info">
                </form>
@else
لا يمكن التحقق
@endif
                
            </td>
            
                                        @if($key == 0)
                                       <td>{{ \Carbon\Carbon::parse($item->payment_date)->subMonth(1)->format('Y-m-d') }}</td>
                                        @else
                                            <td>{{ $item->payment_date }}</td>
                                            @endif        
          </tr>
                                @endforeach
                              
                            </tbody>
                         


                              <tfoot>
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">المبلغ</th>
                                 <th scope="col">الحالة</th>
                                 <th scope="col">تحقق من الدفع</thh>
                                 <th scope="col">تاريخ الاستحقاق</th>
                                 
                              </tr>

                            </tfoot>
                          </table>
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
<script>
    $('.check_st').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let slider_id = $(this).data('id');
       
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('slider.update.status') }}',
            data: {'status': status, 'slider_id': slider_id},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

    
@endsection