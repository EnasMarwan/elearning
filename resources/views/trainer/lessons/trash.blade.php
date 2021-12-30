<x-dashboard-layout>
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Deleted Lessons</h6>
        </div>
    
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 30px !important;">ID</th>
                            <th>Name</th>
                            <th>Lesson video </th>
                            <th>Lesson file </th>
                            <th>Deleted at</th>
                            <th>Actions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        
                        @foreach ($lessons as $lesson)
                        <tr>
                            <td> {{$lesson->id }}</td>
                            <td> {{$lesson->name }}</td>
                            <td> {{$lesson->video_name }}</td>
                            <td>{{$lesson->file_name }}</td>
                            <td>{{ $lesson->deleted_at }}</td>
                            <td>
                                <form action="{{route('lessons.restore' , $lesson->id)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-sm btn-primary">Restore</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('lessons.forceDelete' , $lesson->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger">Delete</button>
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