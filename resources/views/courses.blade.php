
@if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
  <link href=" {{ asset('assets/front/css/style1.rtl.css') }}" rel="stylesheet" >
  @else
  <link href=" {{ asset('assets/front/css/style1.css') }}" rel="stylesheet" >
  @endif
<x-front-layout>
    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
          <div class="container">
            <h2>{{__('Courses')}}</h2>
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

    <h2 class="widget-title text-capitalize">
        <span>{{__('Find')}} </span>{{__('Your Course.')}}
    </h2>
        
    <form action="{{ route('ca.show') }}" method="get">
        
        <div class="row justify-content-center">
            <div class="col-12 col-lg-4 form-group">
                
                <select id="category_id" name="category_id" class="selectcat form-select" >
                    <option value="">{{__('Select Category')}}</option>
                    <?php foreach ($categories as  $category) : ?>
                    <option value="<?= $category->id ?>" > <?= $category->name ?> </option>
                    <?php endforeach ?>
                </select>
        
            <input type="submit" value="{{__('Submit')}}" class="get-started-btn " style="border:0px ; margin:10px 0px 0px 120px">
            </div>
        </div>
    </form>
    
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
                    <p>{{$course->users->count()}} Students</p>
                    <div class="trainer d-flex justify-content-between align-items-center">
                    <div class="trainer-profile d-flex align-items-center">
                            <img src="{{ asset('uploads/trainers/' . $course->tranier->img)}}" class="img-fluid" alt="">
                        
                            
                            <div class="author_info_text">
                                <p style="padding-left:10px ; margin-bottom: 0px !important;">{{__('Trainer name:')}}</p>
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