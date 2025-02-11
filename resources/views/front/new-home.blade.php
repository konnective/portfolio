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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading-section">
                                    <h4><em>Goals</em> To do Now</h4>
                                </div>
                                <div class="row">
                                    {{-- for loop here is the single div --}}
                                    @forelse ($projects as $user)
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="item">
                                                <img src="{{ asset('cyborg/assets/images/popular-01.jpg') }}"
                                                    alt="">
                                                <h4>{{ $user->name }}<br><span>{{ $user->email }}</span></h4>
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <a class="modal_btn text-center"
                                                            data-url="{{ route('view-task', $user->id) }}">View</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a class="progress_btn text-center" data-url="{{ route('task-data', $user->id) }}">Progress</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>Nothing to show</p>
                                    @endforelse
                                    <div class="col-lg-12">
                                        <div class="main-button">
                                            <a href="browse.html">Discover Popular</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                console.log("waiting ....");
                
            },
            success: function(data) {
               
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