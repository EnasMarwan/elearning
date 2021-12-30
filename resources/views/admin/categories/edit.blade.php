<x-dashboard-layout>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('Edit Category')}}</h6>
        </div>
        <div class="card-body">

            <?php if($errors->any()) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors->all() as $message) : ?>
                        <li><?= $message ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php endif ?>
        
        <form action="{{ route('categories.update' , $category->id) }}" method="post">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 form-group">
                    <label for="title" class="control-label">{{__('Name Category')}}</label>
                    <input value="{{old('name',$category->name)}}" class="form-control @error('name') is-invalid @enderror "  placeholder="Name" name="name" id= "name" type="text">
                    @error('name')
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