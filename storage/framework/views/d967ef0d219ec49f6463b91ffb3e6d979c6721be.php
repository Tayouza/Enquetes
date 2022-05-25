

<?php $__env->startSection('title', 'Tayouza Survey'); ?>

<?php $__env->startSection('content'); ?>
<h2><?php echo e($answer->title); ?></h2>

<?php $__currentLoopData = $votes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$percentVotes = $value / $totalVotes * 100;
?>

<label for=""><?php echo e($key); ?></label>

<div class="progress">
    <div class="progress-bar" role="progressbar" style="width: <?php echo e($percentVotes); ?>%" aria-valuenow="<?php echo e($percentVotes); ?>" aria-valuemin="0"
        aria-valuemax="100"></div>
</div>
<p>Votos: <?php echo e($value); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<h4 class="text-center">Total de votos da enquete: <?php echo e($totalVotes); ?></h4>

<div class="text-center mt-4">
    <a href="<?php echo e(url("/survey/{$answer->id}")); ?>" class="btn btn-warning">Votar novamente</a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\TayouzaDev\Documents\projects\tayouza-survey\resources\views/countvotes.blade.php ENDPATH**/ ?>