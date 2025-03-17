<form class="topic-modal ajax-form" data-url="{{ route('admin.topic.store') }}" method="POST" data-id='addTopicModal'>
    @csrf
    <div class="form-group">
        <label for="name">Topic Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="details">Details:</label>
        <textarea id="details" type="textarea" name="details" class="form-control details"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-2 modal-submit">Submit</button>
</form>