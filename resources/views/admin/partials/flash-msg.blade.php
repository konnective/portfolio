@if(session('message'))
<script>
    $(document).ready(function() {
        Toastify({
            text: "{{ session('message') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "center",
            backgroundColor: "#4fbe87",
        }).showToast();
    });
</script>
@elseif(session('error')) 
<script>
    $(document).ready(function() {
        Toastify({
            text: "{{ session('error') }}",
            duration: 5000,
            close: true,
            gravity: "top",
            position: "center",
            backgroundColor: "#be534f",
        }).showToast();
    });
</script>
@endif

