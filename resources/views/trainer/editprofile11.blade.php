<link href="{{ asset('assets/profile/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/profile/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/profile/vendor/remixicon/remixicon.css') }}" rel="stylesheet">


<x-dashboard-layout>
    <x-slot name="title">
        Profil
    </x-slot>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-8">

    <form action="{{ route('trainer.profile.update' , Auth::user()->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row mb-3">
          <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
          <div class="col-md-8 col-lg-9">
            <img class="profile-pic" src="{{ asset('uploads/' . Auth::user()->img) }}" alt="" />
                <input name="img" class="file-upload" type="file" accept="image/*" />
            {{-- <div class="pt-2">
              <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
              <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
            </div> --}}
          </div>
        </div>

        <div class="row mb-3">
          <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
          <div class="col-md-8 col-lg-9">
            <input name="name" type="text" class="form-control" id="name" value="{{old('name',Auth::user()->name)}}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
          <div class="col-md-8 col-lg-9">
            <textarea name="about" class="form-control" id="about" style="height: 100px">{{old('name',Auth::user()->about)}}</textarea>
          </div>
        </div>

        

        <div class="row mb-3">
          <label for="spec" class="col-md-4 col-lg-3 col-form-label">Job</label>
          <div class="col-md-8 col-lg-9">
            <input name="spec" type="text" class="form-control"  value="{{old('name',Auth::user()->spec)}}">
          </div>
        </div>

        <div class="row mb-3">
            <label for="univ" class="col-md-4 col-lg-3 col-form-label">University</label>
            <div class="col-md-8 col-lg-9">
              <input name="univ" type="text" class="form-control" id="Job" value="{{old('name',Auth::user()->univ)}}">
            </div>
          </div>

        <div class="row mb-3">
          <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
          <div class="col-md-8 col-lg-9">
            <input name="country" type="text" class="form-control" id="Country" value="{{old('name',Auth::user()->country)}}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
          <div class="col-md-8 col-lg-9">
            <input name="phone" type="text" class="form-control" id="Phone" value="{{old('name',Auth::user()->phone)}}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
          <div class="col-md-8 col-lg-9">
            <input name="email" type="email" class="form-control" id="Email" value="{{old('name',Auth::user()->email)}}">
          </div>
        </div>


        <div class="row mb-3">
          <label for="telegram" class="col-md-4 col-lg-3 col-form-label">Telegram Link</label>
          <div class="col-md-8 col-lg-9">
            <input name="telegram" type="text" class="form-control" id="Facebook" value="{{old('name',Auth::user()->telegram)}}">
          </div>
        </div>


    <div class="text-center">
        <button  class="btn btn-primary">Save Changes</button>
    </div>
    </form>

        </div>
        </div>
    </section>


    
</x-dashboard-layout>

<script src="{{ asset('assets/profile/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/profile/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/profile/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/profile/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/profile/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/profile/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/profile/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src=" {{ asset('assets/profile/vendor/echarts/echarts.min.js') }}"></script>



