<x-dashboard-layout>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('Create Course')}}</h6>
        </div>
        <div class="card-body">

            
        
        <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
                @include('trainer.courses.form')
            
        </form>
        </div>
    </div>
</x-dashboard-layout>