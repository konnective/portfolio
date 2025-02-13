<x-cyborg>
    <style>
        .logo_main {
            font-family: "Nunito", serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-size: 25px;
            font-style: normal;
            color: #e75e8d;
        }

        li .btn_wrapepr {
            display: flex;
        }

        .modal_btn {
            padding: 10px 20px;
            color: #ec6090;
            background-color: transparent;
            border: 1px solid #ec6090;
            cursor: pointer;
            border-radius: 25px;
        }

        .modal_btn:hover {
            cursor: pointer;
            border-color: #fff;
            background-color: #fff;
            color: #ec6090;
        }

        .progress_btn {
            padding: 10px 20px;
            color: #ec6090;
            background-color: transparent;
            border: 1px solid #ec6090;
            cursor: pointer;
            border-radius: 25px;
        }

        .progress_btn:hover {
            cursor: pointer;
            border-color: #fff;
            background-color: #fff;
            color: #ec6090;
        }

        .update_btn {
            display: block;
            width: 100%;
            padding: 10px 20px;
            color: #ec6090;
            background-color: transparent;
            border: 1px solid #ec6090;
            cursor: pointer;
            border-radius: 25px;
        }

        .progress_btn:hover {
            cursor: pointer;
            border-color: #fff;
            background-color: #fff;
            color: #ec6090;
        }

        li .view_btn {

            padding: 10px 20px;
            color: #ec6090;
            background-color: transparent;
            border: 1px solid #ec6090;
            cursor: pointer;
            border-radius: 25px;
        }

        li .pro_del {

            padding: 10px 20px;
            color: #f31a1a;
            background-color: transparent;
            border: 1px solid #f31a1a;
            cursor: pointer;
            border-radius: 25px;
        }

        li .view_btn:hover {
            cursor: pointer;
            border-color: #fff;
            background-color: #fff;
            color: #ec6090;
        }

        li .pro_del:hover {
            cursor: pointer;
            border-color: #fff;
            background-color: #fff;
            color: #f31a1a;
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="most-popular">
                        <div class="btn-wrapper">
                            <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                data-bs-target="#addFormModal">Add Goal</button>
                            <button type="button" class="btn btn-primary addTaskBtn" data-bs-toggle="modal"
                                data-bs-target="#addTaskModal">Add Task</button>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading-section">
                                    <h4><em></em>Goals</h4>
                                </div>
                                <div class="row">
                                    {{-- for loop here is the single div --}}
                                    @forelse ($projects as $item)
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="item">
                                                <img src="{{ asset('cyborg/assets/images/popular-01.jpg') }}"
                                                    alt="">
                                                <h4>{{ $item->name }}<br><span>{{ $item->email }}</span></h4>
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <a class="modal_btn text-center modal_btn"
                                                            data-url="{{ route('view-task', ['id' => auth()->user()->id, 'project_id' => $item->id]) }}">View</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a class="progress_btn pro text-center" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal"
                                                            data-url="{{ route('project.data', $item->id) }}">Progress</a>
                                                    </div>
                                                    <div class="col-12">
                                                        <a class="update_btn update text-center mt-3"
                                                            data-url="{{ route('change_progress', $item->id) }}">Update</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>Nothing to show</p>
                                    @endforelse
                                    <div class="col-lg-12">
                                        {{-- <div class="main-button">
                                            <a href="browse.html">Discover Popular</a>
                                        </div> --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal place --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="marker_wrapper">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="modal fade" id="viewTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Check Tasks</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ajax-form" class="modal-form" action="{{ route('add-task') }}" method="POST"
                        data-id='addProModal'>
                        @csrf
                        <div class="row task-list p-4">

                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="modal fade" id="addFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Add Goal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ajax-form" action="{{ route('submit_form') }}" method="POST" data-id='addFormModal'>
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
    {{--  --}}
    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Add Goal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add-task') }}" method="POST" data-id='addProModal'>
                        @csrf
                        <div class="form-group">
                            <label for="name">Task Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
                        <div class="form-group">
                            <label for="date">Goal:</label>
                            <select name="project_id" class="form-control mt-2 " id="cars">
                                @foreach ($projects as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="details">Details:</label>
                            <textarea id="details" type="textarea" name="details" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 modal-submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
</x-cyborg>
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
                    if (res.success) {
                        $('#' + modal).modal('hide');
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


    $(".modal_btn").on("click", function() {

        var url = $(this).data('url');
        $.ajax({
            type: "GET",
            url: url,
            beforeSend: function() {
                console.log("waiting ....");

            },
            success: function(data) {
                $('.task-list').empty()
                if (data.tasks.length > 0) {
                    data.tasks.forEach((item) => {
                        if (item.status == 1) {
                            $('.task-list').append(`
                                <li class="list-group-item d-flex justify-content-between align-items-center mt-2 ">
                                    <label class="w-100 d-flex align-items-center">
                                        <s><input type="checkbox" class="form-check-input me-2" name="task_ids[]" value="${item.id}" ${item.status == 1 ? 'disabled':''}> ${item.name}</s>
                                    </label>
                                </li>
                            `);
                        } else {
                            $('.task-list').append(`
                                <li class="list-group-item d-flex justify-content-between align-items-center mt-2">
                                    <label class="w-100 d-flex align-items-center">
                                        <input type="checkbox" class="form-check-input me-2" name="task_ids[]" value="${item.id}"> ${item.name}
                                    </label>
                                </li>
                            `);
                        }
                    })
                }

            }
        });
        const viewModal = $('#viewTaskModal');
        viewModal.modal('show')
        // check if checkbox is not checked then 
        // adding progress buttno 
        //
    });


    $(".pro").on("click", function() {
        var id = $(this).data('id');
        // var url = "{{ route('project.data', ' + 13 + ') }}";
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
        // var url = "{{ route('project.data', ' + 13 + ') }}";
        var url = $(this).data('url');
        $.ajax({
            type: "GET",
            url: url,
            beforeSend: function() {
                console.log("waiting ....");

            },
            success: function(data) {
                if(data.success){
                    notify(data.message,'success')
                }else{
                   
                }
            },
            error: function(xhr) {
                notify(xhr.responseJSON.message, 'error');
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
