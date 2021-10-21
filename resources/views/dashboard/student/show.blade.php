@extends('layouts.dashboard2')
@section('css_meta')
    <title> {{ $student->student_name }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #section-to-print,
            #section-to-print * {
                visibility: visible;
            }

            #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
            }

        }

    </style>
@endsection
<style>
    .select-wrapper input.select-dropdown {
        display: none !important;
    }

    .modal h1,
    .modal h2,
    .modal h3,
    .modal h4 {
        margin-top: 63px !important;
    }

</style>
@section('content')

    @include('dashboard.partials.success')
    {{ Session::forget('success') }}


    <div id="main ">
        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <!-- app invoice View Page -->
                    <section class="invoice-view-wrapper section">
                        <div class="row">
                            <!-- invoice view page -->
                            <div class="col xl9 m8 s12">
                                <div class="card">
                                    <div class="card-content invoice-print-area">
                                        <!-- header section -->
                                        <div class="row invoice-date-number">
                                            <div class="col xl4 s12">
                                                <span class="invoice-number mr-1"></span>
                                                <span>{{ date_format($student->updated_at, 'Y-m-d g:i a') }}
                                                </span>

                                                <a href="{{ route('student.print', $student->id) }}"
                                                    class="mb-6 btn-floating waves-effect waves-light btn-info  gradient-shadow">
                                                    <i class="material-icons">picture_as_pdf</i>
                                                </a>
                                                @if ($student->paid != 0)


                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal">تغير المرحلة او الفرع</button>
                                                        <a class="btn btn-info"
                                                            href="{{ route('studnet.pill', $student->id) }}">رؤية الأقساط
                                                        </a>

                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            role="dialog" aria-labelledby="formModal" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">هل تود تغير الفرع او
                                                                            المرحلة ؟</h4>

                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form>
                                                                            <div class="form-group">
                                                                                <input type="text" id="student_id"
                                                                                    name="student_id" hidden
                                                                                    value="{{ $student->id }}">
                                                                                <label for="sel1">الفرع</label>
                                                                                <select class="form-control" name="branch"
                                                                                    id="get_stage">
                                                                                    @foreach ($branches as $item)
                                                                                        <option value="{{ $item->id }}"
                                                                                            @if ($item->id == $student->branch) selected @endif>
                                                                                            {{ $item->title }}</option>

                                                                                    @endforeach

                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="sel1">المرحلة</label>



                                                                                <select class="form-control" name="stage"
                                                                                    id="all_stage">
                                                                                    @php
                                                                                        $branch = $student->branch;
                                                                                        $stage = $student->stage;
                                                                                    @endphp

                                                                                    @if ($branch == 6 || $branch == 7 || $branch == 9 || $branch == 11)
                                                                                        <option value="روضة"
                                                                                            @if ($stage == 'روضة') selected @endif>روضة
                                                                                        </option>
                                                                                        <option value="تمهيدي"
                                                                                            @if ($stage == 'تمهيدي') selected @endif>تمهيدي
                                                                                        </option>
                                                                                        <option value="تجهيزي"
                                                                                            @if ($stage == 'تجهيزي') selected @endif>تجهيزي
                                                                                        </option>



                                                                                    @else


                                                                                        <option disabled>يرجى اختيار المرحلة
                                                                                        </option>
                                                                                        <option value="صف أول"
                                                                                            @if ($stage == 'صف أول') selected @endif>الصف
                                                                                            الأول</option>
                                                                                        <option value="صف ثاني"
                                                                                            @if ($stage == 'صف ثاني') selected @endif>الصف
                                                                                            الثاني</option>
                                                                                        <option value="صف ثالث"
                                                                                            @if ($stage == 'صف ثالث') selected @endif>الصف
                                                                                            الثالث</option>
                                                                                        <option value="صف رابع"
                                                                                            @if ($stage == 'صف رابع') selected @endif>الصف
                                                                                            الرابع</option>
                                                                                    @endif
                                                                                </select>


                                                                            </div>

                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="button" id="change" value="تغير"
                                                                            class="btn btn-primary">


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div id="myModal" class="modal fade" role="dialog"
                                                        style="background-color: rgb(0 0 0 / 0 ); ">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">هل تود تغير الفرع او المرحلة
                                                                        ؟</h4>

                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <input type="text" id="student_id" name="student_id"
                                                                            hidden value="{{ $student->id }}">
                                                                        <label for="sel1">الفرع</label>
                                                                        <select class="form-control" name="branch"
                                                                            id="get_stage">
                                                                            @foreach ($branches as $item)
                                                                                <option value="{{ $item->id }}"
                                                                                    @if ($item->id == $student->branch) selected @endif>
                                                                                    {{ $item->title }}</option>

                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="sel1">المرحلة</label>



                                                                        <select class="form-control" name="stage"
                                                                            id="all_stage">
                                                                            @php
                                                                                $branch = $student->branch;
                                                                                $stage = $student->stage;
                                                                            @endphp

                                                                            @if ($branch == 6 || $branch == 7 || $branch == 9 || $branch == 11)
                                                                                <option value="روضة"
                                                                                    @if ($stage == 'روضة') selected @endif>روضة</option>
                                                                                <option value="تمهيدي"
                                                                                    @if ($stage == 'تمهيدي') selected @endif>تمهيدي
                                                                                </option>
                                                                                <option value="تجهيزي"
                                                                                    @if ($stage == 'تجهيزي') selected @endif>تجهيزي
                                                                                </option>



                                                                            @else


                                                                                <option disabled>يرجى اختيار المرحلة
                                                                                </option>
                                                                                <option value="صف أول"
                                                                                    @if ($stage == 'صف أول') selected @endif>الصف الأول
                                                                                </option>
                                                                                <option value="صف ثاني"
                                                                                    @if ($stage == 'صف ثاني') selected @endif>الصف الثاني
                                                                                </option>
                                                                                <option value="صف ثالث"
                                                                                    @if ($stage == 'صف ثالث') selected @endif>الصف الثالث
                                                                                </option>
                                                                                <option value="صف رابع"
                                                                                    @if ($stage == 'صف رابع') selected @endif>الصف الرابع
                                                                                </option>
                                                                            @endif
                                                                        </select>


                                                                    </div>
                                                                    <input type="button" id="change" value="تغير"
                                                                        class="btn btn-primary">


                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                @endif


                                            </div>

                                        </div>
                                        <!-- logo and title -->
                                        <div class="row mt-3 invoice-logo-title">

                                            <div class="col m12 s12">
                                                <h4 class="indigo-text">طلب تسجيل طالب جديد</h4>
                                                <h5><span>بيانات الطالب</span></h5>

                                            </div>
                                        </div>

                                        <div class="divider mb-3 mt-3"></div>
                                        <!-- invoice address and contact -->
                                        <div class="row invoice-info" id="content">
                                            <div class="col m3 s12">
                                                <h6 class="invoice-from">اسم الطالب : {{ $student->student_name }}
                                                </h6>
                                                <div class="invoice-address">
                                                    <h6><span>القبيلة : {{ $student->student_tribe }} </span></h6>
                                                </div>
                                                @php
                                                    
                                                    $daa = App\General::first()->study_date;
                                                    $data = $daa . ' 00:00:00';
                                                    $moo = \Carbon\Carbon::parse($student->student_date)
                                                        ->diff($data)
                                                        ->format('%m');
                                                    
                                                @endphp
                                                <div class="invoice-address">
                                                    <h6><span>تاريخ الميلاد : {{ $student->student_date }} </span></h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6> <span>العمر : {{ $student->age_start }} سنوات و
                                                            {{ $moo }} شهر </span></h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6> <span>الجنس : @if ($student->gender == 'Male'){{ 'ذكر ' }} @else {{ 'أنثى' }} @endif</span></h6>
                                                </div>
                                                <h6 class="invoice-to">حالة النطق : {{ $student->speking }}</h6>
                                            </div>
                                            <div class="col m3 s12">
                                                <div class="divider show-on-small hide-on-med-and-up mb-3"></div>
                                                <h6 class="invoice-to">الجنسية : {{ $student->nationality }}</h6>
                                                <div class="invoice-address">
                                                    <h6><span>مكان الإقامة : {{ $student->place_now }}</span></h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6><span> المحافظة : {{ $student->governorate }} </span></h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6> <span>الولاية : {{ $student->state }}</span></h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6> <span>القرية : {{ $student->village }}</span></h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6> <span>الحالة الصحية : @if ($student->normal == 1){{ 'طبيعي' }} @elseif($student->normal == 2) {{ 'يعاني من أمراض' }} @else {{ 'يعاني من حساسية' }} @endif</span>
                                                    </h6>
                                                </div>
                                                @if ($student->normal != 1)
                                                    <div class="invoice-address">
                                                        <h6> <span>يعاني من : {{ $student->des_name }} </span>
                                                        </h6>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col m6 s12">
                                                <div class="divider show-on-small hide-on-med-and-up mb-3"></div>
                                                <div class="invoice-address">
                                                    <h6> <span>مكان السكن : {{ $student->student_life }}</span></h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6> <span>أقرب مكان معروف للمنزل : {{ $student->near_place }}</span>
                                                    </h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6> <span>وصف دقيق للمنزل : {{ $student->description_place }}</span>
                                                    </h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6> <span>يتم أخذ العبقري صباحا من : {{ $student->take_at }}</span>
                                                    </h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6> <span>ويتم إرجاعه الى : {{ $student->return_at }}</span></h6>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="row mt-3 invoice-logo-title">
                                            <div class="col m6 s12 display-flex invoice-logo mt-1 push-m6">
                                            </div>
                                            <div class="">
                                                <h5><span>بيانات ولي الأمر</span></h5>
                                            </div>
                                        </div>
                                        <div class="divider mb-3 mt-3"></div>

                                        <div class="row invoice-info">
                                            <div class="col m4 s12">
                                                <h6 class="invoice-from">اسم ولي الأمر : {{ $student->father_name }}
                                                </h6>
                                                <div class="invoice-address">
                                                    <h6><span>صلته بالطالب : {{ $student->link_student }} </span></h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6><span>رقم البطاقة الشخصية : {{ $student->father_id }} </span>
                                                    </h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6> <span> رقم الهاتف: {{ $student->father_phone }} </span></h6>
                                                </div>

                                            </div>
                                            <div class="col m6 s12">
                                                <div class="invoice-address">
                                                    <h6> <span>البريد الإلكتروني : {{ $student->father_email }}</span>
                                                    </h6>
                                                </div>
                                                <div class="divider show-on-small hide-on-med-and-up mb-3"></div>
                                                <h6 class="invoice-to">المؤهل الدراسي :
                                                    {{ $student->father_student }}</h6>
                                                <div class="invoice-address">
                                                    <h6><span>الوظيفة : {{ $student->father_job }}</span></h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6><span> مكان العمل : {{ $student->father_palce_job }} </span></h6>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mt-3 invoice-logo-title">
                                            <div class="col m6 s12 display-flex invoice-logo mt-1 push-m6">
                                            </div>
                                            <div class="">
                                                <h5><span>بيانات الأم </span></h5>
                                            </div>
                                        </div>
                                        <div class="divider mb-3 mt-3"></div>

                                        <div class="row invoice-info">
                                            <div class="col m4 s12">
                                                <h6 class="invoice-from">اسم الأم : {{ $student->mother_name }} </h6>
                                                <div class="invoice-address">
                                                    <h6><span> رقم البطاقة الشخصية : {{ $student->mother_id }} </span>
                                                    </h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6><span>رقم الهاتف : {{ $student->mother_phone }} </span></h6>
                                                </div>


                                            </div>
                                            <div class="col m4 s12">
                                                <div class="invoice-address">
                                                    <h6> <span> المؤهل الدراسي : {{ $student->mother_student }} </span>
                                                    </h6>
                                                </div>
                                                <div class="invoice-address">
                                                    <h6> <span>الوظيفة : {{ $student->mother_job }}</span></h6>
                                                </div>
                                                <div class="divider show-on-small hide-on-med-and-up mb-3"></div>
                                                <h6 class="invoice-to">مكان العمل : {{ $student->mother_palce_job }}
                                                </h6>


                                            </div>
                                        </div>

                                        <div class="divider mb-3 mt-3"></div>
                                        <!-- product details table-->

                                        <!-- invoice subtotal -->
                                        <div class="invoice-subtotal">
                                            <div class="row">

                                                <div class="">




                                                    <ul>
                                                        @if ($student->paid == 0)
                                                         
                                                                
                                                                <div class="switch display-flex">
                                                                    <label>
                                                                        <span class="invoice-subtotal-title"  ><strong>دفع نقدي  </strong>  </span> 

                                                                        <input id="student_paid"
                                                                            student_id="{{ $student->id }}"
                                                                            name="student_id"
                                                                            {{ $student->paid == 1 ? 'checked' : '' }}
                                                                            type="checkbox">
                                                                        <span class="lever"></span>

                                                                    </label>
                                                            
                                                        @endif
                                                        @if ($student->paid == 1)

                                                            <li class="display-flex justify-content-between">
                                                                <h6> <span class="invoice-subtotal-title"> ألية الدفع : {{ @$student->payment_method }}
                                                                    </span>    </h6>
                                                                <h6 class="invoice-subtotal-value">
                                                                    </h6>
                                                            </li>
                                                        @endif
                                                        <li class="display-flex justify-content-between">
                                                            <h6> <span class="invoice-subtotal-title">الفرع المراد التسجيل
                                                                    فيه  :  {{ @App\Branch::find($student->branch)->title }} </span>  </h6>
                                                         
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <h6> <span class="invoice-subtotal-title">المرحلة : {{ $student->stage }}</span></h6>
                                                            </h6>
                                                        </li>
                                                        @if ($student->paid == 1)

                                                            @if ($student->class != 0)
                                                                <li class="display-flex justify-content-between">
                                                                    <h6> <span class="invoice-subtotal-title">الصف :  {{ App\ClassStudent::find($student->class)->name }}</span>
                                                                    </h6>
                                                                    <h6 class="invoice-subtotal-value">
                                                                        {{ App\ClassStudent::find($student->class)->name }}
                                                                    </h6>
                                                                </li>
                                                            @else
                                                                <li class="display-flex justify-content-between">
                                                                    <h6> <span class="invoice-subtotal-title">الصف : غير مدرج بعد</span>
                                                                    </h6>
                                                                </li>
                                                            @endif
                                                        @endif

                                                        <li class="display-flex justify-content-between">
                                                            <h6> <span class="invoice-subtotal-title">اجمالي الأقساط : {{ $student->total }}
                                                                </span></h6>
                                                            </h6>
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <h6> <span class="invoice-subtotal-title">القسط الأول : {{ $student->fist_q }}</span>
                                                            </h6>
                                                            </h6>
                                                        </li>
                                                        @if ($student->paid == 1)
                                                            <li class="display-flex justify-content-between">

                                                                <h6> <span class="invoice-subtotal-title">إجمالي المدفوعات :    {{ $student->total_paid }}
                                                                    </span></h6>
                                                         
                                                            </li>
                                                            <li class="display-flex justify-content-between">

                                                                <h6> <span class="invoice-subtotal-title">المتبقي :  {{ $student->total_remain }} </span>
                                                                </h6>
                                                          
                                                            </li>
                                                            <li class="display-flex justify-content-between">

                                                                <h6> <span class="invoice-subtotal-title">إجمالي عدد
                                                                        الأقساط المدفوعة :                                                                     {{ App\Studentpain::where('student_id', $student->id)->where('status', 1)->count() }}
                                                                        من
                                                                        {{ App\Studentpain::where('student_id', $student->id)->count() }} </span></h6>
                                                            
                                                            </li>




                                                        @endif



                                                        <li class="display-flex justify-content-between">
                                                            <h6> <span class="invoice-subtotal-title"> حالة الدفع : @if ($student->paid != 0){{ 'مدفوع' }} @else {{ 'غير مدفوع ' }} @endif</span>
                                                            </h6>
           
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- invoice action  -->

                        </div>
                    </section><!-- START RIGHT SIDEBAR NAV -->

                    <!-- END RIGHT SIDEBAR NAV -->
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>




