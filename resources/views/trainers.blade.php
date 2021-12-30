<x-front-layout>
    
  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>{{__('Trainers')}}</h2>
        {{-- <p>{{__('Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium.')}} </p> --}}
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
    <div class="container" data-aos="fade-up">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">

                @foreach($trainers as $trainer)
                @if($trainer->status == 'approve')
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        @if ($trainer->img)
                            <img src="{{ asset('uploads/trainers/' . $trainer->img)}}" class="img-fluid align-items-center " alt="" style="border-radius:50px ">  
                        @else
                            <img src="{{asset('assets/dashboard/img/undraw_profile.svg')  }}" alt="Profile" class="rounded-circle" style="max-width:120px">
                        @endif
                        
                            
                    
                    <div class="member-content">
                        <h4>{{$trainer->name}}</h4>
                        <span>{{$trainer->spec}}</span>
                        <p>
                            {{$trainer->about}}
                        </p>
                        <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                        <a href="{{$trainer->telegram}}"><i class="bi bi-telegram"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>

            
    

    </div>
    </section><!-- End Trainers Section -->

  </main><!-- End #main -->
</x-front-layout>