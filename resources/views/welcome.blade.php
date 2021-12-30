<x-front-layout>
  
  @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
  <link href=" {{ asset('assets/front/css/front.rtl.css') }}" rel="stylesheet" >
  @else
  <link href=" {{ asset('assets/front/css/front.css') }}" rel="stylesheet" >
  @endif
      
  <!-- ======= Header ======= -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>{{__('Learning Today,')}}<br>{{__('Leading Tomorrow')}}</h1>
      <h2>{{__('Inventive Solution for Education')}}</h2>
      <a href="{{ route('courses.show') }}" class="btn-get-started">{{__('Get Started')}}</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src=" {{ asset('assets/front/img/about.jpg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>{{__('Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.')}}</h3>
            <p class="fst-italic">
              {{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.')}}
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    
    <section id="search-course" class="search-course-section">
      <div class="container">
          
            <div class="section-title">
              <h2>{{__('Learn new skills')}}</h2>
              <p><span>{{__('Search Courses')}}.</p>
            </div>
          
          <div class="search-course mb30 relative-position ">
              <form action="{{ route('ca.show') }}" method="get">

                  <div class="input-group search-group">
                      <input class="course" name="q" type="text" placeholder="{{__('Type what do you want to learn today?')}}">
                      <select id="category_id" name="category_id" class="select form-control" >
                        <option value="">{{__('All Categories')}}</option>
                        <?php foreach ($categories as  $category) : ?>
                        <option value="<?= $category->id ?>" > <?= $category->name ?> </option>
                        <?php endforeach ?>
                    </select>
                      <div class="nws-button position-relative text-center  gradient-bg text-capitalize">
                          <button type="submit" value="Submit">{{__('Search Course')}}</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </section>


    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">
          
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $trainers_num }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>{{__('Trainers')}}</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $students_num }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>{{__('Students')}}</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $courses_num }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>{{__('Online Available Courses')}}</p>
          </div>


          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $lessons_num }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>{{__('Lessons')}}</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{__('Courses')}}</h2>
          <p>{{__('Popular Courses')}}</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
        @foreach ($courses as $course)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src=" {{ asset('uploads/courses/' . $course->img)}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>{{ $course->category->name }}</h4>
                  <p class="price">${{ $course->price }}</p>
                </div>

                <h3><a href="{{route('course.details' , $course->id)}}">{{ $course->name }}</a></h3>
                <p>{{ $course->description }}</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="{{ asset('uploads/trainers/' . $course->tranier->img)}}" class="img-fluid" alt="">
                    <div class="author_info_text">
                      <p style="padding-left:10px ; margin-bottom: 0px !important;">{{__('Trainer name:')}}</p>
                      <span>{{ $course->tranier->name }}</span>
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

        </div>

      </div>
    </section><!-- End Popular Courses Section -->
  </main><!-- End #main -->


</x-front-layout>