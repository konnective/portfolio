$(document).ready(function() {
    var tapped = false;
    $('#ajax-form').on('submit', function(e) {
        if (tapped) return;
        tapped = true;
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
                    window.location.reload();
                    $('#success-message').text('Form submitted successfully!').show();
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
    setTimeout(function() {
        tapped = false;
      }, 500);
});
