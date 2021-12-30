<style>
    .uploadButton {
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-start;
      margin-bottom: 10px;
      width: 100%;
      font-style: normal;
      font-size: 14px;
    }
    
    .uploadButton .uploadButton-input {
      opacity: 0;
      position: absolute;
      overflow: hidden;
      z-index: -1;
      pointer-events: none;
    }
    
    .uploadButton .uploadButton-button {
        display: flex;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        height: 44px;
        padding: 10px 18px;
        cursor: pointer;
        border-radius: 4px;
        color: #fff;
        background-color: #34db4fd1 ;
        border: 1px solid #34db4fd1;
        flex-direction: row;
        transition: 0.3s;
        margin: 0;
        outline: none;
        box-shadow: 0 3px 10px rgba(102,103,107,0.1);
    }
    
    .uploadButton .uploadButton-button:hover {
        background-color: #05835d;
        box-shadow: 0 4px 12px rgba(66, 173, 123, 0.15);
        color: #fff;
    }
    
    .submit-field {
        display: block;
    }
    
    .submit-field .pac-container {
        box-shadow: none;
        border: 1px solid #e0e0e0;
        border-top: 1px solid #fff;
        padding-top: 0;
        z-index: 9;
        left: 0 !important;
        top: 47px !important;
        border-radius: 0 0 4px 4px;
    }
    
    .submit-field h5 {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin-bottom: 12px;
    }
    
    .submit-field h5 span {
        color: #888;
        font-weight: 500;
    }
    
    
        </style>
<x-dashboard-layout>

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
            <h6 class="m-0 font-weight-bold text-primary">{{__('Edit Lesson')}}</h6>
        </div>
        <div class="card-body">

        <form action="{{ route('lessons.update' , $lesson->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="col">
                    <label for="title" class="control-label">{{__('Name Lesson')}} :</label>
                    <input value="{{old('name',$lesson->name)}}" class="form-control @error('name') is-invalid @enderror " placeholder="Name" name="name" id= "name" type="text">
                    @error('name')
                    <p class="invalid-feedback"> {{$message}}</p>  
                    @enderror 
                </div>

                <div class="col-12 col-lg-8 form-group">
                    <label for="description" class="control-label">{{__('Description')}} :</label>
                    <input value="{{old('description',$lesson->description)}}" class="form-control @error('description') is-invalid @enderror " placeholder="Input short description of Lesson" name="description" id= "description" type="text">
                    @error('description')
                    <p class="invalid-feedback"> {{$message}}</p>  
                    @enderror 
                </div>

                <div class="col-12">
                    <div class="submit-field">
                <div class="uploadButton margin-top-30">
					<input class="uploadButton-input" type="file" name="file" accept="application/pdf" id="file" multiple/>
					<label class="uploadButton-button ripple-effect" for="file">{{__('Upload File')}}</label>
                    @error('file')
                    <p class="invalid-feedback"> {{$message}}</p>  
                    @enderror 
                </div>
                </div>
                @if( !$lesson->file == null)
                <div class="col-12 col-lg-8 form-group">
                    <ul>
                        <li><a href="{{ asset('uploads/' . $lesson->file) }}">{{ $lesson->file_name}}</a></li>
                    </ul>
                </div>
                @endif
				</div>


                <div class="col-12 ">
                    <div class="submit-field">
                <div class="uploadButton margin-top-30">
					<input class="uploadButton-input" type="file" name="video" id="video" multiple/>
					<label class="uploadButton-button ripple-effect" for="video">{{__('Upload video')}}</label>
                    @error('video')
                    <p class="invalid-feedback"> {{$message}}</p>  
                    @enderror 
                </div>
                </div>
                <div class="col-12 col-lg-8 form-group"> {{$lesson->video_name}} </div>
				</div>
                

                <div class="col-12 form-group text-center">
                    <input class="btn mt-auto  btn-primary" type="submit" value="{{__('Save')}}">
                </div>
            </div>
        
        </form>
        </div>
    </div>
</x-dashboard-layout>