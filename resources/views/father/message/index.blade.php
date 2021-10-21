@extends('layouts.father')
@section('content')
<div class="archive">
    <h2 class="mb-4">ارشيف الرسائل</h2>



    <div class="table-responsive test" >
      <table class="table table-sm">
        <thead>
          <tr class="table-info">
            <th scope="col">#</th>
            <th scope="col">عنوان الرسالة</th>
            <th scope="col"colspan="2" >الرسالة</th>
            <th scope="col">تاريخ الرسالة</th>
            <th scope="col">الحالة</th>
            <th scope="col">معاينة</th>


          </tr>
        </thead>
        <tbody>
            @foreach ($messages as$key=> $item)
                
           
          <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $item->title }}</td>
            <td colspan="2">{{ \Illuminate\Support\Str::limit($item->dec, 15, $end='...') }}
            </td>
            <td>{{date('d-m-Y', strtotime($item->created_at)) }}</td>
            <td class="view">@if($item->view == 0) غير مقروء @else مقروء @endif </td>
            <td><a href="{{ route('send-message.show',$item->id) }}"><i class="fad fa-eye"></i></a></td>

          </tr>
          @endforeach

        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection