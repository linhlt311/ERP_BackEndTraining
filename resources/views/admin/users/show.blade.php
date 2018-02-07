@extends('admin.layout.dashboard')

@section('content')

    <section class="content-header">
        <h1>
            Profile
        </h1>
    </section>

    <section class="content">
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$employee->name}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <img class="profile-user-img img-responsive img-circle" src="{{url('storage')}}/{{$employee->image}}" alt="User profile picture">
                    Name: {{$employee->name}}
                    <br>
                    Gender: {{($employee->gender)?"Male":"Female"}}
                    <br>
                    Email: {{$employee->email}}
                    <br>
                    Phone number: {{$employee->phone_number}}
                    <br>
                    Address: {{$employee->address}}
                    <br>
                    JLPT level: {{$employee->JLPT}}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            <a href="{{route('user.index')}}">
                <button class="btn btn-success">Back</button>
            </a>
        </section>
    </section>
@endsection

@section('javascript')



@endsection
