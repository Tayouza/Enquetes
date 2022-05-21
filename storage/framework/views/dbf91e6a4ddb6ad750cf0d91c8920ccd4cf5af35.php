<?php $__env->startSection('title', 'Teste Crud'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <h1 class="text-center py-1">Tayouza Surveys</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Inicio</th>
                <th>Término</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $surveys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($survey->id); ?></td>
                <td><?php echo e($survey->title); ?></td>
                <td><?php echo e($survey->created_at->format('d/m/Y H:i')); ?></td>
                <td><?php echo e($survey->end_at->format('d/m/Y H:i')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\TayouzaDev\Documents\projects\tayouza-survey\resources\views/index.blade.php ENDPATH**/ ?>