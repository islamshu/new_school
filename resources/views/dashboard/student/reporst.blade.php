@extends('layouts.dashboard2')
@section('css_meta')
<title>طلبات تسجيل الطلبة الغير مدفوعة</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>التقارير</span></h5>
              <ol class="breadcrumbs mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                </li>
              </ol>
            </div>
          
          </div>
        </div>
      </div>
     
               
  
              <div class="row">
              
                <div class="col s12 m12 l12">
                    @include('dashboard.partials.success')
                    @include('dashboard.partials.error')
                    <div class="row">
                      <div class="col s12">
                        <div id="prefilling-text" class="card card-tabs">
                          <div class="card-content">
                            <div class="card-title">
                              <div class="row">
                                <div class="col s12 m6 l6">
                                  <h4 class="card-title">بحث متقدم</h4>
                                </div>
                                
                              </div>
                            </div>
                            
                              <div class="row">
                                <form action="{{ route('student.search') }}" method="get">
                                  @csrf
                                
                                <div class="col s12">
                                  <div class="input-field col s2">
                                    <div class="row">
                                      <select  name="branch_id">
                                        <option value="">اختر الفرع</option>
                                        @foreach (App\Branch::get() as $branch)
                                            <option  value="{{ $branch->id }}"  @if($request->branch_id == $branch->id) selected  @endif>{{ $branch->title }}</option>
                                        @endforeach
                                      </select>
                                      <label for="icon_prefix3" class="">اختر الفرع </label>

                                    </div>
                                  </div>
                                  <div class="input-field col m6 s6">
                                    <div class="form-group">
                                      <label for="" class="">اختر المرحلة </label>

                                        <div class="form-line">
                                            <select required style="height: 100%; " class="form-control"
                                                name="permission[]" المرحلة="permission[]" multiple>
                                                <option disabled>اختر الصلاحية</option>

                                                @foreach ($branchs as $branch)
                                                    <option value="{{ $branch->id }}"
                                                     >
                                                        {{ $branch->title }}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                  <div class="input-field col s2">

                                    <div class="row" style="margin-top: -21px;">
                                      <label for="icon_prefix3" class="">من تاريخ  </label>

                                     <input type="date" name="from" value="{{ $request->from,  date('Y-m-d')}}"  id="">

                                    </div>
                                  </div>
                                  <div class="input-field col s2">

                                    <div class="row" style="margin-top: -21px;">
                                      <label for="icon_prefix3" class="">إلى تاريخ</label>

                                      <input type="date" name="to" value="{{ $request->to,  date('Y-m-d')}}"  id="">

                                    </div>
                                  </div>
                                  <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right" type="submit">بحث
                                      <i class="material-icons right">search</i>
                                    </button>
                                  </div>
                                </div>
                              </form>
                              </div>
                           
                            </div>
                          </div>
                        </div>
                      </div>
                  <div id="button-trigger" class="card card card-default scrollspy">
                    <div class="card-content">
                     
                      <div class="row">
                        
                        <div class="col s12">
                              <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>اسم الطالب</th>
                                <th>الفرع</th>
                                <th>المرحلة التعليمية</th>
                                <th>الإجرائات</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $key=>$student)
                                    
                                
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $student->student_name }}</td>

                                    <td>{{ App\Branch::find($student->branch)->title }}</td>
                                  <td > {{ $student->stage }} </td>
                                  <td>
                                    <a href="{{ route('studnets.show',$student->id) }}" class="mb-6 btn-floating waves-effect waves-light btn-info  gradient-shadow">
                                        <i class="material-icons">remove_red_eye</i>
                                      </a>
                                      <form style="display: inline"  method="post">
                                          @method('delete') @csrf
                                          
                                            
                                            <button class="mb-6 btn-floating waves-effect waves-light btn-danger" type="submit" > <i class="material-icons">clear</i></button>
                                          
                                      </form>
                                  
                                  </td>
                             
                                </tr>
                                @endforeach
                              
                            </tbody>
                         


                              <tfoot>
                              <tr>
                                <th>#</th>
                                <th>الصورة</th>
                                <th>الوصف</th>
                                <th>الحالة</th>
                                <th>الإجرائات</th>
                                 
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
<script>





    $('.check_st').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let review_id = $(this).data('id');
       
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('review.update.status') }}',
            data: {'status': status, 'review_id': review_id},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
</script>
    
@endsection