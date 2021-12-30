<x-front-layout>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
          <div class="container">
            <h2>{{__('Contact Us')}}</h2>
            <p>{{__('Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium.')}} </p>
          </div>
        </div><!-- End Breadcrumbs -->
        
    
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          <div class="container" data-aos="fade-up">
              @if (Session::has('success'))
              <div class="alert alert-success">
                  {{ Session::get('success') }}
              </div>
            @endif
          
            <div class="row mt-5">
    
              <div class="col-lg-4">
                <div class="info">
                  <div class="address">
                    <i class="bi bi-geo-alt"></i>
                    <h4>{{__('Location')}}:</h4>
                    <p>A108 Adam Street, New York, NY 535022</p>
                  </div>
    
                  <div class="email">
                    <i class="bi bi-envelope"></i>
                    <h4>{{__('Email')}}:</h4>
                    <p>info@example.com</p>
                  </div>
    
                  <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>{{__('Phone')}}:</h4>
                    <p>+1 5589 55488 55s</p>
                  </div>
    
                </div>
    
              </div>
    
              <div class="col-lg-8 mt-5 mt-lg-0">
    
                <form action="{{route('contact.store')}}" method="post" role="form"  >
                  @csrf
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " id="name" placeholder="{{__('Your Name')}}"  value="{{old('name',$message->name)}}">
                      @error('name')
                      <p class="invalid-feedback"> {{$message}}</p>  
                      @enderror 
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" id="email" placeholder="{{__('Your Email')}}" value="{{old('email',$message->email)}}" >
                      @error('email')
                      <p class="invalid-feedback"> {{$message}}</p>  
                      @enderror 
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control @error('title') is-invalid @enderror " name="title" id="title" placeholder="{{__('Subject')}}" value="{{old('title',$message->title)}}" >
                    @error('title')
                    <p class="invalid-feedback"> {{$message}}</p>  
                    @enderror 
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" rows="5" placeholder="{{__('Message')}}" value="{{old('message',$message->message)}}" ></textarea>
                    @error('message')
                    <p class="invalid-feedback"> {{$message}}</p>  
                    @enderror 
                  </div>
                  
                  <div class="text-center">
                    <button  type="submit" class="get-started-btn" style="border:0px ; margin-top:10px ">{{__('Send Message')}}</button>
                  </div>
                </form>
    
              </div>
    
            </div>
    
          </div>
          <br>
          <div data-aos="fade-up">
            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
          </div>
        </section><!-- End Contact Section -->
    
      </main><!-- End #main -->
</x-front-layout>