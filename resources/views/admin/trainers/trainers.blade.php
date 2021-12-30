<x-dashboard-layout>
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('DataTables Trainers')}}</h6>
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
                            <th># {{__('Courses')}}</th>
                            <th>{{__('Actions')}}</th>
                        
                        </tr>
                    </thead>
                
                    <tbody>
                        
                        @foreach ($trainers as $trainer)
                        <tr>
                            <td> {{$loop->iteration }}</td>
                            <td> {{$trainer->name }}</td>
                            <td> {{$trainer->spec }}</td>
                            <td> {{$trainer->email }}</td>
                            <td> {{$trainer->courses->count() }}</td>
                            <td>
                                @if($trainer->status !== 'approve')
                                    <a class="btn btn-sm btn-info" href="{{ route('trainer.approve' , $trainer->id) }}" >{{__('Approve')}}</a>
                                @endif

                                @if($trainer->status !== 'reject')
                                    <a class="btn btn-sm btn-danger" href="{{ route('trainer.reject' , $trainer->id )}}" >{{__('Reject')}}</a>
                                @endif

                                <a href="{{ route('trainer.destroy', [$trainer->id]) }}"> 
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Warning"></i></button>
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