@extends('layouts.father')
@section('content')

<h2 class="mb-4"> الفواتير</h2>
<div class="payDetail bg-white">
 
 

  <div class="table-responsive" >
    <table class="table table-sm" >
      <thead>
        <tr class="table-info">
          <th scope="col">#</th>
          <th scope="col"> الاسم</th>
         <th scope="col"> الرقم التسلسلي</th> 

          <th scope="col">تاريخ الفاتورة</th>
          <th scope="col">الفاتورة</th>


        </tr>
      </thead>
   
      <tbody>
        @foreach ($orders as $order)
              
          
        <tr>
          <th scope="row">1</th>
          <td>{{ App\Student::find($order->student_id)->student_name }}</td>
          <td >{{$order->code}}</td> 
          <td>{{ $order->created_at }}</td>
          <td><a href="{{ route('bills.show',$order->id) }}"><i class="fad fa-eye"></i></a></td>
        </tr>
        @endforeach

     
      </tbody>
 
    </table>
  </div>


</div> 

@endsection