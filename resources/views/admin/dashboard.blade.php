
<x-dashboard-layout>
    @if (Auth::user()->super_admin == 1)
    <x-slot name="header">
        <a href="{{ route('admin.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
               {{__('Add Admin')}}
            </a>
        </x-slot>
        @endif

        @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('Welcome')}} {{Auth::user()->name }} !</h6>
        </div>
        <div class="card-body">
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="card text-white bg-success text-center py-3">
            <div class="card-body">
            <h1 class="">{{ $courses_num}}</h1>
            <h3>{{__('Courses')}}</h3>
            </div>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="card text-white bg-dark text-white text-center py-3">
            <div class="card-body">
            <h1 class="">{{ $students_num}}</h1>
            <h3>{{__('Students')}}</h3>
            </div>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="card text-white bg-primary text-center py-3">
            <div class="card-body">
            <h1 class="">{{ $trainers_num}}</h1>
            <h3>{{__('Trainers')}}</h3>
            </div>
            </div>
        </div>


</div>
</div>
</div>
</x-dashboard-layout>