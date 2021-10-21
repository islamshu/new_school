@extends('layouts.dashboard2')
@section('css_meta')
<title>الإشعارات</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>الإشعارات</span></h5>
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
                      <th>
                          #
                      </th>
                      <th>
                          الاشعار
                      </th>
                      <th>
                        الوقت
                    </th>
                    
                     
                      <th class="text-center">
                          الحالة
                      </th>
                       <th class="text-center">
                          مشاهدة
                      </th>
                      
                  </tr>
                            </thead>
                            <tbody>
                                @php
                      $user = Auth::user();

                      
                  @endphp
                  @foreach ($user->notifications as $item)
                                
                                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              {{ $item->data['title'] }}
                          </a>
                         
                      </td>
                      <td>
                        <a>
                            {{ $item->created_at->diffForhumans() }}
                        </a>
                       
                    </td>
                    
                      <td class="project_progress">
                      {{$item->read_at == null ? 'غير مشاهد' : 'تمت مشاهدته'}}
                      </td>
                    
                      <td style="float: right;" class="project-actions text-right">
                          <a class="btn btn btn-xs btn-info" href="{{ $item->data['url'] }}
                            ">
                            
                              مشاهدة
                          </a>
                      
                      </td>
                  </tr>
                  @endforeach
                 
              </tbody>
                         


                              <tfoot>
                              <tr>
                                <th>#</th>
                                <th>الإشعار</th>
                            
                                <th>الوقت</th>
                                  <th>الحالة</th>
                                  <th>مشاهدة</th>

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
    $('.select2-size-sm').select2({
      dropdownAutoWidth: true,
      width: '100%',
      containerCssClass: 'select-sm'
  }); 
    
</script>
    
@endsection