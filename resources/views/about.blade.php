<x-front-layout>

    <main id="main">
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
          <h2>{{__('About Us')}}</h2>
          {{-- <p>{{__('Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium.')}} </p> --}}
        </div>
      </div><!-- End Breadcrumbs -->

         <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
            <div class="col-lg-4 d-flex align-items-stretch">
              <div class="content">
                <h3>{{__('Why Choose Mentor?')}}</h3>
                
                <p>
                  {{__('The best trainers offer the courses in a simplified manner.')}}
                 </p>
                <p>
                 {{__('Learn while you are at home at the lowest prices and at any time.')}}
                </p>
               
              </div>
            </div>
            <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-boxes d-flex flex-column justify-content-center">
                <div class="row">
                  <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box mt-4 mt-xl-0">
                      <i class="bx bx-receipt"></i>
                      <h4>{{__('Refund of subscription amount')}}</h4>
                      <p>{{__('Possibility to recover an amount from the existing in 48 hours')}}</p>
                    </div>
                  </div>
                  <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box mt-4 mt-xl-0">
                      <i class="bx bx-cube-alt"></i>
                      <h4>{{__('Trusted trainers')}}</h4>
                      <p>{{__('All of our trainers have been tested, qualified and verified')}}</p>
                    </div>
                  </div>
                  <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box mt-4 mt-xl-0">
                      <i class="bx bx-images"></i>
                      <h4>{{__('Fully recorded lessons')}}</h4>
                      <p>{{__('All lessons are recorded and you can refer to them at any time')}}</p>
                    </div>
                  </div>
                </div>
              </div><!-- End .content-->
            </div>
          </div>
  
        </div>
      </section><!-- End Why Us Section -->

      <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>{{__('Testimonials')}}</h2>
            <p>{{__('What are they saying?')}}</p>
          </div>
  
          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
  
              @foreach($messages as $message)
                @if($message->testimonals == 'Yes')
                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                      
                        <h3>{{ $message->name }}</h3>
                        
                        <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                          {{ $message->message }}
                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->
                @endif
              @endforeach
            
  
              
  
            </div>
            <div class="swiper-pagination"></div>
          </div>
  
        </div>
      </section><!-- End Testimonials Section -->
    </main>
</x-front-layout>