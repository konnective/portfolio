<script>
    function typeWriterEffect(text,id) {
        const speed = 50;
        let index = 0;
        $(`.typewriter`).val('');

        function type() {
            if (index < text.length) {
                $(`.textarea-reply-${id}`).val(function (i, val) {
                    return val + text.charAt(index);
                });
                index++;
                setTimeout(type, speed);
            }
        }

        type();
    }
</script>