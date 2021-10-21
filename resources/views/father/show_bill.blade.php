@extends('layouts.father')
@section('content')
<h2 class="mb-4"> الفاتورة</h2>
<div class="payDetail bg-white">
 
 
     <div class="table-responsive">
        
    <div class="billhead">
      <div class="row">
          <div class="col">
              <img src="{{ asset('father_style/images/logo.png') }}" width="200" height="100"> 
                                                            <a class="btn btn-info print" target="_blank" style="    left: 56% !important; " href="{{route('pdf.print_pill',$order->id)}}" >طباعة</a>

          </div>
          
          <div class="col">

              <p>الرقم التسلسلي<span class="d-block">{{$order->code}}</span></p>
              <span>{{ $order->created_at }}</span>

          </div>

      </div>
  </div>
  <table class="table table-sm" >
    <thead>
  

          <tr class="table-info">
              <th scope="col" colspan="4">بيانات الدفعة</th>
           
            </tr>
            <tr>
              <th scope="row">اسم الطالب :</th>
              <td> {{App\Student::find($order->student_id)->student_name }}</td>
              <th scope="row">قيمة الدفعة : </th>
              <td>{{ $order->amount }}</td>

            </tr>
     
              
           

              <tr class="table-info">
                  <th scope="col" colspan="4">بيانات الفاتورة </th>
               
                </tr>
                @php
                $dates = json_decode($order->months)
@endphp
@foreach ($dates as $item)
                <tr>
                  
                        
                
                  <th scope="row">عن شهر     -  	&nbsp; 	&nbsp; 	&nbsp; {!! str_replace('T20:00:00.000000Z', ' ', $item) !!} </th>
               
               
                
                @endforeach
   <th> اجمالي    {{ App\Student::find($order->student_id)->total }}  </th> 
   <th> اجمالي المدفوعات للطالب  :{{ $order->total_paid }}  </th>
                  <th> اجمالي  المتبقي  : {{  $order->total_remain }}  </th>
                  </tr>
                
    </tbody>
  </table>


     </div>

</div>
</div>

@endsection