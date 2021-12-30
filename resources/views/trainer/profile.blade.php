<link href="{{ asset('assets/profile/css/style.css') }}" rel="stylesheet">
<x-dashboard-layout>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <x-slot name="title">
        {{__('Profile')}}
    </x-slot>



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
    
    <main id="main" class="main">

    
        <section class="section profile">
          <div class="row">
            <div class="col-xl-4">
    
              <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
    @if (Auth::user()->img)
    <img src="{{ asset('uploads/trainers/' . Auth::user()->img)}}" alt="Profile" class="rounded-circle" style="max-width:120px">
        @else
        <img src="{{asset('assets/dashboard/img/undraw_profile.svg')  }}" alt="Profile" class="rounded-circle" style="max-width:120px">
    @endif
    
                  <h2>{{Auth::user()->name}}</h2>
                  <h3>{{Auth::user()->spec}}</h3>
                   
                  <div class="social-links mt-2">
                   
                    <a href="{{ Auth::user()->telegram }}" class="linkedin"><i class="fa fa-telegram fa-lg" aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
    
            </div>
    
            <div class="col-xl-8">
    
              <div class="card">
                <div class="card-body pt-3">
                  <!-- Bordered Tabs -->
                  <ul class="nav nav-tabs nav-tabs-bordered">
    
                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">{{__('Overview')}}</button>
                    </li>
    
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">{{__('Edit Profile')}}</button>
                    </li>
    
    
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">{{__('Change Password')}}</button>
                    </li>
    
                  </ul>
                  <div class="tab-content pt-2">
    
                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                      <h5 class="card-title">{{__('About')}}</h5>
                      <p class="small fst-italic">{{Auth::user()->about}}</p>
    
                      <h5 class="card-title">{{__("Profile Details")}}</h5>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">{{__('Full Name')}}</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->name}}</div>
                      </div>
    
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">{{__('Job')}}</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->spec}}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">{{__('University')}}</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->univ}}</div>
                      </div>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">{{__('Country')}}</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->Country}}</div>
                      </div>
    
                     
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">{{__('Phone')}}</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->phone}}</div>
                      </div>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">{{__('Email')}}</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->email}}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">{{__('Telegram Link')}}</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->telegram}}</div>
                      </div>
    
                    </div>
    
                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
    
                    <!-- Profile Edit Form -->
                    <form action="{{ route('trainer.profile.update' , Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                          <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">{{__('Profile Image')}}</label>
                          <div class="col-md-8 col-lg-9">
                            <img class="profile-pic" src="{{ asset('uploads/trainers/' . Auth::user()->img) }}" alt="" />
                                <input name="img" class="file-upload" type="file" accept="image/*" />
                            
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="name" class="col-md-4 col-lg-3 col-form-label">{{__('Full Name')}}</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="name" type="text" class="form-control" id="fullName" value="{{old('name',Auth::user()->name)}}">
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="about" class="col-md-4 col-lg-3 col-form-label">{{__('About')}}</label>
                          <div class="col-md-8 col-lg-9">
                            <textarea name="about" class="form-control" id="about" style="height: 100px">{{old('about',Auth::user()->about)}}</textarea>
                          </div>
                        </div>
    
                        
    
                        <div class="row mb-3">
                          <label for="spec" class="col-md-4 col-lg-3 col-form-label">{{__('Job')}}</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="spec" type="text" class="form-control" id="Job" value="{{old('spec',Auth::user()->spec)}}">
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label for="univ" class="col-md-4 col-lg-3 col-form-label">{{__('University')}}</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="univ" type="text" class="form-control" id="Job" value="{{old('univ',Auth::user()->univ)}}">
                            </div>
                          </div>
    
                        <div class="row mb-3">
                          <label for="Country" class="col-md-4 col-lg-3 col-form-label">{{__('Country')}}</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="Country" type="text" class="form-control" id="Country" value="{{old('Country',Auth::user()->Country)}}">
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="Phone" class="col-md-4 col-lg-3 col-form-label">{{__('Phone')}}</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="phone" type="text" class="form-control" id="Phone" value="{{old('phone',Auth::user()->phone)}}">
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="Email" class="col-md-4 col-lg-3 col-form-label">{{__('Email')}}</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="Email" value="{{old('email',Auth::user()->email)}}">
                          </div>
                        </div>
    
    
                        <div class="row mb-3">
                          <label for="telegram" class="col-md-4 col-lg-3 col-form-label">{{__('Telegram Link')}}</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="telegram" type="text" class="form-control" id="Facebook" value="{{old('telegram',Auth::user()->telegram)}}">
                          </div>
                        </div>
    
    
                    <div class="text-center">
                        <button  class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                    </form>
                    <!-- End Profile Edit Form -->
    
                    </div>
    

    
                    <div class="tab-pane fade pt-3" id="profile-change-password">
                      <!-- Change Password Form -->
                      <form <form action="{{route('trainer.change.password')}}" method="post"  novalidate enctype="multipart/form-data">
                          @csrf
                        <div class="row mb-3">
                          <label for="current_password" class="col-md-4 col-lg-3 col-form-label">{{__('Current Password')}}</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="current_password" type="password" class="form-control" id="current_password">
                          </div>
                          @error('current_password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                  
                        </div>
    
                        <div class="row mb-3">
                          <label for="password" class="col-md-4 col-lg-3 col-form-label">{{__('New Password')}}</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="password" type="password" class="form-control" id="password">
                          </div>
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                    
                        </div>
    
                        <div class="row mb-3">
                          <label for="confirm_password" class="col-md-4 col-lg-3 col-form-label">{{__('Re-enter New Password')}}</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="confirm_password" type="password" class="form-control" id="confirm_password">
                          </div>
                          @error('confirm_password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                    
                    
                        </div>
    
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">{{__('Change Password')}}</button>
                        </div>
                      </form><!-- End Change Password Form -->
    
                    </div>
    
                  </div><!-- End Bordered Tabs -->
    
                </div>
              </div>
    
            </div>
          </div>
        </section>
    
      </main><!-- End #main -->


      <script src="{{ asset('assets/profile/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
      <script src="{{ asset('assets/profile/vendor/php-email-form/validate.js') }}"></script>
      <script src="{{ asset('assets/profile/vendor/quill/quill.min.js') }}"></script>
      <script src="{{ asset('assets/profile/vendor/tinymce/tinymce.min.js') }}"></script>
      <script src="{{ asset('assets/profile/vendor/simple-datatables/simple-datatables.js') }}"></script>
      <script src="{{ asset('assets/profile/vendor/chart.js/chart.min.js') }}"></script>
      <script src="{{ asset('assets/profile/vendor/apexcharts/apexcharts.min.js') }}"></script>
      <script src=" {{ asset('assets/profile/vendor/echarts/echarts.min.js') }}"></script>
      <script src=" {{ asset('assets/profile/js/main.js') }}"></script>

</x-dashboard-layout>
