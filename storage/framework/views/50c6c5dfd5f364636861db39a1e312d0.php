<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Your To-Do Lists</h1>

        <!-- Form to Create New Todo List -->
        <form action="<?php echo e(route('todo-lists.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color (optional)</label>
                <input type="text" class="form-control" id="color" name="color">
            </div>

            <button type="submit" class="btn btn-primary">Create List</button>
        </form>

        <!-- Existing To-Do Lists Display -->
        <div class="todo-lists mt-4">
            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="list-item">
                    <h4><?php echo e($list->title); ?></h4>
                    <!-- Display tasks, etc. -->
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project-app/resources/views/todo-lists/index.blade.php ENDPATH**/ ?>