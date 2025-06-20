 <script>
    function previewImages(inputElement) {
      // Get the target container's ID from the data attribute.
      const previewTargetId = inputElement.getAttribute('data-preview-target');
      const previewContainer = document.getElementById(previewTargetId);
      
      // Clear any previous preview images.
      previewContainer.innerHTML = '';
      
      // Check if files are selected.
      if (inputElement.files && inputElement.files.length > 0) {
        // Convert the FileList to an array and process each file.
        Array.from(inputElement.files).forEach((file) => {
          // Only process image files.
          if (!file.type.startsWith('image/')) {
            console.warn('Skipped non-image file:', file.name);
            return;
          }
          
          // Create a FileReader to read the image.
          const reader = new FileReader();
          
          // When the file is read, create an img element and add it to the preview.
          reader.addEventListener("load", function(event) {
            const img = document.createElement("img");
            img.src = event.target.result;
            previewContainer.appendChild(img);
          });
          // Read the image as a Data URL.
          reader.readAsDataURL(file);
        });
      }
    }
    
    // Attach the change event listener to all file inputs on the page.
    document.querySelectorAll('input[type="file"]').forEach((inputElement) => {
      inputElement.addEventListener('change', function() {
        previewImages(this);
      });
    });
</script>