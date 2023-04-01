<?php $__env->startSection('title', 'Tayouza Survey'); ?>

<?php $__env->startSection('content'); ?>
<div>
    <div class="text-center py-2">
        <h1>Tayouza Surveys</h1>
        <a href="<?php echo e(url("survey/create")); ?>" class="btn btn-success">Nova enquete</a>
    </div>
    <div class="d-flex justify-content-center align-itens-center flex-wrap">
        <?php echo csrf_field(); ?>
        <?php $__currentLoopData = $surveys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card m-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($survey->title); ?></h5>
                <p class="card-text">
                    Criado em: <?php echo e(date('d/m/Y H:i', strtotime($survey->created_at))); ?>

                    Termina em: <?php echo e(date('d/m/Y H:i', strtotime($survey->ended_at))); ?>

                </p>
                <div class="actions">
                    <a href="<?php echo e(url("survey/{$survey->id}/edit")); ?>"
                        class="btn btn-warning">Editar</a>
                    <a href="<?php echo e(url("survey/{$survey->id}")); ?>"
                        class="btn btn-primary">Votar</a>
                    <a href="<?php echo e(url("survey/{$survey->id}")); ?>"
                        class="btn btn-danger btn-delete">Deletar</a>
                    <br>
                    <div class="mt-2">
                        <a href="<?php echo e(url("countvotes/{$survey->id}")); ?>" class="viewVotes">Visualizar votos</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tayouzadev/Documents/Projects/Enquetes/resources/views/index.blade.php ENDPATH**/ ?>