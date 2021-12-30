<x-dashboard-layout>

    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('Edit Chapter')}}</h6>
        </div>
        <div class="card-body">

        <form action="{{ route('chapters.update' , $chapter->id) }}" method="post">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 form-group">
                    <label for="title" class="control-label">{{__('Name')}} :</label>
                    <input value="{{old('name',$chapter->name)}}" class="form-control @error('name') is-invalid @enderror " placeholder="Name" name="name" id= "name" type="text">
                    @error('name')
                    <p class="invalid-feedback"> {{$message}}</p>  
                    @enderror 
                </div>

                <div class="col-12 col-lg-8 form-group">
                    <label for="description" class="control-label">{{__('Description')}} :</label>
                    <input value="{{old('description',$chapter->description)}}" class="form-control @error('description') is-invalid @enderror " placeholder="Input short description of chapter" name="description" id= "description" type="text">
                    @error('description')
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