@extends('layouts.dashboard2')
@section('css_meta')
<title>الرسائل</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>الرسائل</span></h5>
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
                  <div id="button-trigger" class="card card card-default scrollspy">
                    <div class="card-content">
                      
                      <div class="row">
                        
                        <div class="col s12">
                              <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th >عنوان الرسالة</th>
            <th colspan="2" >الرسالة</th>
            <th >تاريخ الرسالة</th>
        <th >الفرع</th>
            <th >الحالة</th>
            <th >معاينة</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($messages as$key=> $item)
                
           
                              <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $item->title }}</td>
                                <td colspan="2">{{ \Illuminate\Support\Str::limit($item->dec, 15, $end='...') }}
                                </td>
                                <td>{{ $item->created_at }}</td>
                                 <td>{{ App\Branch::find($item->branch)->title }}</td>
                                <td class="view">@if($item->view == 0) غير مقروء @else مقروء @endif </td>
                                <td>
                                  <a href="{{ route('show_admin_message', $item->id ) }}" class="mb-6 btn-floating waves-effect waves-light btn-info  gradient-shadow">
                                    <i class="material-icons">remove_red_eye</i>
                                  </a>
                                
                                </td>
                    
                              </tr>
                              @endforeach
                              
                            </tbody>
                         


                              <tfoot>
                                <tr>
                                  <th>#</th>
                                  <th >عنوان الرسالة</th>
              <th colspan="2" >الرسالة</th>
              <th >تاريخ الرسالة</th>
              <th >الحالة</th>
              <th >معاينة</th>
                                  
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