@push('custom-css')
    <style>
        /* Additional custom CSS */
        .card_wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px 10px;
        }

        .product-card {
            /* background-color: #ca5151; */
            -webkit-box-shadow: 2px 4px 10px 1px rgba(0, 0, 0, 0.47);
            box-shadow: 2px 4px 10px 1px rgba(201, 201, 201, 0.47);
            max-width: 300px;
            width: 1000px;
            display: flex;
            flex-direction: column;
            /* height: 360px; */
            border-radius: 10px;
            overflow: hidden;
        }

        .img-container {
            flex: 1;
        }

        img {
            width: 100%;
            object-fit: contain;
            height: 200px;
        }

        .info-container {
            display: flex;
            align-items: center;
            flex-direction: column;
            flex: 1;
            padding: 20px;
        }

        .marker_wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 2px;
        }

        .marker {
            padding: 10px;
            border-radius: 5px;
            background-color: #80edba;
        }

        .marked {
            padding: 10px;
            border-radius: 5px;
            background-color: #198754;
        }
    </style>
@endpush
<x-layout>
    
    <div class="row">
        <div class="row">
            <div class="col-12 mx-4">
                <button type="button" class="btn btn-primary float-end">
                    Add Goal
                </button>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @foreach ($projects as $item)
                <div class="product-card">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('note', $item->id) }}">
                                <div class="img-container">
                                    <img src="{{ asset('images/home.png') }}" alt="no img" />
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <div class="info-container">
                                <span class="item-title">{{ $item->name }}</span>
                                <span class="item-price">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Progress
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- code for modal here --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="marker_wrapper">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
<script>
    $(".btn-primary").on("click", function() {
        var url = "{{ route('project.data', 1) }}";
        $.ajax({
            type: "GET",
            url: url,
            beforeSend: function() {
                console.log("waiting ....")
                const loader = '<p>Loading ...</p>'
                $('.marker_wrapper').empty();
                $('.marker_wrapper').append(loader);
            },
            success: function(data) {
                console.log(data)
                $('.marker_wrapper').empty();
                $('.marker_wrapper').append(data.html);

            }
        });
    });
</script>
