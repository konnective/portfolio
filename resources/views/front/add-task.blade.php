<x-cyborg>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="gaming-library">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Add</em> Task</h4>
                            </div>
                            <form action="{{ route('add-task') }}" method="POST" data-id='addProModal'>
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6 text-white mb-2">
                                        <label for="name">Task Name:</label>
                                        <input type="text" name="name" class="form-control mt-2 " required>
                                    </div>
                                    <div class="form-group col-6 text-white mb-2">
                                        <label for="name">User Name:</label>

                                        <select name="user_id" class="form-control mt-2 " id="cars">
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-group col-6 text-white mb-2">
                                        <label for="name">Product Name:</label>
                                        <input type="text" name="name" class="form-control mt-2" required>
                                    </div>
                                    <div class="form-group col-6 text-white mb-2">
                                        <label for="name">Product Name:</label>
                                        <input type="text" name="name" class="form-control mt-2" required>
                                    </div> --}}
                                </div>
                                <button type="submit" class="btn btn-info">Save</button>
                                <button   class="btn btn-warning text-bg-dark">
                                    <a href="{{route('products')}}">back</a>
                                </button>

                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-cyborg>
