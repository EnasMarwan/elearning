<x-dashboard-layout>
    <x-slot name="header">
    <a href="{{ route('lessons.create' , $id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        {{__('Add Lesson')}}
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
            <h6 class="m-0 font-weight-bold text-primary">{{ $chapter->course->name }} {{__('Course')}} \ {{$chapter->name}} {{__('Lessons')}}
                <a style="margin-left: 15px !important" href="{{ route('lessons.trash') }}"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    Trash
                 </a>
            </h6>
        </div>
    
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 30px !important;">ID</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Lesson video')}} </th>
                            <th>{{__('Lesson file')}} </th>
                            <th>{{__('Actions')}}</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        
                    @foreach ($lessons as $lesson)
                        <tr>
                            <td> {{$lesson->id }}</td>
                            <td> {{$lesson->name }}</td>
                            <td> {{$lesson->video_name }}</td>
                            <td>{{$lesson->file_name }}</td>
                            <td>
                                <a href="{{ route('lessons.destroy' , $lesson->id )}}"> 
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Warning"></i></button>
                                </a>
                                <a href="{{ route('lessons.edit' , $lesson->id )}}" class="btn btn-sm btn-primary"> 
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