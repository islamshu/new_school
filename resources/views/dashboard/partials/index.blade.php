@extends('layouts.dashboard2')
@section('content')
<div class="container-fluid">
   @php
      $user = auth()->user();
   @endphp
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                   
                    
                  <div class="container">
                     <div class="row">
                       <div class="col s10 m6 l6 breadcrumbs-left">
                         <ol class="breadcrumbs mb-0">
                          
           
                           <li class="breadcrumb-item"><a >الرئيسية</a>
                           </li>
                         </ol>
                       </div>
                     
                     </div>
                   </div>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
      @if ($user->HasRole('اداري'))

      <div class="col-lg-3 col-sm-6">
          <div class="support-box text-center l-bg-red">

              <div class="text m-t-10 m-b-10" style="font-size: 20px">اجمالي طلبات التسجيل</div>
              <h2 class="m-b-0">{{ App\Student::count() }}
              </h2>
          </div>
      </div>
      <div class="col-lg-3 col-sm-6">
          <div class="support-box text-center l-bg-cyan">
              <div class="text m-t-10 m-b-10" style="font-size: 20px">اجمالي الطلبات المدفوعة
              </div>
              <h2 class="m-b-0">{{ App\Student::where('paid', 1)->count() }}
              </h2>
          </div>
      </div>


      <div class="col-lg-3 col-sm-6">
          <div class="support-box text-center l-bg-orange">
              <div class="text m-t-10 m-b-10" style="font-size: 20px">اجمالي الطلبات الغير
                  المدفوعة</div>
              <h2 class="m-b-0">{{ App\Student::where('paid', 0)->count() }}
              </h2>
          </div>
      </div>
      <div class="col-lg-3 col-sm-6">
          <div class="support-box text-center green">
              <div class="text m-t-10 m-b-10" style="font-size: 20px">اجمالي عدد الطلبة المسجيلن
                  للدورات</div>
              <h2 class="m-b-0">{{ App\CourseStudent::count() }}
              </h2>
          </div>
      </div>

  @endif
    </div>
    

<div class="row">
   @if ($user->HasRole('اداري'))
       @php
           $branchs = App\Branch::get();
       @endphp

   @else
       @php
           
           $branch = Auth::user()->branch;
           $branchs = App\Branch::FindMany($branch);
           
       @endphp
   @endif

   @foreach ($branchs as $key => $item)
   <div class="col-lg-3 col-sm-6">
      <div class="support-box text-center @if ($key % 2 == 0){{ 'l-bg-red' }}@else{{ 'l-bg-blue' }}@endif  ">

               <div class="text m-t-10 m-b-10" style="font-size: 20px">اجمالي عدد الطلاب في :
                   {{ $item->title }}</div>
               <h2 class="m-b-0">{{ App\Student::where('branch', $item->id)->count() }}
               </h2>
           </div>
       </div>

   @endforeach
</div>


@endsection