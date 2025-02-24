<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
