<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4"><?php echo e($todoList->title); ?></h1>

    <!-- Add Task Form -->
    <form action="<?php echo e(route('tasks.store', $todoList)); ?>" method="POST" class="mb-4">
        <?php echo csrf_field(); ?>
        <div class="input-group">
            <input type="text" name="task" class="form-control" placeholder="New Task" required>
            <button type="submit" class="btn btn-primary">Add Task</button>
        </div>
        <?php $__errorArgs = ['task'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="text-danger"><?php echo e($message); ?></small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </form>

    <!-- Display Tasks -->
    <ul class="list-group">
        <?php $__empty_1 = true; $__currentLoopData = $todoList->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><?php echo e($task->description); ?></span>
                <div>
                    <form action="<?php echo e(route('tasks.toggle', $task)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-sm <?php echo e($task->is_complete ? 'btn-success' : 'btn-secondary'); ?>">
                            <?php echo e($task->is_complete ? 'Completed' : 'Mark Complete'); ?>

                        </button>
                    </form>
                    <form action="<?php echo e(route('tasks.destroy', $task)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No tasks found for this list. Add one above!</p>
        <?php endif; ?>
    </ul>

    <!-- Back to Lists -->
    <a href="<?php echo e(route('todo-lists.index')); ?>" class="btn btn-secondary mt-3">Back to Lists</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project-app/resources/views/todo-lists/show.blade.php ENDPATH**/ ?>