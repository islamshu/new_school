@extends('layouts.dashboard2')
@section('css_meta')
    <title>انشاء رسوم جديدة</title>

@endsection
@section('content')


    <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6 breadcrumbs-left">
                    <ol class="breadcrumbs mb-0">


                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                        <li class="breadcrumb-item"><a href="{{ route('price.index') }}">الرسوم</a>
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
                                <h4 class="card-title">انشاء رسوم</h4>
                            </div>

                        </div>
                    </div>
                    <div id="view-basic-demo">
                        <div class="row">
                            @include('dashboard.partials.success')
                            @include('dashboard.partials.error')
                            @include('dashboard.partials.errorr')
                            <form class="col s12" method="post" action="{{ route('price.store') }}">
                                @csrf


                                <div class="row clearfix">

                                    <div class="col-lg-4 col-md-6 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select required value="{{ old('branch_id') }}" class="form-control"
                                                    name="branch_id" id="branches">
                                                    <option value="" selected disabled>اختر الفرع</option>
                                                    @foreach ($branches as $item)


                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">

                                    <div class="col-lg-4 col-md-6 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select required value="{{ old('stage_id') }}" class="form-control"
                                                    name="stage_id" id="stage_id">
                                                    <option value="" selected disabled>اختر المرحلة</option>
                                                    @foreach ($stages as $item)


                                                        <option value="{{ $item->title }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="input-field col m6 s12">
                                        <i class="material-icons prefix">price</i>
                                        <div class="input-field col m4 ">
                                            <i class="material-icons prefix">navigate_before</i>
                                            <input id="total" type="text" value="{{ old('total') }}" name="total">
                                            <label for="total" class="">السعر الإجمالي</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <i class="material-icons prefix">price</i>
                                        <div class="input-field col m4 ">
                                            <i class="material-icons prefix">navigate_before</i>
                                            <input id="month_p" type="text" value="{{ old('month_p') }}"
                                                name="month_p">
                                            <label for="month_p" class="">الرسوم الشهرية</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <i class="material-icons prefix">price</i>
                                        <div class="input-field col m4 ">
                                            <i class="material-icons prefix">navigate_before</i>
                                            <input id="fist_q" type="text" value="{{ old('fist_q') }}" name="fist_q">
                                            <label for="fist_q" class="">سعر أول قسط</label>
                                        </div>
                                    </div>
                                </div>











                                <div class="row">
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











@endsection
@section('script')
    <div class="div"></div>
    <script>
        @if (old('pivot') != null)
            var i = {{ $key }} +1;
        @else
            var i = 0;
        @endif

        function addRow() {
            const div = document.createElement('div');

            div.className = 'row';

            div.innerHTML = `

    
      <div class="input-field col m4 s4">
        <i class="material-icons prefix">title</i>
        <input  type="text" id="title` + i + `"   name="pivot[` + i + `][title]" class="validate">
        <label  for="title` + i + `" >اسم القسط</label>
      </div>
      <div class="input-field col m3 s3">
        <i class="material-icons prefix">title</i>
        <input  type="text" id="inst` + i + `"   name="pivot[` + i + `][inst]" class="validate">
        <label  for="inst` + i + `" >شهر الاستحقاق</label>
      </div>
      
    
      <div class="input-field col m2 s2">
        <i class="material-icons prefix">attach_money</i>
        <input id="value` + i + `"  type="text"  name="pivot[` + i + `][value]" class="validate">
        <label for="value` + i + `" >القيمة</label>
      </div>
      
    </div>
      
    
      <a onclick="removeRow(this)" class="mb-6 btn-floating waves-effect waves-light red accent-2">
        <i class="material-icons">clear</i>
      </a>
    <div>
    </div>
    </div>
    `;
            ++i;
            document.getElementById('content').appendChild(div);
        }

        function removeRow(input) {
            document.getElementById('content').removeChild(input.parentNode);
        }
    </script>
@endsection
