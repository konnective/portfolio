<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAll = document.getElementById('selectAll');
        const postCheckboxes = document.querySelectorAll('.post-checkbox');
        const actionButtons = document.querySelectorAll('#deleteSelected, #publishSelected, #draftSelected');

        // Select All functionality
        selectAll.addEventListener('change', function() {
            postCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateActionButtons();
        });

        // Individual checkbox functionality
        postCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const allChecked = Array.from(postCheckboxes).every(cb => cb.checked);
                const anyChecked = Array.from(postCheckboxes).some(cb => cb.checked);
                selectAll.checked = allChecked;
                updateActionButtons();
            });
        });

        // Update action buttons state
        function updateActionButtons() {
            const anyChecked = Array.from(postCheckboxes).some(cb => cb.checked);
            actionButtons.forEach(button => {
                button.disabled = !anyChecked;
            });
        }

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
    });
</script>