@extends('layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">University Courses</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class=""><a href="{{ route('university-courses.index') }}">University Courses</a></li>
                                <li class="mx-1"><a href="javascript: void(0);"> > </a></li>
                                <li class="breadcrumb-item active">University Courses List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-border-left alert-dismissible fade show auto-colse-3" role="alert">
                    <i class="ri-check-double-line me-3 align-middle fs-16"></i><strong>Success! </strong>
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-12">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Filters</h4>
                                <form action="{{ route('university-courses.index') }}" method="GET">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <button type="submit" id="apply-filter" class="btn btn-primary waves-effect waves-light w-100">
                                                <i class="bx bx-filter-alt me-1"></i>Apply
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('university-courses.index') }}" id="remove-filter" class="waves-effect waves-light btn btn-secondary w-100">
                                                <i class="bx bx-crosshair me-1"></i>Remove
                                            </a>
                                        </div>
                                    </div>

                                    {{-- <div class="mb-0">
                                        <label for="course" class="mb-0">Course Title</label>
                                        <input type="text" name="course" id="course" input-filter="course" class="input form-control" value="{{ request()->input('course') }}"><br>
                                    </div> --}}

                                    <div class="mb-0">
                                        <label for="name" class="mb-0">Course Duration</label>
                                        <div class="btn-group btn-group-example mb-3" role="group" bis_skin_checked="1">
                                            <input type="text" name="from" id="from" input-filter="from" class="input form-control number-input" value="{{ request()->input('from') }}">
                                            <span class="bg bg-primary text-light p-2">To</span>
                                            <input type="text" name="to" id="to" input-filter="to" class="input form-control number-input" value="{{ request()->input('to') }}">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label mb-0">Course </label>
                                        <select name="course" id="course" class="select2 form-control" data-placeholder="Choose ...">
                                            <option value="">Select Course</option>
                                            @foreach ($courses as $course)
                                                <option value="{{$course->id}}" @if($course->id == request()->input('course')) selected @endif>{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label mb-0">Course Level </label>
                                        <select name="level" id="level" class="select2 form-control" data-placeholder="Choose ...">
                                            <option value="">Select Course Level</option>
                                            @foreach ($levels as $level)
                                                <option value="{{$level->id}}" @if($level->id == request()->input('level')) selected @endif>{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label mb-0">Department </label>
                                        <select name="dept" id="dept" class="select2 form-control" data-placeholder="Choose ...">
                                            <option value="">Select Department</option>
                                            @foreach ($depts as $dept)
                                                <option value="{{$dept->id}}" @if($dept->id == request()->input('dept')) selected @endif>{{ $dept->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label mb-0">University </label>
                                        <select name="university" id="university" class="select2 form-control" data-placeholder="Choose ...">
                                            <option value="">Select University</option>
                                            @foreach ($universities as $uni)
                                                <option value="{{$uni->id}}" @if($uni->id == request()->input('university')) selected @endif>{{ $uni->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        @if (count($data) > 0)
                            @foreach ($data as $key => $university)
                                <div class="overflow-hidden card" bis_skin_checked="1">
                                    <div class="bg-primary-subtle" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-7" bis_skin_checked="1">

                                                <div class="d-flex p-3" bis_skin_checked="1">
                                                    {{-- <div class="flex-shrink-0 me-3" bis_skin_checked="1">
                                                        <img src="{{ asset('images/icon.png') }}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                                    </div> --}}
                                                    <div class="flex-grow-1 align-self-center" bis_skin_checked="1">
                                                        <div class="text-muted" bis_skin_checked="1">
                                                            {{-- <p class="mb-2">Welcome to Skote Dashboard</p> --}}
                                                            <h5 class="mb-1">{{ $university->name }}</h5>
                                                            <p class="mb-0">
                                                                {{-- {{ $university->city->name }} , --}}
                                                                {{-- {{ $university->state, $university->country }} --}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-0 card-body" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            {{-- ->where('course_id', request()->input('course')) --}}
                                            @foreach ($university->universityCourses as $course)
                                                <div class="col-sm-12 mb-4 mt-2" bis_skin_checked="1">
                                                    <div class="" bis_skin_checked="1">
                                                        <h3 class="mb-1">{{ $course->course->name }} ({{ $course->course->short_name }})</h3>
                                                        <div class="row" bis_skin_checked="1">
                                                            <div class="col-4" bis_skin_checked="1">
                                                                <div>
                                                                    <span class="fa fa-calendar"></span> {{ $course->course->years }} year<br>
                                                                    <span class="fa fa-clock"></span>
                                                                        @foreach(explode(',', $course->available_shifts) as $key => $shift)
                                                                            {{ getShifts('types', trim($shift)) }}
                                                                            @if($key < count(explode(',', $course->available_shifts)) - 1)
                                                                                ,
                                                                            @endif
                                                                        @endforeach
                                                                    <br>
                                                                    {{-- <span class="fa fa-map-marker"></span> Europe, London --}}
                                                                </div>
                                                                {{-- <h5 class="font-size-15">125</h5>
                                                                <p class="text-muted mb-0">Projects</p> --}}
                                                            </div>
                                                            <div class="col-4" bis_skin_checked="1">
                                                                <div>
                                                                    <span class="fa fa-building"></span> {{ $course->course->dept->name }} <br>
                                                                    <span class="fa fa-th-list"></span> {{ $course->course->level->name }} <br>
                                                                </div>
                                                                {{-- <h5 class="font-size-15">125</h5>
                                                                <p class="text-muted mb-0">Projects</p> --}}
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="mt-2 d-flex justify-content-end">
                                                                    <a class="btn btn-primary btn-md" href="#">Apply Now<i class="mdi mdi-arrow-right ms-1"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $data->links() }}
                        @else
                            <div class="overflow-hidden card p-4" bis_skin_checked="1">
                                <div class="noresult">
                                    <div class="text-center">
                                        <h4 class="mt-2 text-danger">Sorry! No Result Found</h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<style>
    .w-5 {
        width: 10px !important;
    }
    .h-5 {
        height: 10px !important;
    }
    .flex.justify-between.flex-1
    {
        display: none !important;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
