@extends('layouts.father')
@section('content')
<div class="main text-right bg-white" style="direction: rtl;">
    <div class="container">
        @include('father.parts.success')
        @include('father.parts.errorr')
        <div class="float-right mb-3 name">
            <img src="{{ asset('father_style/images/student1.png') }}" width="50" height="50" class="rounded-circle d-inline-block bg-success">
            <p class="d-inline-block ">{{ $message->user->name }}</p>  @if($message->file != null )   <a target="_blank"  href="{{ asset('uploads/'.$message->file) }}">المرفقات</a> @endif
        </div>
        <span class="float-left mb-3">{{ $message->created_at }}</span>
        <div class="clearfix"></div>
        <h3 class="">{{ $message->title }}</h3>
        <p class="msg">

{!! $message->dec !!}
        
        </p>
        <hr>
        @foreach ($message->relpays as $item)
            
       
        


        <div class="float-right mb-3 mt-3 name">
            <img src="{{ asset('father_style/images/student1.png') }}" width="50" height="50" class="rounded-circle d-inline-block @if($item->user_id == 0 )bg-secondary @else bg-success @endif" >
            <p class="d-inline-block ">@if($item->user_id == 0 ) Admin @else {{ $item->user->name }} @endif</p>

        </div>
        <span class="float-left mb-3 mt-3">{{ $item->created_at }}</span>
        <div class="clearfix"></div>
        <p class="msg">
            {!! $item->dec !!}
      
        </p>
            
        <hr>
        @endforeach


        <h3>اترك رد</h3>
    <form method="post" action="{{ route('message.replay') }}">
        @csrf
        <input name="fathermessage_id" value="{{ $message->id }}" hidden>

        <textarea name="dec"  rows="6" class="form-control mt-1" placeholder="ادخل نص..."></textarea>
        <input type="submit" class="btn-rep btn btn-primary mt-3" value="إرسال">


    </form>
    </div>
</div>
    
@endsection