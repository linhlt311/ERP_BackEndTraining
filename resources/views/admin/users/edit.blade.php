@extends('admin.layout.dashboard')

@section('content')

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add new employee</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{url('user')}}/{{$employee->id}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="" name="name" autocomplete="off" value="{{$employee->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <div class="radio">
                            <label class="radio-inline">
                                <input type="radio" name="gender" id="optionsRadios1" value="1" {{($employee->gender)?'checked':''}} required>
                                Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" id="optionsRadios2" value="0" {{(!$employee->gender)?'checked':''}} required>
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" class="form-control" id="" value="{{$employee->phone_number}}" name="phone_number" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Email address</label>
                        <input type="email" class="form-control" id="" value="{{$employee->email}}" name="email" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" id="" value="{{$employee->address}}" name="address" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>JLPT level</label>
                        <select class="form-control" name="JLPT">
                            <option value="N1" {{($employee->JLPT == 'N1')?'selected':''}}>N1</option>
                            <option value="N2" {{($employee->JLPT == 'N2')?'selected':''}}>N2</option>
                            <option value="N3" {{($employee->JLPT == 'N3')?'selected':''}}>N3</option>
                            <option value="N4" {{($employee->JLPT == 'N4')?'selected':''}}>N4</option>
                            <option value="N5" {{($employee->JLPT == 'N5')?'selected':''}}>N5</option>
                            <option value="None" {{($employee->JLPT == 'None')?'selected':''}}>None</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>

@endsection
