@extends('layouts.dashboard2')
@section('css_meta')
<title>{{ $message->title }}</title>
@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span></span></h5>
              <ol class="breadcrumbs mb-0">
               

                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    <li class="breadcrumb-item"><a href="{{ route('review.index') }}">الرسائل</a>
                </li>
              </ol>
            </div>
          
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <div id="basic-demo" class="card card-tabs">
            <div class="card-content">
              <div class="card-title">
                <div class="row">
              
                
                </div>
              </div>
              <div id="view-basic-demo">
                <div class="row">
                  @include('dashboard.partials.success')
                  @include('dashboard.partials.error')
            
                 
                    
                  
                      
                 
                  
                    
                   
                      <div class="row">
                        <div class="input-field ">
                          <div class="input-field col m6 s6">
                              <div>
                                  <label for="date-demo1">المرسل  -  {{ $message->created_at }}</label>    @if($message->file != null )   <a target="_blank"  href="{{ asset('uploads/'.$message->file) }}">المرفقات</a> @endif
                              </div>
                              <input type="text" class="form-control "  readonly value="{{ $message->user->name }}"  id="">
                            </div>
  
                        </div>
                        
                        
                    </div>
                   
                    <div class="row">
                      <div class="input-field ">
                        <div class="input-field col m6 s6">
                            <div>
                                <label for="date-demo1" style="font-size: 18px;
    color: black;    font-weight: 700;">نص الرسالة</label>
                            </div>
                            <textarea name="description" id="ckeditor" readonly class="form-control " style="border-width: 2px;
    border-block-color: red;" readonly cols="30" rows="10">{!! $message->dec !!}</textarea>
                          </div>

                      </div>
                      
                      
                  </div>
               
                  @foreach ($message->relpays as $item)
                  <div class="row">
                    <div class="input-field ">
                      <div class="input-field col m6 s6">
                          <div>
                            <label for="date-demo1">@if($item->user_id == 0 ) Admin @else {{ $item->user->name }} @endif  - {{ $item->created_at }}</label>

                            
                          </div>
                          <textarea name="description" id="ckeditor" readonly  style="border-block-color: blue;
    border-width: 2px;"  class="form-control  "  > {!! $item->dec !!}</textarea>
                        </div>

                    </div>
                    
                    
                </div>
                @endforeach




                  
                  <form method="post" action="{{ route('message.replay_admin') }}">
                    @csrf
                    <input name="fathermessage_id" value="{{ $message->id }}" hidden>
   <div>
                                <label for="date-demo1" style="font-size: 18px;
    color: black;    font-weight: 700;">الرد على الرسالة </label>
                            </div>
                                            <div class="input-field col m6 s6">

                    <textarea name="dec" id="ckeditor"  class="form-controlcols="30" palseholder="اكتب الرد هنا" rows="10"></textarea>
                      </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" >ارسل ردك
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









    

@endsection