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


        .content_wrapper {
            max-width: 75vw;
        }
        .item {
            background-color: #27292a;
            padding: 30px 15px;
            border-radius: 23px;
            margin-bottom: 30px;
        }

        .item img {
            border-radius: 23px;
        }

        .item h4 {
            font-size: 15px;
            margin-top: 20px;
            margin-bottom: 0px;
            display: inline-block;
        }
    </style>
@endpush
<x-layout>
    <div class="content_wrapper">
        <div class="btn-wrapper p-4">
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addFormModal">Add Goal</button>
        </div>
        <div class="card_wrapper">
            <div class="row">
                {{-- for loop here is the single div --}}
                @forelse ($projects as $user)
                    <div class="col-lg-3 col-sm-6">
                        <div class="item">
                            <img src="{{ asset('cyborg/assets/images/popular-01.jpg') }}"
                                alt="">
                            <h4></h4>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <a class="modal_btn text-center"
                                        data-url="{{ route('view-task', 1) }}">View</a>
                                </div>
                                <div class="col-6">
                                    <a class="progress_btn text-center" data-url="{{ route('task-data', 1) }}">Progress</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Nothing to show</p>
                @endforelse
            </div>
            @forelse($projects as $item)
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
                                <span class="item-title text-muted">{{ $item->name }}</span>
                                <span class="item-price">
                                    <button type="button" class="btn btn-primary pro mt-2" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-url="{{route('project.data',$item->id)}}">
                                        Progress
                                    </button>
                                    @if($item->day_count > 0 )
                                        <button  class="btn btn-warning mt-2 update"  data-url="{{route('change_progress',$item->id)}}">
                                            Update
                                        </button>
                                    @endif
                                    <button  class="btn btn-danger mt-2 pro_del" data-url="{{route('project_delete',$item->id)}}">
                                        Delete
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <h2 class="display-5 mt-3">No projects to show</h2>
                @endforelse


            {{-- code for modal here --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="marker_wrapper">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal for add form --}}
            <div class="modal fade" id="addFormModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Goal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="ajax-form" action="{{route('submit_form')}}" method="POST" data-id='addFormModal'>
                                @csrf
                                <div class="form-group">
                                    <label for="name">Goal Name:</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="date" name="end_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="days">Days:</label>
                                    <input type="number" name="days" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layout>
<script>
    $(document).ready(function() {
        $('#ajax-form').on('submit', function(e) {
            e.preventDefault();
            $(this).unbind('submit');
            let form = $(this);
            let url = form.attr('action');
            let method = form.attr('method');
            let modal = form.data('id');
            $.ajax({
                url: url,
                method: method,
                data: $(this).serialize(),
                success: function(res) {
                    if(res.success){
                        $('#'+modal).modal('hide');
                        $('#success-message').text('Form submitted successfully!').show();
                        window.location.reload();
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });


    $(".pro").on("click", function() {
        var id = $(this).data('id');
        // var url = "{{ route('project.data', " + 13 + ") }}";
        var url = $(this).data('url');
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
                $('.marker_wrapper').empty();
                $('.marker_wrapper').append(data.html);

            }
        });
    });
    $(".update").on("click", function() {
        var id = $(this).data('id');
        // var url = "{{ route('project.data', " + 13 + ") }}";
        var url = $(this).data('url');
        $.ajax({
            type: "GET",
            url: url,
            beforeSend: function() {
                console.log("waiting...");
                
            },
            success: function(data) {
                
                // notify(response.message, 'success');
            }
        });
    });
    $(".pro_del").on("click", function() {

        var url = $(this).data('url');
        $.ajax({
            type: "GET",
            url: url,
            beforeSend: function() {
                console.log("waiting ....");
                
            },
            success: function(data) {
                console.log("deleted");
                window.location.reload();
            }
        });
    });
</script>
