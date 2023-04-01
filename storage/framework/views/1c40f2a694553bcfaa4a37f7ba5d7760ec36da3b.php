<?php $__env->startSection('title', 'Tayouza Survey'); ?>

<?php $__env->startSection('content'); ?>

<div>
    <?php if(isset($errors) && count($errors)>0): ?>
    <div class="text-center my-4 p-2 alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($error); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    <div class="text-center py-2">
        <h2><?php if(isset($survey)): ?>Alterar Enquete <?php else: ?> Criar Enquete <?php endif; ?></h2>
    </div>

    <div class="flex flex-column justify-content-center align-items-center">
        <?php if(isset($survey)): ?>
        <form action="<?php echo e(url("survey/{$survey->id}")); ?>" method="POST" name="registerSurvey" id="editrSurvey"
            class="d-flex flex-column align-items-center justify-content-center">
            <?php echo method_field('PUT'); ?>
        <?php else: ?>
        <form action="<?php echo e(url('survey')); ?>" method="POST" name="registerSurvey" id="registerSurvey"
            class="d-flex flex-column align-items-center justify-content-center">
        <?php endif; ?>
            <?php echo csrf_field(); ?>
            <div class="title mb-2">
                <input type="text" value="<?php echo e($survey->title ?? ''); ?>" name="title" id="title" class="form-control my-2" placeholder="Titulo" key="<?php echo e($survey->id ?? ''); ?>" required>
            </div>
            
            <div id="options"></div>

            <input type="button" value="+" onclick="duplicateInput()" class="btn btn-primary rounded-circle mt-3 add-btn">

            <div class="date-end">
                <label for="ended_at">Este enquete deve terminar em: </label>
                <input type="datetime-local" min="<?php echo e(str_replace(' ', 'T', date('Y-m-d H:i'))); ?>" value="<?php echo e(isset($survey) ? str_replace(' ', 'T',$survey->ended_at) : ''); ?>" name="ended_at" id="ended_at" class="form-control" required>
            </div>
            <input type="submit" value="<?php if(isset($survey)): ?>Alterar <?php else: ?> Criar <?php endif; ?>" class="btn btn-success my-2">
        </form>
    </div>
</div>

<script src="/js/create.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tayouzadev/Documentos/Projects/Enquetes/resources/views/create.blade.php ENDPATH**/ ?>