<x-dashboard-layout>
 
    <div class="container">
     <x-slot name="header">
    <a href="#myModel" data-toggle="modal" data-target="#myModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
           {{__('Add Category')}}
        </a>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                
                
                    <div>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{__('Create Category')}}</h6>
                        </div>
                        <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="post">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-10 form-group">
                                    <label for="title" class="control-label">{{__('Name Category')}}</label>
                                    <input class="form-control" placeholder="Name" name="name" id= "name" type="text" value="{{old('name',$cat->name)}}" >
                
                                </div>
                
                                <div class="col-12 form-group text-center">
                                    <input class="btn mt-auto  btn-primary" type="submit" value="Save">
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                
                
                </div>
                
              </div>
            </div>
            
         
    </x-slot>
</div>

    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <?php if($errors->any()) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($errors->all() as $message) : ?>
                                        <li><?= $message ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endif ?>

    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" >{{__('DataTables Ctegories')}}
                
                <a style="margin-left: 15px !important" href="{{ route('categories.trash') }}"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    {{__('Trash')}}
                 </a>
            </h6>
        </div>
      
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{__('Name')}}</th>
                            <th>#{{__('Courses')}}</th>
                            <th>{{__('Start date')}}</th>
                            <th>{{__('Actions')}}</th>
                            
                        
                        </tr>
                    </thead>
                
                    <tbody>
                        
                        @foreach ($categories as $category)
                        <tr>
                            <td> {{$category->id }}</td>
                            <td> {{$category->name }}</td>
                            <td> {{$category->courses->count() }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>
                            <a href="{{ route('categories.destroy', [$category->id]) }}"> 
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Warning"></i></button>
                            </a>

                                
                                <a href="{{ route('categories.edit', [$category->id]) }}"> 
                                    <button class="btn btn-sm btn-primary"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Warning" ></i></button>
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