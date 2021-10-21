<!DOCTYPE html >
<html dir="rtl">
	<head>
		<meta charset="utf-8" />
   @php
   $order = App\Order::find($id);
   @endphp
		<title> فاتورة رقم </title>

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
                                $logoo =   App\Config::first()->logo;
                            @endphp
							
            	 <td class="title">
            									<img src="{{asset('uploads/'.$logoo)}}"  style="width: 200px; height:120px "  />
            								</td>
								<td>
                                <br />
											الرقم التسلسلي: {{  $order->code }}
                                            <br />
                                            <br />
									التاريخ: {{  $order->created_at }}<br />
									
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading" style="width:100%">
					<td>بيانات الدفعة  : </td>
				


					<td colspan="2">
				
						
							<tr>

								<td>
                                    الاسم :{{App\Student::find($order->student_id)->student_name }} &nbsp;	 &nbsp;	 &nbsp;	 &nbsp;	 		</td>
                               
                                 <td>  قيمة الدفعة : {{ $order->amount }} 	</td>	<br/>
                                   
                            	
							</tr>
                           
                           
							<tr>

					  <td > اجمالي    {{ App\Student::find($order->student_id)->total}}  </td>

                                  <td> اجمالي المدفوعات   :{{ $order->total_paid }}  </td>
                  <td>   المتبقي  : {{  $order->total_remain }}  </td>
                                   
                                     
							
								
							</tr>
					</td>
					

					
				</tr>
		  <tr class="heading">
					<td>بيانات الفاتورة </td>
					
</tr>
				
                @php
                $dates = json_decode($order->months)
@endphp
@foreach ($dates as $item)
                <tr>
                  
                        
                
                  <th >عن شهر     -  	&nbsp; 	&nbsp; 	&nbsp; {!! str_replace('T20:00:00.000000Z', ' ', $item) !!} </th>
               
               
                </tr>
                @endforeach

           


				
			</table>
		</div>
	</body>
</html>
