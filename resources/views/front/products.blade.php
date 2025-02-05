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
        li .btn_wrapepr{
            display: flex;
        }
        .modal_btn{
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
        li .view_btn{
           
            padding: 10px 20px;
            color: #ec6090;
            background-color: transparent;
            border: 1px solid #ec6090;
            cursor: pointer;
            border-radius: 25px;
        }
        li .pro_del{
            
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
    </style>


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="" class="logo">
                            <span class="logo_main">Second-Brain</span>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Search End ***** -->
                        <div class="search-input">
                            <form id="search" action="#">
                                <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword"
                                    onkeypress="handle" />
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                        <!-- ***** Search End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href=""class="active">Home</a></li>
                            <li><a href="">Browse</a></li>
                            <li><a href="">Details</a></li>
                            <li><a href="">Streams</a></li>
                            <li><a href="">Profile <img
                                        src="{{ asset('cyborg/assets/images/profile-header.jpg') }}" alt=""></a>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">

                    <!-- ***** Banner Start ***** -->
                    <div class="main-banner">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="header-text">
                                    <h6>Welcome To Second-Brain</h6>
                                    <h4><em>Browse</em> Our Popular Products Here</h4>
                                    <div class="main-button">
                                        <a type="button" class="" data-bs-toggle="modal"
                                            data-bs-target="#addProModal">Add New</a>
                                        <a type="button" class="" href="{{route('add-task')}}">Add Task</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Banner End ***** -->

                    <!-- ***** Most Popular Start ***** -->

                    <!-- ***** Most Popular End ***** -->
                    <div class="most-popular">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="heading-section">
                              <h4><em>Most Popular</em> Right Now</h4>
                            </div>
                            <div class="row">
                                {{-- for loop here is the single div --}}
                                @forelse ( $users as $user)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <img src="{{ asset('cyborg/assets/images/popular-01.jpg') }}" alt="">
                                            <h4>{{$user->name}}<br><span>{{$user->email}}</span></h4>
                                            <div class="row mt-3">
                                                <div class="col-6">
                                                    <a class="modal_btn text-center" data-url="{{route('view-task',$user->id)}}">View</a>
                                                </div>
                                                <div class="col-6">
                                                    <a class="progress_btn text-center" >Progress</a>
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

                    <!-- ***** Gaming Library Start ***** -->
                    <div class="gaming-library">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Your Product</em> Library</h4>
                            </div>

                            @forelse ($products as $item)
                                <div class="item">
                                    <ul>
                                        <li><img src="{{ asset('cyborg/assets/images/game-02.jpg') }}" alt=""
                                                class="templatemo-item"></li>
                                        <li>
                                            <h4>{{ $item->name }}</h4><span>Sandbox</span>
                                        </li>
                                        <li>
                                            <h4>Date Added</h4><span>{{ $item->created_at }}</span>
                                        </li>
                                        <li>
                                            <h4>{{ $item->price }}</h4><span>{{ $item->subject }}</span>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-6">
                                                    <a class="view_btn"  href="{{route('product_detail', $item->id)}}" >View</a>
                                                </div>
                                                <div class="col-6">
                                                    <a class="pro_del"  data-url="{{ route('delete_product', $item->id) }}">Delete</a>
                                                </div>
                                                
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            @empty
                                <p>No Products to Show</p>
                            @endforelse

                        </div>

                    </div>
                    <!-- ***** Gaming Library End ***** -->
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>
        </div>
    </footer>
    <!-- modal code here -->
    <div class="modal fade" id="addProModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Goal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ajax-form" action="{{ route('add-task') }}" method="POST" data-id='addProModal'>
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Category:</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="details">Details:</label>
                            <textarea id="details" type="textarea" name="details" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 modal-submit" >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal for task view --}}
    <div class="modal fade" id="viewTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Check Tasks</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ajax-form" class="modal-form" action="{{ route('add_product') }}" method="POST" data-id='addProModal'>
                        @csrf
                        <div class="row task-list p-4">

                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- new modal for progress --}}
    {{-- {{asset('vasperr/assets/css/main.css')}} --}}
</x-cyborg>
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#details'))
        .catch(error => {
            console.error(error);
        });
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
    $(".modal_btn").on("click", function() {


        //check the x-cyborg component as not delivering navbar

        // click pr ajax call
        // person s task modal in mshow
        // how many checked will submit in form

        // web route , controler method , modal will edit task status
        //add task page create
        // task controller new mthod to load view 
        // copy product-detail
        // add formcomplete
        //dynamic value from ajax call
        //


        var url = $(this).data('url');
        $.ajax({
            type: "GET",
            url: url,
            beforeSend: function() {
                console.log("waiting ....");

            },
            success: function(data) {
                
                data.users.tasks.forEach((item)=>{
                    $('.task-list').append(`
                        <li class="list-group-item d-flex justify-content-between align-items-center mt-2">
                            <label class="w-100 d-flex align-items-center">
                                <input type="checkbox" class="form-check-input me-2"> ${item.name}
                            </label>
                        </li>
                    `);
                })
                
            }
        });
        const viewModal  = $('#viewTaskModal');
        viewModal.modal('show')
    });

    $(".modal-submit").on("click", function() {
        

    })
</script>