@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <script>
        var doc = new jsPDF();
        var specialElementHandlers = {
            '#editor': function(element, renderer) {
                return true;
            }
        };

        // $(document).ready(function(){
        // $('#cmd').click(function () {
        function saveDiv(divId, title) {
            doc.fromHTML(`<html><head><title>تحميل</title></head><body>` + document.getElementById('content').innerHTML +
                `</body></html>`);

            doc.save('div.pdf');
            // doc.save('sample-file.pdf');

        }
    </script>
    <script type='text/javascript'>
        function printDiv() {

            var divToPrint = document.getElementById('main');

            var newWin = window.open('', 'Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

            newWin.document.close();

            setTimeout(function() {
                newWin.close();
            }, 10);

        }
    </script>
    <script>
        $(document).ready(function() {
            $("#get_stage").change(function() {
                var branch = $('#get_stage option:selected').val();
                $.ajax({
                    url: '{{ route('get_stage_admin') }}',
                    type: 'post',
                    dataType: 'html',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        branch: branch
                    },
                    success: function(data) {
                        $("#all_stage").html(data);
                    }
                });
            });
            $('#change').click(function() {
                var student_id = $('#student_id').val();
                var branch = $('#get_stage option:selected').val();
                var stage = $('#all_stage option:selected').val();
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: '{{ route('change_stage') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'student_id': student_id,
                        'branch': branch,
                        'stage': stage
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
            $('#student_paid').change(function() {
                let student_paid = $(this).prop('checked') === true ? 1 : 0;
                var student_id = '{{ $student->id }}';


                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: '{{ route('refresh.paid') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'student_id': student_id
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
        });
        (function($) {
            $(function() {

                //initialize all modals           
                // $('.modal').modal();

                $('#change').click(function() {
                    $('#myModal').modal('open');
                });
                //or by click on trigger
                // $('.trigger-modal').modal();

            }); // end of document ready
        })(jQuery);
    </script>
