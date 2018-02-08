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
                    {{--Trigger upload img modal--}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-upload"></i>Upload image</button><br>
                    {{--End trigger--}}
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
                    <a href="{{route('user.edit', ['id'=>$employee->id])}}">
                        <button class="btn btn-warning">Edit information</button>
                    </a>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            <a href="{{route('user.index')}}">
                <button class="btn btn-success">Back</button>
            </a>

            {{--Upload image modal--}}
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Upload profile image</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" action="{{route('user.update.image', ['id' => $employee->id])}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <img class="hidden" id="uploadImg" src="#" alt="your image" />
                                    <input class="hidden" type="file" id="imgFile" name="img">
                                    <button type="button" id="uploadImgBtn" class="btn btn-success"><i class="fa fa-fw fa-upload"></i>Upload</button>
                                    <p class="help-block">Upload profile picture</p>
                                    <button type="submit" class="hidden" id="updateImg"></button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>
@endsection

@section('javascript')
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#uploadImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $("#imgFile").change(function () {
                $('#uploadImg').removeClass('hidden');
                readURL(this);
            });
            $('#uploadImgBtn').on('click', function() {
                $("#imgFile").trigger('click');
            });
            $('.modal-footer .btn-primary').on('click', function() {
                $("#updateImg").trigger('click');
            });
        });
    </script>
@endsection
