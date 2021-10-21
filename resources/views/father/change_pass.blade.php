@extends('layouts.father')
@section('content')
<h2>تغير كلمة المرور</h2>

    <div class="container">

       
        
            <form method="post" action="{{ route('change_pass.father') }}" >
                @csrf
                @include('father.parts.success')
                @include('father.parts.errorr')
                {{-- <input type="password" style="width: 30%" required name="currnet_pass" class="form-control mb-1" placeholder="كلمة المرور الحالية"> --}}
                <input type="password" style="width: 30%" required name="new_password" class="form-control mb-1" placeholder="كلمة المرور الجديدة">
                <input type="password" style="width: 30%" required name="relpay_password" class="form-control mb-1" placeholder="إعادة كلمة المرور">

                
                <input type="submit" value="تغير" class="btn btn-primary mt-1">
            </form>
        </div>
    
@endsection