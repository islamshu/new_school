    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>اسم الطالب</th>
                                  <th>اسم الوالد </th>
                                <th>الفرع</th>
                                <th>المرحلة التعليمية</th>
                              <th> انسحاب</th>

                                <th>الإجرائات</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $key=>$student)
                                    
                                
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td @if($student->withdrawn == 1)  style="background-color:#ffd1d1"@endif >{{ $student->student_name }}</td>
                                    <td>{{ $student->father_name }}</td>

                                    <td>{{ @App\Branch::find($student->branch)->title }}</td>
                                  <td > {{ $student->stage }} </td>
                                  <td>
                                      <input type="checkbox" data-id="{{ $student->id }}" name="status" class="js-switch check_st" {{ $student->withdrawn == 1 ? 'checked' : '' }}>

                                  </td>
                                  
                                    
                                  <td>
                                    <a href="{{ route('studnets.show',$student->id) }}" class="mb-6 btn-floating waves-effect waves-light btn-info  gradient-shadow" >
                                        <i class="material-icons">remove_red_eye</i>
                                      </a>
                                      <form style="display: inline" action ="{{route('studnets.destroy',$student->id)}}"  method="post">
                                          @method('delete') @csrf
                                          
                                            
                                            <button class="mb-6 btn-floating waves-effect waves-light btn-danger delete-confirm" type="submit" > <i class="material-icons">clear</i></button>
                                          
                                      </form>
                                        <form style="display: inline" action ="{{route('check_paid',$student->id)}}"  method="post">
                                        @csrf
                                         
                                           
                                           <button class="mb-6 btn-floating waves-effect waves-light  check-confirm" type="submit" > <i class="material-icons">check</i></button>
                                         
                                     </form>
                                  
                                  </td>
                             
                                </tr>
                                @endforeach
                              
                            </tbody>
                         


                              <tfoot>
                              <tr>
                                <th>#</th>
                                <th>اسم الطالب</th>
                                    <th>اسم الوالد </th>
                                <th>الفرع</th>
                                <th>المرحلة التعليمية</th>
                                                              <th> انسحاب</th>

                                <th>الإجرائات</th>
                                 
                              </tr>
                            </tfoot>
                          </table>