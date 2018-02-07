@extends('admin.layout.dashboard')

@section('content')

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add new employee</h3>
            </div>
            <!-- /.box-header -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <!-- form start -->
            <form role="form" action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="" placeholder="Enter name" name="name" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <div class="radio">
                            <label class="radio-inline">
                                <input type="radio" name="gender" id="optionsRadios1" value="1" checked="" required>
                                Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" id="optionsRadios2" value="0" required>
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" class="form-control" id="" placeholder="Enter phone number" name="phone_number" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Email address</label>
                        <input type="email" class="form-control" id="" placeholder="Enter email" name="email" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" id="" placeholder="Enter address" name="address" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>JLPT level</label>
                        <select class="form-control" name="JLPT">
                            <option value="N1">N1</option>
                            <option value="N2">N2</option>
                            <option value="N3">N3</option>
                            <option value="N4">N4</option>
                            <option value="N5">N5</option>
                            <option value="None" selected>None</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imgFile">Upload image</label><br>
                        <img id="uploadImg" src="#" alt="your image" />
                        <input type="file" id="imgFile" name="img">
                        <p class="help-block">Upload profile picture</p>
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
            $('#uploadImg').css('visibility','hidden');
            $("#imgFile").change(function () {
                $('#uploadImg').css('visibility','visible');
                readURL(this);
            });
        });
    </script>
@endsection