<x-dashboard-layout>
    <x-slot name="title">
        {{__('Welcome')}} {{Auth::user()->name}}!
    </x-slot>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('My Courses')}}</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5px !important;">#</th>
                            <th>{{__('Course Name')}}</th>
                            <th>{{__('Trainer Name')}}</th>
                            <th>{{__('Lessons')}}</th>                            
                                                      
                        
                        </tr>
                    </thead>
                
                    <tbody>
                        
                    @foreach ($courses as $course)
                        @if($course->pivot->status == 'approve')
                        <tr>
                        <td>{{$loop->iteration }}</td>
                            <td> {{$course->name }}</td>
                        
                            <td>{{ $course->tranier->name }}</td>
                            <td style="padding-left:30px">
                                <a href="{{ route('chapters.show', $course->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>


            {{-- {{ $courses->withQueryString()->links() }} --}}

        
        
    
        </div>
    </div>


</x-dashboard-layout>
