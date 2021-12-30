<x-dashboard-layout>
    <div class="card shadow mb-4">
        
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('Add Admin')}}</h6>
        </div>
        
        <div class="card-body">
        <form action="{{ route('admin.store') }}" method="post" >
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="control-label" for="name">{{__('Name')}}:</label>
                    <input class="form-control @error('name') is-invalid @enderror "  name="name" id= "name" type="text">
                    @error('name')
                    <p class="invalid-feedback"> {{$message}}</p>  
                    @enderror 

                </div>

                <div class="form-group col-md-4">
                    <label class="control-label" for="email">{{__('Email')}}:</label>
                    <input class="form-control @error('email') is-invalid @enderror "  name="email" id= "email" type="email">
                    @error('email')
                    <p class="invalid-feedback"> {{$message}}</p>  
                    @enderror 
                </div>

                <div class="form-group col-md-4">
                    <label class="control-label" for="password">{{__('Password')}}</label>
                    <input class="form-control @error('password') is-invalid @enderror "  name="password" id= "password" type="password">
                    @error('password')
                    <p class="invalid-feedback"> {{$message}}</p>  
                    @enderror 
                </div>

                <div class="col-12 form-group text-center">
                    <input class="btn mt-auto  btn-primary" type="submit" value="{{__('Save')}}">
                </div>
            </div>
        </form>
        </div>
    </div>
</x-dashboard-layout>