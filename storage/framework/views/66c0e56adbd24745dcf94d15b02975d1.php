
<script>
$(document).ready(function(){
   $(document).on('click','.add_product',function(e){
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            // console.log(name+price);
            $.ajax({
                // url: "<?php echo e(route('create_product')); ?>",
                url: "<?php echo e(url('product-create')); ?>",
                method:'post',
                data:{name:name,price:price},
                success:function(res){
                    if(res.status=='success'){

                        $('#exampleModal').modal('hide');
                        $('#addProductForm')[0].reset();
                        // $('.table').load(location.href+' .table');
                        productShow()
                        //toaster
                        Command: toastr["success"]("Product Added successfully", "success")

                            toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                    }
                    // a();

                },error:function(err){

                    let error = err.responseJSON;
                    $.each(error.errors,function(index,value) {
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');

                    });


                }
            });
        });

});

</script>




<?php /**PATH C:\xampp\htdocs\modal_edit\resources\views/addProduct_js.blade.php ENDPATH**/ ?>