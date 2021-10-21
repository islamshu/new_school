@extends('layouts.father')
@section('content')
<div class="Payments">
    <h2>الدفعات</h2>


    <form style="display: inline" action="{{ route('test_piad') }}" method="post" >
      @csrf
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr class="table-info">
            <th scope="col">#</th>
            <th scope="col">حدد</th>
            <th scope="col">المبلغ</th>
            <th scope="col">الحالة</th>
            <th scope="col">تاريخ الاستحقاق</th>


          </tr>
        </thead>
        <tbody>
            @foreach ($paids as $key=> $item)
           
          <tr>
            <input type="" hidden name="student_id" value="{{ $item->student_id }}">

            <th scope="row">{{ $key + 1 }}</th>
            <td>@if($item->status == 1)   __ @else <input value="{{ $item->id }}" name="piad[]" type="checkbox" enabled> @endif </td>
            <td>{{ $item->amount }}</td>
            <td class="due" @if ($item->status == 1 ) style="background-color :#9fff9f " @else style="background-color :#ffaeae "  @endif >@if($item->status == 1 ) مدفوع @else غير مدفوع @endif</td>
            <td>{{ $item->payment_date }}</td>
        
          </tr>
               
          @endforeach

       
        </tbody>
      </table>
    </div>

    <input type="submit" class="btn btn-success mt-1" value="دفع">
  </form>
  <a href="{{ route('student_show.show',$paids->first()->student_id) }}" class="btn btn-primary mt-1" >ملف الطالب</a>
  {{-- <input type="submit" class="btn btn-success mt-1" value="دفع"> --}}

  </div>
    
@endsection