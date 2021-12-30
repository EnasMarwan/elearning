<x-dashboard-layout>
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('Deleted Courses')}}</h6>
        </div>
    
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 30px !important;">ID</th>
                            <th style="width: 80px !important;">{{__('Image')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Category')}}</th>
                            <th style="width: 50px !important;">{{__('Chapters')}}</th>
                            <th style="width: 50px !important;">{{__('Students')}}</th>
                            <th>{{__('Deleted at')}}</th>
                            <th></th>
                            <th></th>
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
                            <td>{{ $course->deleted_at }}</td>
                            <td>
                                <form action="{{route('courses.restore' , $course->id)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-sm btn-primary">{{__('Restore')}}</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('courses.forceDelete' , $course->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger">{{__('Delete')}}</button>
                                </form>
                            </td>
        
                            
                                
                        
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                

  
            </div>
        </div>
    </div>
</x-dashboard-layout>