<x-dashboard-layout>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('DataTables Students')}}</h6>
        </div>
      
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Specialty')}}</th>
                            <th>{{__('Email')}}</th>
                            <th></th>
                        
                        </tr>
                    </thead>
                
                    <tbody>
                        
                        @foreach ($students as $student)
                        <tr>
                            <td> {{$student->id }}</td>
                            <td> {{$student->name }}</td>
                            <td> {{$student->spec }}</td>
                            <td> {{$student->email }}</td>
                            <td>
                                <button class="btn "><a href="{{ route('courses.St' , $student->id)}}" class="btn btn-success ">{{__('show courses')}}</a></button>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>