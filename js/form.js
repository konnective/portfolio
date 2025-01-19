$(document).ready(function() {
    $('#ajax-form').on('submit', function(e) {
        $('#ajax-form').prop('disabled', true);
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
});


// $('#myForm').on('submit', function(event) {
//     $('#mySubmitButton').prop('disabled', true);
//     // Your code here
//     // Make sure to re-enable the button after the form submission is complete
//     // For example, after an AJAX request is complete
//     $.ajax({
//       // Your AJAX options here
//       complete: function() {
//         $('#mySubmitButton').prop('disabled', false);
//       }
//     });
//   });