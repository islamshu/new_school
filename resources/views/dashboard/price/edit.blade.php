@extends('layouts.dashboard2')
@section('css_meta')
    <title>تعديل الرسوم </title>


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
                                <h4 class="card-title">تعديل رسوم</h4>
                            </div>

                        </div>
                    </div>
                    <div id="view-basic-demo">
                        <div class="row">
                            @include('dashboard.partials.success')
                            @include('dashboard.partials.error')
                            @include('dashboard.partials.errorr')
                            <form class="col s12" method="post" action="{{ route('price.update', $price->id) }}">
                                @method('put')
                                @csrf

                                <div class="row clearfix">

                                    <div class="col-lg-4 col-md-6 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select required value="{{ old('branch_id') }}" class="form-control"
                                                    name="branch_id" id="branches">
                                                    <option value="" selected disabled>اختر الفرع</option>
                                                    @foreach ($branches as $item)


                                                        <option disabled value="{{ $item->id }}"
                                                            @if ($price->branch_id == $item->id) selected @endif>{{ $item->title }}</option>                                        @endforeach </select>

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
                                                    <option value="" selected disabled>اختر الفرع</option>
                                                    @foreach ($stages as $item)


                                                        <option disabled value="{{ $item->title }}"
                                                            @if ($price->stage_id == $item->title) selected @endif>{{ $item->title }}</option>                                        @endforeach </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">

                                  <div class="col-lg-4 col-md-6 col-sm-8 col-xs-7">
                                      <div class="form-group">
                                          <div class="form-line">
                                            <label for="">السعر الإجمالي</label>

                                            <input type="text" value="{{ $price->total }}" class="form-control" name="total" id="">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row clearfix">

                                <div class="col-lg-4 col-md-6 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <label for="">الرسوم الشهرية</label>

                                          <input type="text" value="{{ $price->month_p }}" class="form-control" name="month_p" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">

                              <div class="col-lg-4 col-md-6 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                      <div class="form-line">
                                        <label for="">القسط الأول </label>

                                        <input type="text" value="{{ $price->fist_q }}" class="form-control" name="fist_q" id="">
                                      </div>
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
