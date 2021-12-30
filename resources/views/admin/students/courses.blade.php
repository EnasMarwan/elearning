<x-dashboard-layout>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $student->name }} /{{__('show courses')}}</h6>
        </div>
      
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Status')}}</th>
                            <th>{{__('Actions')}}</th>
                        
                        </tr>
                    </thead>
                
                    <tbody>
                        
                        @foreach ($courses as $course)
                        <tr>
                            <td> {{$loop->iteration }}</td>
                            <td> {{$course->name }}</td>
                            <td> 
                                @if($course->pivot->status == 'approve')
                                {{__('Active')}}
                                @else
                                {{__('Not Active')}}
                                @endif
                            </td>
                            <td>
                                @if($course->pivot->status !== 'approve')
                                    <a class="btn btn-sm btn-info" href="{{ route('course.approve' ,[$id, $course->id]) }}" >{{__('Approve')}}</a>
                                @endif

                                @if($course->pivot->status !== 'reject')
                                    <a class="btn btn-sm btn-danger" href="{{ route('course.reject' ,[$id, $course->id] )}}" >{{__('Reject')}}</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>