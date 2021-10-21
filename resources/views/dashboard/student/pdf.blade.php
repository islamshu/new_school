<!DOCTYPE html >
<html dir="rtl">
	<head>
		<meta charset="utf-8" />
   
		<title> {{ $student_name}}</title>

		<style>
            body{
                font-family: 'XBRiyaz',sans-serif;
            }
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
                font-family: 'XBRiyaz',sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: right;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}
			

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.rtl {
				direction: rtl;
                font-family: 'XBRiyaz',sans-serif;
			}

			.rtl table {
				text-align: left;
			}

			.rtl table tr td:nth-child(2) {
				text-align: right;
			}
            @page {
                header: page-header;
                footer: page-footer;
            }
		</style>
	</head>

	<body>
		<div class="invoice-box">
        <div style="text-align: center;">(1)</div>

			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">

						<table>
						  
							<tr>
                                @php
                                $stud = App\Student::find($id);
                               $logoo =   App\Config::first()->logo;
                               $daa = App\General::first()->study_date;
            $data = $daa.' 00:00:00';
             $moo =   \Carbon\Carbon::parse($stud->student_date)->diff($data )->format('%m');
                               
                               
                            @endphp
                            	
							 <td class="title">
								</td>
                    

								<td>
							
									التاريخ: {{  $stud->created_at }}<br />
									
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>بيانات الطالب</td>
					<td> </td>

					
				</tr>
					<td colspan="2">
				
						
							<tr>

								<td>
									اسم الطالب : {{ $student_name }}<br />
									القبيلة : {{ $student_tribe }} <br />
									تاريخ الميلاد  : {{ $student_date }} <br />
                        
                        
                           العمر : {{$age_start }} سنوات  و {{ $moo }} شهر 
                             	<br/>
									الجنس :  {{ $gender }}<br />
									حالة النطق : {{ $speking }} <br />
								</td>

								<td>
									الجنسية : {{ $nationality }}<br />
									مكان الإقامة  : {{ $place_now }}<br />
									المحافظة : {{ $governorate }} <br />
									الولاية : {{ $state }} <br />
									القرية  : {{ $stud->village}} <br />
									الحالة الصحية : {{ $normal }}<br />
									
								</td>
                               
							
								
							</tr>
                            <tr>
                                <td>
                                  
                                    يتم أخذ العبقري صباحا من : {{ $take_at }}<br/>
                                    ويتم إرجاعه الى : {{ $return_at }}<br/>
                                </td>
                                <td>
                                    مكان السكن : {{ $student_life }}<br />
                                                                    أقرب مكان معروف للمنزل : {{ $near_place }}<br />
                                    وصف دقيق للمنزل : {{ $description_place }}<br/>
                                
                                </td>
                            </tr>
                           
					</td>
				</tr>

                <tr class="heading" >
					<td style="background-color: #ddd">بيانات ولي الأمر</td>
					<td style="background-color: #ddd"> </td>

					
				</tr>

				<tr class="details">
					<td>
						اسم ولي الأمر : {{ $father_name }}<br />
						صلته بالطالب : {{ $link_student }}<br />
						رقم البطاقة الشخصية  : {{ $father_id }} <br />
						رقم الهاتف: {{ $father_phone }}  <br />
						
					</td>

					<td>
						البريد الإلكتروني : {{ $father_email }}<br />
						المؤهل الدراسي : {{ $father_student }}<br />
						الوظيفة : {{ $father_job }}<br />
						مكان العمل : {{ $father_palce_job }}<br />
					</td>
				</tr>

				<tr class="heading">
					<td style="background-color: #ddd">بيانات  الأم</td>
					<td style="background-color: #ddd"> </td>
				</tr>

				<tr class="item">
					<td>
					اسم الأم	: {{ $mother_name }} <br />
						
						رقم البطاقة الشخصية  : : {{ $mother_id }} <br />
						رقم الهاتف: {{ $mother_phone }}  <br />

					</td>

					<td>
						المؤهل الدراسي : {{ $mother_student }}<br />
						الوظيفة : {{ $mother_job }}<br />
						مكان العمل : {{ $mother_palce_job }}<br />
					</td>
				</tr>

             <tr class="heading">
					<td style="background-color: #ddd">خاص بالدراسة</td>
					<td style="background-color: #ddd"> </td>
				</tr>

				<tr class="item">
					<td>الفرع المراد التسجيل فيه </td>

					<td> {{ $branch }}</td>
				</tr>

				<tr class="item last">
					<td>المرحلة</td>

					<td>{{ $stage }}</td>
				</tr>

				<tr class="total">
					<td>اجمالي الأقساط</td>

					<td>{{ $total  }}</td>
				</tr>
				<tr class="total">
					<td> القسط الأول</td>

					<td>{{ $fist_q }}</td>
				</tr>
				
				@if($paid == 'مدفوع')
								<tr class="total">
					<td>اجمالي المدفوعات</td>

					<td>{{ $total_paid   }}</td>
				</tr>
				<tr class="total">
					<td> المتبقي </td>

					<td>{{ $total_remain }}</td>
				</tr>
				
				
				@endif
				
				
				<tr class="total">
					<td> حالة الدفع</td>
				<td>  {{ $paid }}</td>
					
				</tr>

				
                </table>	
			

				<br>
				<br>
				<br>
				<br>	
                <br>
				<br>
                <br>
				<br>
                <br>
				<br>
                <br>
				<br>
                <br>
				<br> 
				<br>
				<br>
				<br>
				<br>
				<br>
				<br><br>
		
			
                <div style="text-align: center;">(2)</div>
                <br>
                <br>
	<table>
							<tr>
                  
                               
                               
                           
							 <td class="title">
									{{-- <img src="{{asset('uploads/'.$logoo)}}"  style="width: 150px; height:80px "  /> --}}
								</td>
                    

								<td>
							
									التاريخ: {{  $stud->created_at }}<br />
									
								</td>
							</tr>
						</table>
							<table>
                            <tr class="heading">
					<td style="background-color: #ddd">بنود الاتفاق </td>
				</tr>
				<tr >
				

	<td>  {!! @App\General::first()->student_roles !!}</td>					
				</tr>
                </table>

		</div>
	</body>
</html>
