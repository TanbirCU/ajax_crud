<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="upProductForm">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="up_id" id="up_id">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                <div class="errMsgContainer">

                </div>

            <div class="row form-group mb-3">
                <label class="col-md-3">Name :</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="up_name" id="up_name">
                </div>
            </div>
            <div class="row form-group mb-3">
                <label class="col-md-3">Price :</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="up_price" id="up_price">
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary update_product">Update Product</button>
            </div>
        </div>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\modal_edit\resources\views/update_product.blade.php ENDPATH**/ ?>