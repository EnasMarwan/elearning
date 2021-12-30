<x-dashboard-layout>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> {{ $chapter->name }}</h6>
        </div>
        <div class="card-body">
            <div>
                <p style="color:#3f60c1;"> {{ $chapter->description }}</p>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5px !important;"></th>
                            <th>{{__('Lesson Name')}}</th>
                            
                            <th >{{__('Lesson Details')}}</th>                            
                            <th></th>
                        
                        </tr>
                    </thead>
                
                    <tbody>
                    
                    @if($course->pivot->status == 'approve')    
                    @foreach ($lessons as $lesson)
                        <tr>
                        <td>#</td>
                            <td> {{$lesson->name }}</td>
                        
                            
                            <td style="padding-left:30px">
                                <a href="{{ route('lesson.show', $lesson->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td>{{ $lesson->created_at }}</td>
                        
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>  
        </div>
    </div>


</x-dashboard-layout>
