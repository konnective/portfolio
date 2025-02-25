<script>
    $(document).ready(function() {
        $('.ajax-form').on('submit', function(e) {
            $('.ajax-form').prop('disabled', true);
            let form = $(this);
            let url = form.attr('action');
            let method = form.attr('method');
            let modal = form.data('id');
            console.log('called');
            // $.ajax({
            //     url: url,
            //     method: method,
            //     data: $(this).serialize(),
            //     success: function(res) {
            //         if (res.success) {
            //             $('#' + modal).modal('hide');
            //             window.location.reload();
            //             $('#success-message').text('Form submitted successfully!').show();
            //         }
            //     },
            //     error: function(xhr) {
            //         console.log(xhr.responseText);
            //     }
            // });
        });
    });
</script>
