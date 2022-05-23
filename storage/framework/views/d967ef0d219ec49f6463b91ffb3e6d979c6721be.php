

<?php $__env->startSection('title', 'Tayouza Survey'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo e(dd((int)((array)json_decode($answers->answers))['Terça'])); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\TayouzaDev\Documents\projects\tayouza-survey\resources\views/countvotes.blade.php ENDPATH**/ ?>