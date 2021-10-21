@extends('layouts.dashboard2')
@section('css_meta')
<title>تعديل موظف</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>تعديل موظف </span></h5>
              <ol class="breadcrumbs mb-0">
               

                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">الموظفين</a>
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
                  <div class="col s12 m6 l10">
                    <h4 class="card-title">الموظفين</h4>
                  </div>
                
                </div>
              </div>
              <div id="view-basic-demo">
                <div class="row">
                  @include('dashboard.partials.success')
                  @include('dashboard.partials.error')
     
                  <form class="col s12" method="post" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method('put')
                    <div class="row">

                      <label for="" class="">أسم الموظف </label>

                      <div class="input-field col m6 s6">
                          <input id="icon_prefix3" type="text" value="{{ $user->name }}" name="name"
                              class="validate">
                      </div>

                  </div>
                  <div class="row">
                    <label for="" class="">البريد الإلكتروني </label>

                    <div class="input-field col m6 s6">
                        <input id="" type="email" value="{{$user->email }}" name="email"
                            class="validate">
                    </div>

                </div>



                       <div class="row">
                        <label for="" class="">كلمة المرور  </label>

                      <div class="input-field col m6 s6">
                        <input id="" type="password"  name="password" class="validate">
                      </div>
                      
                    </div>

                    <div class="row clearfix">

                      <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                          <div class="form-group">
                            <label for="" class="">الدور </label>

                              <div class="form-line">
                                  <select required class="form-control"
                                      name="roles_name[]" id="roles_name[]">
                                      <option disabled selected>اختر الدور</option>

                                      @foreach ($roles as $role)

                                          <option value="{{ $role }}" @if($user->hasRole($role)) selected @endif >{{ $role }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
                  
                     
                  <div class="row clearfix">

                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <select required value="{{ old('branch[]') }}" class="form-control"
                                    name="branch[]" id="branch[]">
                                    <option disabled selected>اختر القرع</option>

                                    @foreach ($branchs as $branch)

                                        <option value="{{ $branch->id }}" @if (in_array($branch->id, auth()->user()->branch)) selected @endif>
                                            {{ $branch->title }}</option>
                                    @endforeach
                                </select>
                                <label for="" class="">القرع </label>
                            </div>
                        </div>
                    </div>
                </div>
    
                   
         
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" >إرسال
                              <i class="material-icons right">send</i>
                            </button>
                          </div>
                    </div>
                    
                  
                  </form>
<!-- Container closed -->
</div>
<!-- main-content closed -->

                </div>
              </div>
            
            </div>
          </div>
        </div>
      </div>









    

@endsection