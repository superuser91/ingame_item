<script>
     $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        let action = $(this).data('action');
        let confirmed = confirm("Bạn có chắc chắc muốn xoá?");
        if (confirmed) {
            $('#form-delete').attr('action', action);
            $('#form-delete').submit();
        }
    });
    
    function selectFileWithCKFinder(elementId) {
        CKFinder.modal({
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function(finder) {
                finder.on('files:choose', function(evt) {
                    var file = evt.data.files.first();
                    var output = document.getElementById('ckfinder-' + elementId);
                    var preview = document.getElementById('preview-' + elementId);
                    if (output) {
                        output.value = file.getUrl();
                    }
                    if (preview) {
                        preview.src = file.getUrl();
                    }
                });

                finder.on('file:choose:resizedImage', function(evt) {
                    var output = document.getElementById(elementId);
                    output.value = evt.data.resizedUrl;
                });
            }
        });
    }
</script>
