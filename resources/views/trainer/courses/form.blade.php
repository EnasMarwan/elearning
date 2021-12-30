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
        margin-bottom: 28px;
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
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="name" class="control-label">{{__('Name')}}</label>
        <input class="form-control"  name="name" id= "name" type="text" value="{{old('name',$course->name)}}">
    </div>
    <div class="form-group col-md-4">
        <label for="category_id" class="control-label">{{__('Category')}} :</label>
        
<select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
    <option value="">{{__('Select Category')}}</option>
    
    <?php foreach ($categories as  $category) : ?>
    
    <option value="<?= $category->id ?>" @if ($category->id == old('category_id',$course->category_id)) selected @endif> <?= $category->name ?> </option>

    <?php endforeach ?>
    
</select>
 </div>
<div class="form-group col-md-4">
    <label for="title" class="control-label">{{__('Price')}}</label>
    <input class="form-control"  name="price" id= "price" type="text" value="{{old('price',$course->price)}}">
</div>
</div>

<div class="form-row">
@if(Auth::user()->super_admin)
<div class="form-group col-md-4">
<label  class="control-label">{{__('Trainer')}}:</label>
        <br>
<select id="tranier_id" name="tranier_id" class="form-control @error('tranier_id') is-invalid @enderror" >
    <option value="">select trainer</option>
    
    <?php foreach ($trainers as  $trainer) : ?>
    
    <option value="<?= $trainer->id ?>" @if ($trainer->id == old('tranier_id',$course->tranier_id)) selected @endif> <?= $trainer->name ?> </option>

    <?php endforeach ?>
    
</select><br>
</div>
@endif


<div class="form-group col-md-8">
        <label for="description" class="control-label">{{__('Description')}}</label>
        <textarea   name="description" id= "description" class="form-control @error('description') is-invalid @enderror">{{old('description',$course->description)}}</textarea>
        @error('description')
        <p class="text-danger"> {{$message}}</p>  
    @enderror
</div>
</div>
<div class="col-12">
    <div class="submit-field">
        <div class="uploadButton margin-top-30">
            <input class="uploadButton-input" type="file" name="img" id="img" accept="image/*"/>
            <label class="uploadButton-button ripple-effect" for="img">{{__('Upload Image Course')}}</label> 
        </div>
    </div>
    <img src="{{ asset('uploads/courses/'.$course->img) }}" class="my-2" height="50px" alt="" >

</div>
        
    <div class="col-12 form-group text-center">
        <input class="btn mt-auto  btn-primary" type="submit" value="{{__('Save')}}">
    </div>
