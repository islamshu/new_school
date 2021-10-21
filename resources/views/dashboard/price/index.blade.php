@extends('layouts.dashboard2')
@section('css_meta')
<title>الأسعار</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>الأسعار</span></h5>
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
              <h4 class="card-title">
                <a href="{{ route('price.create') }}" class="waves-effect waves-light btn mb-1 mr-1">اضف سعر  جديدة</a>
              </h4>
              <div class="card-title">
                <div class="row">
                 
                  
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
                              <tr>
                                <th>#</th>
                         
                                <th>الفرع</th>
                                <th>المرحلة</th>
                                <th>الإجرائات</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($prices as $key=>$price)
                                    
                                
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                  <td>{{ App\Branch::find($price->branch_id)->title }}</td>
                                  <td>{{ $price->stage_id }}</td>
                             <td>
                                    <a href="{{ route('price.edit', $price->id ) }}" class="mb-6 btn-floating waves-effect waves-light btn-info  gradient-shadow">
                                        <i class="material-icons">edit</i>
                                      </a>
                                      <form style="display: inline" action="{{ route('price.destroy', $price->id) }}" method="post">
                                          @method('delete') @csrf
                                          
                                            
                                            <button class="mb-6 btn-floating waves-effect waves-light btn-danger delete-confirm" type="submit" > <i class="material-icons">clear</i></button>
                                          
                                      </form>
                                  
                                  </td>
                             
                                </tr>
                                @endforeach
                              
                            </tbody>
                         


                              <tfoot>
                                <th>الفرع</th>
                                <th>المرحلة</th>
                                <th>الإجرائات</th>
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
</script>
    
@endsection