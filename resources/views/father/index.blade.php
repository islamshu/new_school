@extends('layouts.father')
@section('content')
 <div class="students">
         <a href="{{ route('wizeerd') }}" target="_blank" class="btn btn-info  add-std"> أضف عبقري <i class="fad fa-plus-circle"></i></a>

    <!-- <h2 class="d-inline-block">الطلاب</h2> -->
    <div class="row">
        @foreach ($students as $item)
       
        <div class="std col-lg-4 col-12">
            <div class="img-box rounded-circle">
                @if ( $item->gender == 'Female')
                <img src="{{ asset('father_style/images/student.png') }}">
                @else
                <img src="{{ asset('father_style/images/student1.png') }}">

                @endif
            </div>
            <table>
                <tr>
                    <th>الاسم:</th>
                    <th>{{ $item->student_name }}<th>
                </tr>
                <tr>
                    <th>العمر:</th>
                    <th>{{ $item->age_start }}</th>
                </tr>
                <tr>
                    <th>الجنس:</th>
                    <th>{{ $item->gender == 'Female' ? 'انثى' : 'ذكر' }}</th>
                </tr>
                <tr>
                    <th>الفرع:</th>
                    <th> {{ @App\Branch::find($item->branch)->title }}</th>
                </tr>
                <tr>
                    <th>المرحلة:</th>
                    <th>{{ $item->stage }}</th>
                </tr>


            </table>

            <a href="{{ route('payments.all_paids',$item->id) }}" class="btn btn-success rounded-pill" style="font-size: 12px;"> الدفعات المالية</a>
            <a href="{{ route('student_show.show',$item->id)}}" class="btn btn-info rounded-pill" style="font-size: 12px;"> ملف الطالب </a>

            <div class="dropdown">
                <button class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                 
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ route('student_show.show',$item->id)}}">مشاهدة</a>
              
                </div>
              </div>
        </div>
        @endforeach
        

    </div>
</div>
    
@endsection