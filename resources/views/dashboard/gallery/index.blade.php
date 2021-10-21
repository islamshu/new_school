@extends('layouts.dashboard2')
@section('css_meta')
<title>المراحل</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down">معرض الصور<span></span></h5>
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
                    <h4 class="card-title">اضف  صورة جديدة</h4>
                  </div>
                  
                </div>
              </div>
              
                <div class="row">
                  <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  
                  <div class="col s12">
                    <div class="row">
                                              <div class="col m6 s12 file-field input-field">

                                                          <label style="    font-size: 19px;
    font-weight: 600;
    color: black;"  class="">بيانات الصورة</label>

                                  <input id="icon_prefix3" type="text" 
                                  value="{{   old('caption')   }}"
                              
                                  placeholder="fa fa-envelope" name="caption" >
                                </div>
                              
                      <div class="col m6 s12 file-field input-field">
                          <div class="btn float-right">
                            <span>اضف صورة</span>
                            <input class="image" type="file"  value="{{old('image')}}" name="image">
                            
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate image-preview "  value="{{old('image')}}" disabled  placeholder="ادخل  صورة السلايدر" >
                            <img src="{{old('image')}}" class="image-preview" width="100px" height="70px" alt="">
                      
                         
                          </div>
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
                            
                                <th>الإجرائات</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($galles as $key=>$gallery)
                                    
                                
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                  <td><img src="{{ asset('uploads/'.$gallery->image) }}" width="150" height="70" alt=""></td>
                             <td>
                                    <a href="{{ route('gallery.edit', $gallery->id ) }}" class="mb-6 btn-floating waves-effect waves-light btn-info  gradient-shadow">
                                        <i class="material-icons">edit</i>
                                      </a>
                                      <form style="display: inline" action="{{ route('gallery.destroy', $gallery->id) }}" method="post">
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