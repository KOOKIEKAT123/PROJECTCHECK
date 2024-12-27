<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-4">
                <?php if($todoList): ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTaskModal">
                        Add New Task
                    </button>
                <?php else: ?>
                    <div class="alert alert-warning">
                        Please create a todo list first to add tasks.
                    </div>
                <?php endif; ?>
            </div>

            <div class="card">
                <div class="card-header">Tasks</div>
                <div class="card-body">
                    <?php if($tasks->isEmpty()): ?>
                        <p>No tasks available.</p>
                    <?php else: ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Due Date</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($task->title); ?></td>
                                        <td><?php echo e($task->description); ?></td>
                                        <td><?php echo e($task->due_date ? $task->due_date->format('Y-m-d') : 'N/A'); ?></td>
                                        <td>
                                            <span class="badge bg-<?php echo e($task->priority === 'high' ? 'danger' : ($task->priority === 'medium' ? 'warning' : 'info')); ?>">
                                                <?php echo e(ucfirst($task->priority)); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-<?php echo e($task->is_completed ? 'success' : 'secondary'); ?>">
                                                <?php echo e($task->is_completed ? 'Completed' : 'Pending'); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <form method="POST" action="<?php echo e(route('tasks.toggle', $task->id)); ?>" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-sm <?php echo e($task->is_completed ? 'btn-secondary' : 'btn-success'); ?>">
                                                    <?php echo e($task->is_completed ? 'Mark Pending' : 'Mark Complete'); ?>

                                                </button>
                                            </form>
                                            
                                            <button type="button" class="btn btn-sm btn-warning" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editTaskModal<?php echo e($task->id); ?>">
                                                Edit
                                            </button>

                                            <form method="POST" action="<?php echo e(route('tasks.destroy', $task->id)); ?>" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($todoList): ?>
<div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTaskModalLabel">Create New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?php echo e(route('tasks.store', $todoList)); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date">
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-select" id="priority" name="priority" required>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Task</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="editTaskModal<?php echo e($task->id); ?>" tabindex="-1" aria-labelledby="editTaskModalLabel<?php echo e($task->id); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTaskModalLabel<?php echo e($task->id); ?>">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?php echo e(route('tasks.update', $task->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title<?php echo e($task->id); ?>" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title<?php echo e($task->id); ?>" name="title" value="<?php echo e($task->title); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description<?php echo e($task->id); ?>" class="form-label">Description</label>
                        <textarea class="form-control" id="description<?php echo e($task->id); ?>" name="description" rows="3"><?php echo e($task->description); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="due_date<?php echo e($task->id); ?>" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="due_date<?php echo e($task->id); ?>" name="due_date" value="<?php echo e($task->due_date ? $task->due_date->format('Y-m-d') : ''); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="priority<?php echo e($task->id); ?>" class="form-label">Priority</label>
                        <select class="form-select" id="priority<?php echo e($task->id); ?>" name="priority" required>
                            <option value="low" <?php echo e($task->priority === 'low' ? 'selected' : ''); ?>>Low</option>
                            <option value="medium" <?php echo e($task->priority === 'medium' ? 'selected' : ''); ?>>Medium</option>
                            <option value="high" <?php echo e($task->priority === 'high' ? 'selected' : ''); ?>>High</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Task</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project-app/resources/views/tasks/index.blade.php ENDPATH**/ ?>