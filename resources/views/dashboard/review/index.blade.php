@extends('layouts.dashboard2')
@section('css_meta')
<title>الآراء</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>الآراء</span></h5>
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
                      <h4 class="card-title">
                        <a href="{{ route('review.create') }}" class="waves-effect waves-light btn mb-1 mr-1">اضف رأي جديد</a>
                      </h4>
                      <div class="row">
                        
                        <div class="col s12">
                              <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>الصورة</th>
                                <th>ألوصف</th>
                                <th>الحالة</th>
                                <th>الإجرائات</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $key=>$review)
                                    
                                
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img src="{{asset('uploads/'. $review->image )}}" height="70px" width="140px" alt=""></td>

                                  <td>{!!Str::limit($review->description, 50)!!}</td>
                                  <td class="switch mb-1">  <label>
                                   
                                    <input class="check_st" data-id="{{ $review->id }}" name="status"  {{ $review->status == 1 ? 'checked' : '' }} type="checkbox">
                                    <span class="lever"></span>
                                  
                                  </label></td>
                                  <td>
                                    <a href="{{ route('review.edit', $review->id ) }}" class="mb-6 btn-floating waves-effect waves-light btn-info  gradient-shadow">
                                        <i class="material-icons">edit</i>
                                      </a>
                                      <form style="display: inline"  action="{{ route('review.destroy', $review->id) }}" method="post">
                                          @method('delete') @csrf
                                          
                                            
                                            <button class="mb-6 btn-floating waves-effect waves-light btn-danger delete-confirm" onclick="return myFunction();" type="submit" > <i class="material-icons">clear</i></button>
                                          
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