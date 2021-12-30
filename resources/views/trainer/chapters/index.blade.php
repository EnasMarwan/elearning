<x-dashboard-layout>

    <div class="container">
        <x-slot name="header">
       <a href="#myModel" data-toggle="modal" data-target="#myModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        {{__('Add Chapter')}}
           </a>
               <!-- Modal -->
               <div class="modal fade" id="myModal" role="dialog">
                 <div class="modal-dialog">
                 
                   <!-- Modal content-->
                <div class="modal-content">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{__('Add Chapter')}}</h6>
                    </div>
                    <div class="card-body">
            
                        
                    
                    <form action="{{ route('chapters.store' , $id) }}" method="post">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10 form-group">
                                <label for="title" class="control-label">{{__('Name')}} :</label>
                                <input class="form-control" placeholder="{{__('Name')}}" name="name" id= "name" type="text">
            
                            </div>
            
                            <div class="col-12 col-lg-10 form-group">
                                <label for="description" class="control-label">{{__('Description')}} :</label>
                                <input class="form-control" placeholder="{{__('Input short description of chapter')}}" name="description" id= "description" type="text">
            
                            </div>
            
                            <div class="col-12 form-group text-center">
                                <input class="btn mt-auto  btn-primary" type="submit" value="{{__('Save')}}">
                            </div>
                        </div>
                    </form>
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
    @if (Session::has('danger'))
    <div class="alert alert-danger">
        {{ Session::get('danger') }}
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> {{ $course->name  }} Course</h6>
        </div>
    
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 30px !important;">ID</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Description')}}</th>
                            <th style="width: 50px !important;">{{__('Lessons')}}</th>
                            <th >{{__('Actions')}}</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        
                        @foreach ($chapters as $chapter)
                        <tr>
                            <td> {{$chapter->id }}</td>
                            <td> {{$chapter->name }}</td>
                            <td> {{$chapter->description }}</td>
                            <td>
                                <a href="{{route('lessons.create' , $chapter->id )}}" class="btn btn-sm btn-success mb-1"><i class="fa fa-plus-circle"></i></a>
                                <a href="
                                    @auth('trainer')
                                    {{route('lessons.index', $chapter->id )}}
                                    @else
                                    {{route('admin.lessons', $chapter->id )}}
                                    @endauth
                                " class="btn btn-sm mb-1 btn-warning text-white">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('chapters.destroy' , $chapter->id )}}"> 
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Warning"></i></button>
                                </a>
                                <a href="{{ route('chapters.edit' , $chapter->id )}}" class="btn btn-sm btn-primary"> 
                                    <i class="fa fa-edit"></i>
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