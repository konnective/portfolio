
@push('custom-css')
    <style>
        /* Additional custom CSS */
        .note-detail-wrapper{
            display: flex;
        }
        .sidebar{
            flex:2;
            height: 100vh;
            background-color: #162131;
            color: aliceblue;
            border-radius: 10px;
            margin: 0 0 0 20px;
            -webkit-box-shadow: 0px 3px 12px -8px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 3px 12px -8px rgba(0,0,0,0.75);
            box-shadow: 0px 3px 12px -8px rgba(0,0,0,0.75);
        }
 
        .content_wrapper{
            flex:12;
            height: 100vh;
            overflow-y: auto;
        }
        .content_wrapper img{
            height: 500px;
        }
    </style>
@endpush
{{--  --}}
{{--  --}}
<x-layout>
    <div class="col-12 text-center">
        <div class="row note-detail-wrapper">
            <div class="sidebar">
                <ul class="list-unstyled mt-3 fs-3">
                    <li>this</li>
                    <li>this</li>
                    <li>this</li>
                    <li>this</li>
                    <li>this</li>
                </ul>
            </div>
            <div class="content_wrapper border-top">
                <h2 class="float-start">{{$note->title}}</h2>
                <div class="row">
                    <div class="col-8 border-end">
                        <img src="{{asset('images/home.png')}}" alt="">
                        <p>{{$note->details}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>