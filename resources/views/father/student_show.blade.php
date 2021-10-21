@extends('layouts.father')
@section('content')
<h2 class="mb-4"> الفاتورة</h2>
<div class="payDetail bg-white">
 
 
     <div class="table-responsive test">
    <div class="billhead">
      <div class="row">
          <div class="col">
              <img src="{{ asset('father_style/images/logo.png') }}" width="200" height="100" > 
          </div><a class="btn btn-info print" target="_blank" href="{{route('pdf.print',$student->id)}}" >طباعة</a>
          <div class="col">
              <span>{{ $student->created_at }}</span>
          </div>
        
      </div>
      
     
  </div>
  <table class="table table-sm">
    <thead>
      <tr class="table-info">
        <th scope="col" colspan="4">بيانات الطالب</th>
     
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">اسم الطالب :</th>
        <td>   {{$student->student_name}}  </td>
        <th scope="row">القبيلة : </th>
        <td>{{ $student->student_tribe }} </td>

      </tr>

        
      <tr>
          <th scope="row">تاريخ الميلاد :</th>
          <td> {{ $student->student_date }}</td>
          <th scope="row">العمر :</th>
          @php
          
          $daa = App\General::first()->study_date;
         $data = $daa.' 00:00:00';
          $moo =   \Carbon\Carbon::parse($student->student_date)->diff($data )->format('%m');

       @endphp
          <td> {{ $student->age_start }} سنوات  و {{ $moo }} شهر</td>

        </tr>
  
        <tr>
          <th scope="row">الجنس : </th>
          <td> @if($student->gender == 'Male'){{ 'ذكر '}} @else {{ 'أنثى' }} @endif</td>
          <th scope="row">مكان الإقامة</th>
          <td>{{ $student->place_now }}</td>
        </tr>

        <tr>
          <th scope="row">المحافظة</th>
          <td> {{ $student->governorate }}</td>
          <th scope="row">الولاية</th>
          <td>{{ $student->state }}</td>

        </tr>

        
        <tr>
          <th scope="row">حالة النطق</th>
          <td> {{ $student->speking }}</td>
          <th scope="row">الحالة الصحية </th>
          <td>@if($student->normal == 1 ){{ 'طبيعي' }} @elseif($student->normal == 2) {{ 'يعاني من أمراض' }} @else {{ 'يعاني من حساسية' }} @endif</td>

        </tr>
        @if($student->normal != 1)
        <tr>
          <th scope="row">حالة النطق</th>
          <td>{{ $student->des_name }}</td>
            </tr>
                      @endif

             
        <tr>
          <th scope="row">مكان السكن</th>
          <td>{{ $student->student_life }}</td>
          <th scope="row">يتم أخذ العبقري صباحا من</th>
          <td>{{ $student->near_place }}</td>
        </tr>
        <tr>
          <th > وصف دقيق للمنزل</th>
          <td>{{ $student->description_place }}</td>
        </tr>

        <tr>
          <th scope="row">يتم أخذ العبقري صباحا من  </th>
          <td>{{ $student->take_at }}</td>
          <th scope="row">ويتم إرجاعه الى </th>
          <td>{{ $student->return_at }}</td>
        </tr>
        <tr class="table-info">
          <th scope="col" colspan="4">بيانات ولي الامر</th>
       
        </tr>
        <tr>
          <th scope="row">الاسم  :</th>
          <td>  {{ $student->father_name }}</td>
          <th scope="row">صلته بالطالب : </th>
          <td>{{ $student->link_student }}</td>

        </tr>
 
          
        <tr>
            <th scope="row">الرقم المدني :</th>
            <td> {{ $student->father_id }}</td>
            <th scope="row"> رقم الهاتف :</th>
            <td>{{ $student->father_phone }}</td>

          </tr>

          <tr>
            <th scope="row">البريد الإلكتروني  :</th>
            <td> {{ $student->father_email }}</td>
            <th scope="row"> المؤهل الدراسي :</th>
            <td>{{ $student->father_student }}</td>

          </tr>
          <tr>
            <th scope="row">الوظيفة :</th>
            <td> {{ $student->father_job }}</td>
            <th scope="row"> مكان العمل  :</th>
            <td>{{ $student->father_palce_job }}</td>

          </tr>

          <tr class="table-info">
              <th scope="col" colspan="4">بيانات  الام</th>
           
            </tr>
            <tr>
              <th scope="row">الاسم  :</th>
              <td>  {{ $student->mother_name }}</td>
             
    
            
                <th scope="row">الرقم المدني :</th>
                <td> {{ $student->mother_id }}</td>
            </tr>
            <tr>
                <th scope="row"> رقم الهاتف :</th>
                <td>{{ $student->mother_phone }}</td>
    
                <th scope="row"> المؤهل الدراسي :</th>
                <td>{{ $student->mother_student }}</td>
    
              </tr>
              <tr>
                <th scope="row">الوظيفة :</th>
                <td> {{ $student->mother_job }}</td>
                <th scope="row"> مكان العمل  :</th>
                <td>{{ $student->mother_palce_job }}</td>  
    
              </tr>
     
              
         

              <tr class="table-info">
                  <th scope="col" colspan="4">خاص بالمدرسة</th>
               
                </tr>
                <tr>
                  <th scope="row">الفرع المراد التسجيل فيه :</th>
                    <td>   {{ @App\Branch::find($student->branch)->title }}</td>
                    <th scope="row">المرحلة :</th>
                    <td> {{ $student->stage }}</td>
                    
              

                </tr>
                                         @if($student->paid != 0 )

                <tr>
                          <th scope="row">الصف :</th>
                          @if($student->class != 0)
                    <td> {{ App\ClassStudent::find($student->class)->name }}</td>
                    @else 
                                        <td> غير مدرج بعد</td>

                    @endif
                </tr>
         
                                                    @endif


                  <tr>
                    
                      <th scope="row"> اجمالي الأقساط :</th>
                      <td> {{ $student->total  }}</td>
                      <th scope="row"> القسط الأول :</th>
                      <td> {{$student->fist_q  }}</td>
                  
                    </tr>
                    <tr>
                    
                      <th scope="row">حالة الدفع :</th>
                      <td>  @if($student->paid != 0 ){{ 'مدفوع' }} @else {{ 'غير مدفوع ' }}@endif </td>
                     
                  
                    </tr>
                    <tr>
                    
                      <th scope="row">اجمالي المدفوعات:</th>
                      <td> {{ $student->total_paid }} </td>
                     
                  
                    </tr>
                    <tr>
                    
                      <th scope="row">المتبقي:</th>
                      <td> {{ $student->total_remain }} </td>
                    
                    </tr>

                   
                      
                    
    </tbody>
  </table>


     </div>

</div>
@endsection