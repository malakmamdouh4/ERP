<script>
    function confirmDelete(url,id) {
        Swal.fire({
            title: '<?php echo e(trans("common.Are you sure?")); ?>',
            text: "<?php echo e(trans('common.You wont be able to revert this!')); ?>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '<?php echo e(trans("common.Yes, delete it!")); ?>',
            cancelButtonText: '<?php echo e(trans("common.Cancel")); ?>',
            customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    method   : 'get', 
                    url      : url,
                    dataType : 'json',
                    success : function(data){
                        if(data != "false"){
                            Swal.fire({
                                icon: 'success',
                                title: '<?php echo e(trans("common.Deleted!")); ?>',
                                text: '<?php echo e(trans("common.Your file has been deleted.")); ?>',
                                customClass: {
                                confirmButton: 'btn btn-success'
                                }
                            });
                            $('#row_'+data).fadeOut();
                            $('#row_'+data).remove();
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: '<?php echo e(trans("common.NotDeleted!")); ?>',
                                text: '<?php echo e(trans("common.Your file has not been deleted.")); ?>',
                                customClass: {
                                confirmButton: 'btn btn-success'
                                }
                            });
                        }
                    }
                })
            }
        });
    }
</script><?php /**PATH F:\laravel-projects\ERP\resources\views/AdminPanel/layouts/common/deleteConfirm.blade.php ENDPATH**/ ?>