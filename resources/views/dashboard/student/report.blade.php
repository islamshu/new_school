@extends('layouts.dashboard2')
@section('css_meta')
<title>التقارير</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<!--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">-->
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
                                
<div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select  value="{{ old('branch_id') }}" class="form-control"
                                                name="branch_id" id="stage_id">
                                                    <option value="" selected disabled>اختر الفرع</option>
                                                    @foreach (App\Branch::get() as $item)


                                                    <option value="{{ $item->id }}"  @if($request->branch_id == $item->id) selected  @endif>{{ $item->title }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                      <div class="form-group">
                                          <div class="form-line">
                                              <select  value="{{ old('stage_id') }}" class="form-control"
                                              name="stage_id" id="stage_id">
                                                  <option value="" selected disabled>اختر المرحلة</option>
                                                  @foreach (App\Stage::get() as $item)


                                                  <option value="{{ $item->title }}"  @if($request->stage_id == $item->title) selected  @endif>{{ $item->title }}</option>
                                              @endforeach
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

                                    <div class="row" style="margin-top: -21px;">
                                      <label for="icon_prefix3" class="">من تاريخ  </label>

                                     <input type="date" name="from" value="{{ $request->from,  date('Y-m-d')}}"  id="">

                                    </div>
                                  </div>
                                
                                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

                                    <div class="row" style="margin-top: -21px;">
                                      <label for="icon_prefix3" class="">إلى تاريخ</label>

                                      <input type="date" name="to" value="{{ $request->to,  date('Y-m-d')}}"  id="">

                                    </div>
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
                                    <td>{{ @$key+1 }}</td>
                                    <td>{{ @$student->student_name }}</td>

                                    <td>{{ @App\Branch::find($student->branch)->title }}</td>
                                  <td > {{ @$student->stage }} </td>
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

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script >
       $(document).ready(function() {
     $('#example').DataTable( {
  dom: 'Bfrtip',
  buttons: [
  'copy', 'csv', 'excel', 'print'
  ]
} );
  } );
</script>
    
@endsection