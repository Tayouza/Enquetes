<?php $__env->startSection('title', 'Tayouza Survey'); ?>

<?php $__env->startSection('content'); ?>
<h2><?php echo e($survey->title); ?></h2>

<?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
if($totalVotes !== 0){
    $percentVotes = $answer->votes->count() / $maxVotes * 100;
}else{
    $percentVotes = 0;
}
?>

<label for=""><?php echo e($answer->name); ?></label>

<div class="progress">
    <div class="progress-bar" role="progressbar" style="width: <?php echo e($percentVotes); ?>%" aria-valuenow="<?php echo e($percentVotes); ?>" aria-valuemin="0"
        aria-valuemax="100"></div>
</div>
<p>Votos: <?php echo e($answer->votes->count()); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<h4 class="text-center">Total de votos da enquete: <?php echo e($totalVotes); ?></h4>

<div class="text-center mt-4">
    <a href="<?php echo e(url("survey/{$survey->id}")); ?>" class="btn btn-warning">Votar novamente</a>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("templates.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tayouzadev/Documents/Projects/Enquetes/resources/views/countvotes.blade.php ENDPATH**/ ?>