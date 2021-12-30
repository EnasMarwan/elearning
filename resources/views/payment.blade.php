<link href=" {{ asset('assets/front/css/front.css') }}" rel="stylesheet" >
<link href="{{ asset('assets/dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    
<x-front-layout>
    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>{{__('Payment methods and transfer fees')}}</h2>
            </div>
        </div><!-- End Breadcrumbs -->
        <div class="trial-credits-payment">

            <section class="credits-payment">
                <div class="container">
                    <div class="title">
                        <h1>
                            {{__('Payment methods via')}} <b>{{__('credit cards')}}</b>
                        </h1>
                        <p>
                            {{__('Our site supports payment by bank cards using one of the following methods')}}
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="M card text-dark bg-white text-center py-3">
                                <div class=" card-body">
                                <h1 class=""><i class="fa fa-credit-card" aria-hidden="true" style="color:#5fcf80"></i></h1>
                                <h3>{{__('mada card')}} </h3>
                                </div>
                                </div>
                            </div>
                    
                            <div class="col-md-4 col-12">
                                <div class="M card text-dark bg-white  text-center py-3">
                                <div class=" card-body">
                                <h1 class="">
                                    <span class="iconify" data-icon="fa:cc-mastercard" style="color:#5fcf80"></span>
                                </h1>
                                <h3>{{__('mastercard')}}</h3>
                                </div>
                                </div>
                            </div>
                    
                            <div class="col-md-4 col-12">
                                <div class="M card text-dark bg-white text-center py-3">
                                <div class=" card-body">
                                <h1 class="">
                                    <span class="iconify" data-icon="fontisto:visa" style="color:#5fcf80"></span>
                                </h1>
                                <h3>{{__('visa card')}}</h3>
                                </div>
                                </div>
                            </div>
                    
                    
                    </div>
                    </div>
                    <div class="title">
                        <p class="credits-note">
                            {{__('If you pay with mada card or credit cards, the course will be automatically activated in your dashboard')}}</p>
                    </div>
                </div>
            </section>

            
                <div class="container">
                    <div class="title">
                        <h1>
                            {{__('Payment by')}} <b>{{__('bank transfers')}} </b>
                        </h1>
                        <p>
                            {{__('You can transfer to the bank accounts shown below')}}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="M card text-dark bg-white text-center py-3">
                                <div class=" card-body">
                                <h1 class="" style="color:#5fcf80">{{__('Our bank account number')}}</h1>
                                <h3> 578608010076257 </h3>
                                </div>
                                </div>
                            </div>
                    
                            <div class="col-md-6 col-12">
                                <div class="M card text-dark bg-white  text-center py-3">
                                <div class=" card-body">
                                <h1 class="" style="color:#5fcf80">
                                    {{__('IBAN')}}
                                </h1>
                                <h3> SA51 8000 0578 6080 1007 6257</h3>
                                </div>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            
        </div>

    </main>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>

</x-front-layout>