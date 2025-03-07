<script>
   $(document).ready(function() {
        $('.ajax-form').on('submit', function(e) {
            console.log('object');
            e.preventDefault();
            let form = $(this);
            let url = $(this).data('url');
            let method = form.attr('method');
            let modal = form.data('id');
            $.ajax({
                url: url,
                method: method,
                data: $(this).serialize(),
                success: function(res) {
                    if (res.success) {
                        $('#' + modal).modal('hide');
                        notify(res.message,res.type)
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    notify(xhr.responseText,'danger');
                }
            });
        });
    });
</script>
