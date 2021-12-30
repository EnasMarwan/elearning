
<x-dashboard-layout>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> {{ $lesson->name }}</h6>
        </div>
        <div class="card-body">
            <div>
                <p style="color:#3f60c1;"> {{ $lesson->description }}</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 form-group">
                    <video width="700" height="400" controls>
                        <source src="{{asset('uploads/' . $lesson->video )}}" type="video/mp4">
                        {{__('Your browser does not support the video tag.')}}
                    </video>
                </div>
                <div class="col-12 col-lg-8 form-group">
                    @if($lesson->file)
                    <h2>{{__('Files')}}:</h2>
                    <ul>
                        <li><a href="{{ route('file.download', $lesson->id) }}">{{ $lesson->file_name}}</a></li>
                    </ul>
                    @endif
                </div>
            
            </div>

            
        </div>
    </div>


</x-dashboard-layout>
