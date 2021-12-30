<x-dashboard-layout>



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> {{__('Course')}} {{ $course->name }}</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5px !important;"></th>
                            <th>{{__('Chapter Name')}}</th>
                            <th style="width: 30px !important; ">{{__('Lessons')}}</th>                            
                            <th >{{__('Lessons Number')}}</th>      
                            <th></th>                      
                        
                        </tr>
                    </thead>
                
                    <tbody>
                        @if($course->pivot->status == 'approve')  
                    @foreach ($chapters as $chapter)
                        <tr>
                        <td>#</td>
                            <td> {{$chapter->name }}</td>
                        
                            
                            <td style="padding-left:30px">
                                <a href="{{ route('lessons.show', $chapter->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-arrow-circle-right"></i>
                                    {{-- <i class="fa fa-eye"></i> --}}
                                </a>
                            </td>
                        <td>{{ $chapter->lessons()->count() }}</td>
                        <td>{{ $chapter->created_at }}</td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-dashboard-layout>
