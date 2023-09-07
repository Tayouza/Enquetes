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
            <h2>
                <?php if(isset($survey)): ?>
                    Alterar Enquete
                <?php else: ?>
                    Criar Enquete
                <?php endif; ?>
            </h2>
        </div>

        <div class="flex flex-column justify-content-center align-items-center">
            <?php
                $route = isset($survey) ? url("survey/$survey->id") : url("survey");
            ?>
            <form action="<?php echo e($route); ?>" method="POST" name="registerSurvey" id="registerSurvey"
                  class="d-flex flex-column align-items-center justify-content-center">
                <?php echo csrf_field(); ?>
                <div class="title mb-2">
                    <input type="text" value="<?php echo e($survey->title ?? ''); ?>" name="title" id="title"
                           class="form-control my-2" placeholder="Titulo" key="<?php echo e($survey->id ?? ''); ?>" required>
                </div>

                <div id="options">
                    <?php if(isset($survey)): ?>
                        <?php $__currentLoopData = $survey->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="answerWrapper">
                                <input type="text" name="answer[]" class="form-control my-1 inputAnswerText" value="<?php echo e($answer->name); ?>" required>
                                <input type="button" value="X" onclick="removeInput(this)" class="remove-btn">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>

                <input type="button" value="+" onclick="duplicateInput()"
                       class="btn btn-primary rounded-circle mt-3 add-btn">

                <div class="date-end">
                    <label for="finish_at">Este enquete deve terminar em: </label>
                    <input type="datetime-local" min="<?php echo e(str_replace(' ', 'T', date('Y-m-d H:i'))); ?>"
                           value="<?php echo e(isset($survey) ? str_replace(' ', 'T',$survey->finish_at) : ''); ?>" name="finish_at"
                           id="finish_at" class="form-control" required>
                </div>
                <input type="submit" value="<?php echo e(isset($survey) ? 'Alterar' : 'Criar'); ?>" class="btn btn-success my-2">
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tayouzadev/Documents/Projects/Enquetes/resources/views/create.blade.php ENDPATH**/ ?>