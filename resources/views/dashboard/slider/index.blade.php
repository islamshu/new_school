@extends('layouts.dashboard2')
@section('css_meta')
<title>السلاديرات</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>السلاديرات</span></h5>
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
              
                <div class="col s12 m12 l12">
            
                  <div id="button-trigger" class="card card card-default scrollspy">
                    <div class="card-content">
                      <h4 class="card-title">
                        <a href="{{ route('slider.create') }}" class="waves-effect waves-light btn mb-1 mr-1">اضف سلايدر جديد</a>
                      </h4>
                      <div class="row">
                        
                        <div class="col s12">

                          <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>الصورة</th>
                                <th>الحالة</th>
                                <th>الإجرائات</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($sliders as $key=>$slider)
                                    
                                
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td > {{ $slider->title }} </td>
                                    <td><img src="{{asset('uploads/'. $slider->image )}}" height="70px" width="140px" alt=""></td>
                                    <td class="switch mb-1">  <label>
                                     
                                      <input class="check_st" data-id="{{ $slider->id }}" name="status"  {{ $slider->status == 1 ? 'checked' : '' }} type="checkbox">
                                      <span class="lever"></span>
                                    
                                    </label></td>
                                    <td>
                                      <a href="{{ route('slider.edit', $slider->id ) }}" class="mb-6 btn-floating waves-effect waves-light btn-info  gradient-shadow">
                                          <i class="material-icons">edit</i>
                                        </a>
                                        <form style="display: inline" action="{{ route('slider.destroy', $slider->id) }}" method="post">
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
                                <th>الصورة</th>
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