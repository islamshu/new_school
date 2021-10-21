<!DOCTYPE html >
<html dir="rtl">
	<head>
		<meta charset="utf-8" />
   
		<title> طلب تسجيل دورة</title>

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
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
                                @php
                                $student = App\CourseStudent::find($id);
                                $logoo = App\General::first()->skill_logo;
                                			$config = App\Config::first();

                            @endphp
					
                     						
								
								  	 <td class="title" >
				<span style="font-size: 15px">	التاريخ: {{  $student->created_at }}<br /></span>
				   <img src="{{asset('uploads/'.$config->icon)}}" style="width: 250px; height:250px " />
   
			   </td>  

						
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>بيانات مقدم الطلب</td>
					<td> </td>

					
				</tr>
					<td colspan="2">
				
						
							<tr>

								<td>
                                    الاسم ثلاثي : {{ $student->name }} <br />
                                    القبيلة : {{ $student->tribe }} <br />
                                    المحافظة  : {{ $student->governorate }} <br />
                                    الولاية : {{ $student->state }} 	<br/>
                                    البريد الإلكتروني : {{ $student->email }} 	<br/>
							
								</td>

								<td>
                                    الوظيفة المرشحة ومكان العمل : {{ $student->job }}<br />
									رقم البطاقة الشخصية : {{ $student->st_id }}<br />
                                    رقم الهاتف : {{ $student->phone }}  <br />
                                    المؤهل الدراسي : {{ $student->learn }}<br />
								
									
								</td>
                               
							
								
							</tr>
                           
                           
					</td>
				</tr>

                <tr class="heading" >
					<td style="background-color: #ddd">بيانات الدورة </td>
					<td style="background-color: #ddd"> </td>

					
				</tr>

				<tr class="details">
					<td>
                        اسم الدورة :  {{ App\Course::find($student->course_id)->title }}<br />
                        رسوم الدورة  :  {{ App\Course::find($student->course_id)->price }}<br />

                        اسم البرنامج التدريبي :  {{ App\Course::find($student->course_id)->program }} <br />
                       مكان الدورة   :  {{ App\Course::find($student->course_id)->address }} <br />

						يبدأ من  :  {{ App\Course::find($student->course_id)->from }} <br />
                        ينتهي في :  {{ App\Course::find($student->course_id)->to }} <br />
                        
 <!--نوع البرنامج التعريفي: 	@if(App\Course::find($student->course_id)->show == 1 ){{ 'حضور مباشر' }} @elseif(App\Course::find($student->course_id)->show == 2 ) {{ 'مدمج' }} @else {{ 'عن بعد' }} @endif   		-->

						</td>

				
				</tr>
					<tr class="details">
					<td>
					    <br>
أتعهد بالالتزام بجميع اشتراطات التدريب بالمعهد
<br />
                
					</td>

				
				</tr>

				
			</table>
		</div>
	</body>
</html>
