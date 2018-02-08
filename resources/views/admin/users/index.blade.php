@extends('admin.layout.dashboard')

@section('content')

    <section class="content-header">
        <h1>
            Employee List
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover display" id="userTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Address</th>
                            <th>JLPT level</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{($employee->gender)?"Male":"Female"}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone_number}}</td>
                                <td>{{$employee->address}}</td>
                                <td>{{$employee->JLPT}}</td>
                                <td>
                                    <a href="{{url('user')}}/{{$employee->id}}">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-th-list"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{url('user')}}/{{$employee->id}}/edit">
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" data-id="{{$employee->id}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $employees->links() }}
                </div>
                <!-- /.box-body -->
                {{--Trigger add new modal--}}
                <button class="btn btn-success" data-toggle="modal" data-target="#addNewModal"><i class="fa fa-fw fa-plus"></i>Add new</button>
                {{--Add new modal--}}
            <!-- Modal -->
                <div id="addNewModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">Add new employee</h3>
                            </div>
                            <div class="modal-body">
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
                                                    <input type="radio" name="gender" id="optionsRadios1" value="1" checked="" >
                                                    Male
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" id="optionsRadios2" value="0" >
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone number</label>
                                            <input type="text" class="form-control" id="" placeholder="Enter phone number" name="phone_number"  autocomplete="off" required>
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
                                            <img class="hidden" id="uploadImg" src="#" alt="your image" />
                                            <input class="hidden" type="file" id="imgFile" name="img">
                                            <button type="button" id="uploadImgBtn" class="btn btn-success"><i class="fa fa-fw fa-upload"></i>Upload</button>
                                            <p class="help-block">Upload profile picture</p>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <button class="hidden" type="submit" id="addEmployee">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                paging: false,
                info: false,
                bSort : false,
            });
        });
    </script>
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
        $(function () {
            // AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.btn-danger', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                var btn = $(this);

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                    if(willDelete) {
                        $.ajax({
                            type: 'delete',
                            url: 'user/' + id,
                            success: function (response) {
                                toastr.success('Deleted success');
                                btn.parent().parent().parent().fadeOut('slow');
                            },
                        });
                    }
                }
            )
                ;
            });
            // END AJAX

            $("#imgFile").change(function () {
                $('#uploadImg').removeClass('hidden');
                readURL(this);
            });
            $('#uploadImgBtn').on('click', function() {
                $("#imgFile").trigger('click');
            });
            $('.modal-footer .btn-primary').on('click', function() {
                $("#addEmployee").trigger('click');
            });
        });

    </script>

@endsection
