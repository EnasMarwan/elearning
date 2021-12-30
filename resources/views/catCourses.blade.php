<x-front-layout>
    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
          <div class="container">
            <h2>{{__('Courses')}}</h2>
            <h3>Category {{$category->name}} </h3>
            {{-- <p>{{__('Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium.')}} </p> --}}
        </div>
        </div><!-- End Breadcrumbs -->
    
        <!-- ======= Courses Section ======= -->
        <section id="courses" class="courses">
        <div class="container" data-aos="fade-up">
    
            @if (Session::has('success'))
    <div class="alert alert-success">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        {{ Session::get('success') }}
    </div>
    @endif

    @if (Session::has('warning'))
    <div class="alert alert-warning">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        {{ Session::get('warning') }}
    </div>
    @endif


            <div class="row" data-aos="zoom-in" data-aos-delay="100">
    
            @foreach($courses as $course)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" style="padding-bottom:20px">
                <div class="course-item">
                <img src="{{ asset('uploads/courses/' . $course->img)}}" class="img-fluid" alt="...">
                <div class="course-content">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>{{ $course->category->name }}</h4>
                    <p class="price">${{ $course->price }}</p>
                    </div>
    
                    <h3><a href="{{ route('course.details', $course->id)}}">{{ $course->name }}</a></h3>
                    <p>{{$course->description}}</p>
                    <div class="trainer d-flex justify-content-between align-items-center">
                    <div class="trainer-profile d-flex align-items-center">
                            <img src="{{ asset('uploads/trainers/' . $course->tranier->img)}}" class="img-fluid" alt="">
                        
                            
                            <div class="author_info_text">
                                <p style="padding-left:10px ; margin-bottom: 0px !important;">Trainer name:</p>
                                <span>{{ $course->tranier->name}}</span>
                            </div>
                        
                    </div>
                    
                    <form action="{{ route('course.add' , $course->id) }}" method="post">
                        @csrf
                        <div class="trainer-rank d-flex align-items-center">
                            <input type="submit" value="Subscribe" class="get-started-btn" style="border:0px ">
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div> <!-- End Course Item-->
            
            @endforeach
            {{ $courses->withQueryString()->links('vendor.pagination.simple-tailwind') }}
    
            </div>
    
        </div>
        </section><!-- End Courses Section -->
    
    </main><!-- End #main -->
</x-front-layout>