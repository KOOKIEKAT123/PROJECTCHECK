<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="text-center"><?php echo e($habit->title); ?></h1>
    <p class="text-muted text-center"><?php echo e($habit->description); ?></p>

    <div class="text-end mb-3">
        <form method="POST" action="<?php echo e(route('habits.logCompletion', $habit)); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-success">Log Completion</button>
        </form>
    </div>

    <h3>Logs</h3>
    <ul class="list-group">
        <?php $__empty_1 = true; $__currentLoopData = $habit->logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li class="list-group-item">Completed on <?php echo e($log->completed_at->format('M d, Y')); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <li class="list-group-item">No logs yet!</li>
        <?php endif; ?>
    </ul>

    <a href="<?php echo e(route('habits.index')); ?>" class="btn btn-secondary mt-4">Back to Habits</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project-app/resources/views/habits/show.blade.php ENDPATH**/ ?>