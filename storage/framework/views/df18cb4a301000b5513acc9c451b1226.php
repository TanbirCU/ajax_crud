<?php $__env->startSection('title'); ?>
add-student

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<section class="py-5">

    <div class="container">
        <div class="row">
            <?php if(session('success')): ?>
            <script>
                toastr.success('<?php echo e(session('success')); ?>');
            </script>
        <?php endif; ?>
            <div class="col-md-8  mx-auto">
                <div class="card shadow">
                    <div class="card-header text-center">Add Student</div>
                    <div class="card-body">
                        
                        <form action="<?php echo e(route('student_add')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row mb-3">
                                <label class="col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Mobile</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="mobile">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-outline-success"  value="Add Student">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\modal_edit\resources\views/add_student.blade.php ENDPATH**/ ?>