<!DOCTYPE html >
<html dir="rtl">
	<head>
		<meta charset="utf-8" />
   
		<title>ملف الموظف</title>

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
                                $emoployee = App\Employee::find($id);
                                $logoo =   App\Config::first()->logo;
                            @endphp
							
            	 <td class="title">
            									<img src="{{asset('uploads/'.$logoo)}}"  style="width: 200px; height:120px "  />
            								</td>
								<td>
							

								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>بيانات  الموظف</td>
					<td> </td>

					
				</tr>
					<td colspan="2">
				
						
							<tr>

								<td>
                                    الاسم : {{ $emoployee->name }}<br />
                                    الجنسية : {{ $emoployee->nationality }} <br />
                                 الرقم المدني   : {{ $emoployee->id_number }} <br />
                    تاريخ الميلاد :{{  $emoployee->dob  }} 	<br/>

							
								</td>

								<td>
                                    الحالة الإجتماعية : {{ $status }}<br />
                                    مكان السكن : {{ $emoployee->address}} <br />
                                     تاريخ بدء العمل : {{ $emoployee->start_job }}<br />
                                  
								
									
								</td>
                               
							
								
							</tr>
                           
                           
					</td>
				</tr>

                <tr class="heading">
					<td>الوظيفة    </td>
					<td>{{ $emoployee->job }} </td>

					
				</tr>
                <tr class="heading">
					<td>الفرع   : </td>
					<td>{{ $emoployee->git_branch() }} </td>

					
				</tr>

               



                <tr class="heading">
					<td>الحالة الصحية :</td>
					<td>{{ $emoployee->helth_status }}</td>
				</tr>

                

                
                <tr class="heading">
					<td>المؤهل</td>
					<td>{!! $emoployee->qualification !!}</td>
				</tr>
                <tr class="heading">
					<td>الراتب</td>
					<td>{!! $emoployee->salary !!}</td>
				</tr>
                <tr class="heading">
					<td>مستوى الأداء</td>
					<td>{{ @$emoployee->rate }}</td>
				</tr>

                <tr class="heading">
					<td>الخبرات</td>
					<td>{!! $emoployee->experience !!}</td>
				</tr>
                <tr class="heading">
					<td>الدورات</td>
					<td>{!! $emoployee->courses !!}</td>
				</tr>
                
               
				
				

				
			</table>
		</div>
	</body>
</html>
