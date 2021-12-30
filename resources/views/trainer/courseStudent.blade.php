<x-dashboard-layout>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{__('DataTable Students of Course')}} {{ $course->name }}</h6>
        </div>
    
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 30px !important;">ID</th>
                            <th>{{__('Name Student')}}</th>
                            <th >{{__('Email')}}</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        
                        @foreach ($students as $student)
                        <tr>
                            <td> {{$student->id }}</td>
                            <td> {{$student->name }}</td>
                            <td>
                                {{$student->email}}
                            </td>
                        
        
                            
                                
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>