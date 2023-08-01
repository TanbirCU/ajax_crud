
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($product->name); ?></td>
        <td><?php echo e($product->price); ?></td>
        <td>
            <a  class="btn btn-success upProductForm" data-id="<?php echo e($product->id); ?>" >
                <i class="las la-edit"></i>
            </a>
            <a href="" class="btn btn-danger delete_product" id="<?php echo e($product->id); ?>"><i class="las la-times"></i></a>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="4">
    <?php echo $products->links(); ?>


    </td>
</tr>

<?php /**PATH C:\xampp\htdocs\modal_edit\resources\views/productview.blade.php ENDPATH**/ ?>