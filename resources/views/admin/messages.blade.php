<x-dashboard-layout>
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('DataTables Messages')}}</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Title')}}</th>
                            <th>{{__('Message')}}</th>
                            <th>{{__('Testimonials')}}</th>
                            <th>{{__('Actions')}}</th>
                        
                        </tr>
                    </thead>
                
                    <tbody>
                        
                        @foreach ($messages as $message)
                        <tr>
                            <td> {{$loop->iteration }}</td>
                            <td> {{$message->name }}</td>
                            
                            <td> {{$message->email }}</td>
                            <td> {{$message->title }}</td>
                            <td> {{$message->message }}</td>
                            <td>
                                @if($message->testimonals !== 'Yes')
                                    <a class="btn btn-sm btn-success" href="{{ route('message.approve' , $message->id) }}" >{{__('Yes')}}</a>
                                @endif

                                @if($message->testimonals !== 'No')
                                    <a class="btn btn-sm btn-danger" href="{{ route('message.reject' , $message->id )}}" >{{__('No')}}</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('message.destroy', [$message->id]) }}"> 
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