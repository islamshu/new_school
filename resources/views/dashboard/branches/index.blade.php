@extends('layouts.dashboard2')
@section('css_meta')
<title>الفروع</title>

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
                    <h4 class="card-title">اضف فرع جديد</h4>
                  </div>
                  
                </div>
              </div>
              
                <div class="row">
                  <form action="{{ route('branches.store') }}" method="post">
                    @csrf
                  
                  <div class="col s12">
                    <div class="input-field col s6">
                      <div class="row">
                        <input  id="first_name2" name="title" type="text" class="validate">
                        <label class="active" for="first_name2">اسم الفرع</label>
                      </div>
                    </div>
                    <div class="input-field col s12">
                      <button class="btn cyan waves-effect waves-light right" type="submit">إرسال
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
                </form>
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
                              <tr>
                                <th>#</th>
                                <th>العنوان</th>
                               <th>الحالة</th>

                                <th>الإجرائات</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $key=>$branche)
                                    
                                
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                  <td>{{ $branche->title }}</td>
                                <td>   <input type="checkbox" data-id="{{ $branche->id }}" name="status" class="js-switch" {{ $branche->status == 1 ? 'checked' : '' }}></td>

                             <td>
                                    <a href="{{ route('branches.edit', $branche->id ) }}" class="mb-6 btn-floating waves-effect waves-light btn-info  gradient-shadow">
                                        <i class="material-icons">edit</i>
                                      </a>
                                      <form style="display: inline" action="{{ route('branches.destroy', $branche->id) }}" method="post">
                                          @method('delete') @csrf
                                          
                                            
                                            <button class="mb-6 btn-floating waves-effect waves-light btn-danger delete-confirm" type="submit" > <i class="material-icons">clear</i></button>
                                          
                                      </form>
                                  
                                  </td>
                             
                                </tr>
                                @endforeach
                              
                            </tbody>
                         


                              <tfoot>
                              <tr>
                                <th>#</th>
                                <th>العنوان</th>
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
$(document).ready(function(){
    $('.js-switch').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let branchid = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('branch.update.status') }}',
            data: {'status': status, 'branchid': branchid},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
});

</script>
    
@endsection