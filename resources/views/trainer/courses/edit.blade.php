<x-dashboard-layout>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('Edit Course')}}</h6>
        </div>
        <div class="card-body">

            <?php if($errors->any()) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors->all() as $message) : ?>
                        <li><?= $message ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
        
        <form action="{{ route('courses.update' , $course->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            
                @include('trainer.courses.form')
        
        </form>
        </div>
    </div>
</x-dashboard-layout>