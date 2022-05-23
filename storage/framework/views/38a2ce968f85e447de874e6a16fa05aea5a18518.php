

<?php $__env->startSection('title', 'Tayouza Survey'); ?>

<?php $__env->startSection('content'); ?>

<div>
    <div class="text-center py-2">
        <h2><?php echo e($survey->title); ?></h2>
    </div>
    <div class="d-flex justify-content-center align-items-center flex-wrap">
        <p>Criado em: <?php echo e(date('d/m/Y H:i', strtotime($survey->created_at))); ?></p>
        <p>Termina em: <?php echo e(date('d/m/Y H:i', strtotime($survey->ended_at))); ?></p>
    </div>
    <div class="flex flex-column justify-content-center align-items-center">
        <form action="" class="d-flex flex-column align-items-center justify-content-center form-votes">
            <?php echo csrf_field(); ?>
            <table class="table-survey">
                <tbody>
                    <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <span><?php echo e($answer); ?></span>
                        </td>
                        <td>
                            <input type="radio" name="answer">
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\TayouzaDev\Documents\projects\tayouza-survey\resources\views/show.blade.php ENDPATH**/ ?>