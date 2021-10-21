@extends('layouts.dashboard2')
@section('css_meta')
    <title>تعديل الدور</title>

@endsection
@section('content')


    <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6 breadcrumbs-left">
                    <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>تعديل دور </span>
                    </h5>
                    <ol class="breadcrumbs mb-0">


                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                        <li class="breadcrumb-item"><a href="{{ route('service.index') }}">الأدوار</a>
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
                                <h4 class="card-title">الأدوار</h4>
                            </div>

                        </div>
                    </div>
                    <div id="view-basic-demo">
                        <div class="row">
                            @include('dashboard.partials.success')
                            @include('dashboard.partials.error')

                            <form class="col s12" method="post" action="{{ route('roles.update', $role->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <label for="icon_prefix3" class="">أسم الصلاحية </label>

                                    <div class="input-field col m6 s6">
                                        <input id="icon_prefix3" type="text" value="{{ $role->name }}" name="name"
                                            class="validate">
                                    </div>

                                </div>

                                <div class="row clearfix">

                                    <div class="input-field col m6 s6">
                                        <div class="form-group">
                                          <label for="" class="">اختر الصلاحية </label>

                                            <div class="form-line">
                                                <select required style="height: 100%; " class="form-control"
                                                    name="permission[]" id="permission[]" multiple>
                                                    <option disabled>اختر الصلاحية</option>

                                                    @foreach ($permission as $branch)
                                                        <option value="{{ $branch->id }}"
                                                            {{ in_array($branch->id, $rolePermissions) ? 'selected' : '' }}>
                                                            {{ $branch->name }}</option>

                                                    @endforeach
                                                </select>
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
