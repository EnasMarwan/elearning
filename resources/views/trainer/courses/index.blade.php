<x-dashboard-layout>
    
    <x-slot name="header">
    <a href="{{ route('courses.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
           {{__('add course')}}
        </a>
    </x-slot>
    
    
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    @if (Session::has('danger'))
    <div class="alert alert-danger">
        {{ Session::get('danger') }}
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('DataTables Courses')}}
                <a style="margin-left: 15px !important" href="{{ route('courses.trash') }}"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    {{__('Trash')}}
                 </a>
            </h6>
        </div>
      
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 30px !important;">ID</th>
                            <th style="width: 80px !important;">{{__('Image')}}</th>
                            <th>{{__('Course Name')}}</th>
                        
                            <th>{{__('Category')}}</th>
                            <th style="width: 50px !important;">{{__('Chapters')}}</th>
                            <th style="width: 50px !important;">{{__('Students')}}</th>

                            
                            <th >{{__('Actions')}}</th>
                            
                            
                        
                        </tr>
                    </thead>
                
                    <tbody>
                        
                        @foreach ($courses as $course)
                        <tr>
                            <td> {{$course->id }}</td>
                            <td>
                                <img src="{{ asset('uploads/courses/'.$course->img) }}" height="50px" alt="">
                            </td>
                            <td> {{$course->name }}</td>
                        
                            <td>{{ $course->category->name }}</td>
                            <td>
                                <a href="{{ route('chapters.create' , $course->id) }}" class="btn btn-sm btn-success mb-1"><i class="fa fa-plus-circle"></i></a>
                                <a href="{{ route('chapters.index' , $course->id) }}" class="btn btn-sm mb-1 btn-warning text-white">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </td>
                            <td>
                                &nbsp; {{ $course->users->count() }} &nbsp;
                                <a href="{{ route('course.students' , $course->id) }}" class="btn btn-sm mb-1 btn-warning text-white">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </td>
                            
                            <td>
                                <a href="{{ route('courses.destroy', [$course->id]) }}"> 
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Warning"></i></button>
                                </a>
                                <a href="{{ route('courses.edit', [$course->id]) }}" class="btn btn-sm btn-primary"> 
                                    <i class="fa fa-edit"></i>
                                </a>
                            
                            </td>
                        
        
                            
                                
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>