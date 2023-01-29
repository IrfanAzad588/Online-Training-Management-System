@extends('website.master')


@section('title')
    Training category
@endsection


@section('body')
    <div class="container">
        <div class="row bg-danger">
            <div class="col">
                <div class="card card-body text-center border-0">
                    <h3 class="">{{ isset($courses[0]->category) ? $courses[0]->category->name.'Training Course' : 'No Course Available'}}</h3>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            @foreach($courses as $course)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{asset($course->image)}}" alt="" class=""/>
                        <div class="card-body">
                            <h4><a href="{{route('training.detail' , ['id' => $course->id])}}" class="text-decoration-none text-black">{{$course->title}}</a></h4>
                            <p class="mb-0">Tk. {{$course->fee}}</p>
                            <p class="py-0">Starting Date : {{$course->starting_date}}</p>
                            <hr/>
                            <a href="{{route('training.detail' , ['id' => $course->id])}}" class="btn btn-outline-success">Read More...</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>




@endsection
