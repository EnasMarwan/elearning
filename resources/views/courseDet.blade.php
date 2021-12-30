<x-front-layout>
  @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
  <link href=" {{ asset('assets/front/css/frontend.rtl.css') }}" rel="stylesheet" >

  @else
  <link href=" {{ asset('assets/front/css/frontend.css') }}" rel="stylesheet" >

  @endif
    
    @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
  <link href="{{ asset('assets/front/css/style1.rtl.css') }}" rel="stylesheet">
  @else
  <link href=" {{ asset('assets/front/css/style1.css') }}" rel="stylesheet" >
  @endif
    
  @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
  <link href="{{ asset('assets/front/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
  @else
  <link rel="stylesheet" href="https://demo.neonlms.com/assets/css/bootstrap.min.css">
  @endif
       
        <link rel="stylesheet" href="https://demo.neonlms.com/assets/css/fontawesome-all.css">


  <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
          <div class="container">
            <h2>{{__('Course Details')}}</h2>
            {{-- <p>{{__('Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium.')}} </p> --}}
          </div>
        </div><!-- End Breadcrumbs -->
    
        <!-- ======= Cource Details Section ======= -->
        <section id="course-details" class="course-details">
          <div class="container" data-aos="fade-up">
    
            <div class="row">
              <div class="col-lg-8">
                <img src="{{ asset('uploads/courses/' . $course->img)}}" style="height: 350px ; width:700px" class="img-fluid" alt="">
                <h3>{{ $course->name }}</h3>
                <p>
                {{$course->description}}</p>
              </div>
              <div class="col-lg-4">
    
                <div class="course-info d-flex justify-content-between align-items-center">
                  <h5>{{__('Trainer')}}</h5>
                  <p>{{ $course->tranier->name}}</p>
                </div>
    
                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>{{__('Category')}}</h5>
                    <p>{{$course->category->name}}</p>
                  </div>

                
    
                
    
                <div class="course-info d-flex justify-content-between align-items-center">
                  <h5>{{__('Chapters')}}</h5>
                  <p>{{$course->chapters->count()}}</p>
                </div>

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>{{__('Course Fee')}}</h5>
                    <p>${{$course->price}}</p>
                  </div>
    
              </div>
            </div>
    
          </div>
        </section><!-- End Cource Details Section -->
    
        <!-- ======= Cource Details Tabs Section ======= -->
        <section id="cource-details-tabs" class="cource-details-tabs">
          <div class="container" data-aos="fade-up">
    
            <div class="course-details-category ul-li">
                <span class="float-none">{{__('Course')}} <b>{{__('Timeline:')}}</b></span>
            </div>

            <div class="affiliate-market-guide mb65">

                <div class="affiliate-market-accordion">
                    <div id="accordion" class="panel-group">

                        @foreach($chapters as $chapter)
                                                                                                                                                                                    
                                    <div class="panel position-relative">
                                        <div class="position-absolute" style="right: 0;top:0px">
                                                    {{-- <span class="gradient-bg p-1 text-white font-weight-bold completed">Completed</span> --}}
                                                </div>
                                                                    <div class="panel-title" id="headingOne">
                                            <div class="ac-head">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                                    <span>{{$loop->iteration}}</span>
                                                    {{$chapter->name}}
                                                </button>
                                                                                                                                                            </div>
                                            </div>
                                        <div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="panel-body">{{$chapter->description}}<div>
                                            <a class="btn btn-warning mt-3" href="{{route('lessons.show' , $chapter->id ) }}">
                                            <span class=" text-white font-weight-bold ">Go To Lessons</a>
                                            </div>
                                                                                                                                                                </div>
                                        </div>
                                    </div>
                        
                        @endforeach
                                                                                                                                </div>
                </div>
            </div>
    
          </div>
        </section><!-- End Cource Details Tabs Section -->
    
      </main><!-- End #main -->

      <script src="https://demo.neonlms.com/assets/js/jquery-2.1.4.min.js"></script>
    <script src="https://demo.neonlms.com/assets/js/popper.min.js"></script>
    <script src="https://demo.neonlms.com/assets/js/bootstrap.min.js"></script>
   
  

 
</x-front-layout>