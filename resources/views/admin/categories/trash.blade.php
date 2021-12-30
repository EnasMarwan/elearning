<x-dashboard-layout>
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('Deleted Ctegories')}}</h6>
        </div>
    
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{__('Name')}}</th>
                            <th>#{{__('Courses')}}</th>
                            <th>{{__('Deleted at')}}</th>
                            <th>{{__('Actions')}}</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        
                        @foreach ($categories as $category)
                        <tr>
                            <td> {{$category->id }}</td>
                            <td> {{$category->name }}</td>
                            <td> {{$category->courses->count() }}</td>
                            <td>{{ $category->deleted_at }}</td>
                            <td>
                                <form action="{{route('categories.restore' , $category->id)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-sm btn-primary">{{__('Restore')}}</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('categories.forceDelete' , $category->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger">{{__('Delete')}}</button>
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