@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">{{$student->name}} Detail information</h4>
                    <p class="card-title-desc text-success text-center fw-bold">{{Session::get('message')}}</p>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <tr>
                            <th>Student Id</th>
                            <td>{{$student->id}}</td>
                        </tr>
                        <tr>
                            <th>Student Title</th>
                            <td>{{$student->name}}</td>
                        </tr>
                        <tr>
                            <th>Student Email</th>
                            <td>{{$student->email}}</td>
                        </tr>
                        <tr>
                            <th>Student Mobile</th>
                            <td>{{$student->mobile}}</td>
                        </tr>
                        <tr>
                            <th>Student Status</th>
                            <td>{{$student->status == 1 ? 'Active':'inactive'}}</td>
                        </tr>
                        <tr>
                            <th>Student Image</th>
                            <td><img src="{{asset($student->image)}}" alt="{{$student->name}}" height="100" width="130"></td>
                        </tr>
                        <tr>
                            <th>Student Address</th>
                            <td>{{$student->address}}</td>
                        </tr>
                        <tr>
                            <th>Student NID</th>
                            <td>{{$student->nid}}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>




    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">{{$student->name}} All Courses information</h4>
                    <p class="card-title-desc text-success text-center fw-bold">{{Session::get('message')}}</p>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Course Title</th>
                            <th>Teacher Info</th>
                            <th>Payment Status</th>
                            <th>Course Fee</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($student->enrolls as $enroll)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$enroll->course->title}}</td>

                                <td>{{$enroll->course->teacher->name.'('.$enroll->course->teacher->mobile.')'}}</td>
                                <td>{{$enroll->payment_status == 1 ? 'Complete' : 'InComplete'}}</td>
                                <td>{{$enroll->course->fee}}</td>



                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
