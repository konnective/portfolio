
@push('custom-css')
    <style>
        /* Additional custom CSS */
        .sidebar{
            height: 100vh;
        }
        .content_wrapper{
            height: 100vh;
            overflow-y: auto;
        }
        .content_wrapper img{
            height: 500px;
        }
    </style>
@endpush
{{-- making side bar which has toppics --}}
{{-- main container will have blog type structure --}}
{{-- main container will have title --}}
{{-- take up ins[iration from github] --}}
{{--  --}}
{{--  --}}
<x-layout>
    <div class="col-12 text-center">
        <div class="row">
            <div class="col-2 bg-warning sidebar ">
                <ul class="list-unstyled mt-3">
                    <li>this</li>
                    <li>this</li>
                    <li>this</li>
                    <li>this</li>
                    <li>this</li>
                </ul>
            </div>
            <div class="col-10 bg-info content_wrapper">
                <h2 class="float-start">Title</h2>
                <div class="row">
                    <div class="col-8 bg-warning">
                        <img src="{{asset('images/home.png')}}" alt="">
                        <p>{{$note->details}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>