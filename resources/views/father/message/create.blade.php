@extends('layouts.father')
@section('content')
<h2>مراسلة الادارة</h2>

        @include('father.parts.success')
@include('father.parts.errorr')

            <form method="post" action="{{ route('send-message.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" class="form-control mb-1" placeholder="الموضوع">
                <select name="branch" class="form-control mb-1" id="">
                    @foreach ($branches as $item)  
                                   
                    <option value="{{   $item }}">
                    {{ App\Branch::find($item)->title }}
                    </option>
                    @endforeach
                </select>

                
                <textarea  rows="12" name="dec" class="form-control mb-1" placeholder="التفاصيل"></textarea>
                
                <input type="file" name="file" class="form-control mb-1">
                <input type="submit" class="btn btn-primary mt-1" value="إرسال">
            </form>
        </div>
    
@endsection