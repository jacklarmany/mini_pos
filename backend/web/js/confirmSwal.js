jQuery(document).ready(function ($) {
    // --- Delete action (bootbox) ---
    yii.confirm = function (message, okCallback, cancelCallback) {
        Swal.fire({
            title: message,
            type: 'warning',
            showCancelButton: true,
            closeOnConfirm: true,
            allowOutsideClick: true
        }).then((result) => {
            if (result.isConfirmed) {
                okCallback()
            }
        })
        return false
    };
});