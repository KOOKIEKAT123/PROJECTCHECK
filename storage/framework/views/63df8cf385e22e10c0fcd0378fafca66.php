<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Your Reminders</h1>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addReminderModal">
        Add Reminder
    </button>

    
    <?php if($reminders->isEmpty()): ?>
        <p>No reminders yet. Add one!</p>
    <?php else: ?>
        <div class="list-group">
            <?php $__currentLoopData = $reminders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reminder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="list-group-item d-flex justify-content-between align-items-center" 
                     style="background-color: <?php echo e($reminder->color ?? '#f8f9fa'); ?>">
                    <div>
                        <h5><?php echo e($reminder->title); ?></h5>
                        <p><?php echo e($reminder->description); ?></p>
                        <p class="text-muted"><?php echo e($reminder->reminder_time->format('M d, Y h:i A')); ?></p>
                    </div>
                    <div>
                        
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" 
                                data-bs-target="#editReminderModal-<?php echo e($reminder->id); ?>">
                            Edit
                        </button>

                        
                        <form action="<?php echo e(route('reminders.destroy', $reminder)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>

                        
                        <form action="<?php echo e(route('reminders.snooze', $reminder)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <input type="datetime-local" name="snooze_until" required>
                            <button class="btn btn-sm btn-secondary">Snooze</button>
                        </form>
                    </div>
                </div>

                
                <div class="modal fade" id="editReminderModal-<?php echo e($reminder->id); ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo e(route('reminders.update', $reminder)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Reminder</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" 
                                               value="<?php echo e($reminder->title); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description"><?php echo e($reminder->description); ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="reminder_time" class="form-label">Reminder Time</label>
                                        <input type="datetime-local" class="form-control" name="reminder_time" 
                                               value="<?php echo e($reminder->reminder_time->format('Y-m-d\TH:i')); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="color" class="form-label">Color</label>
                                        <input type="color" class="form-control form-control-color" name="color" 
                                               value="<?php echo e($reminder->color ?? '#f8f9fa'); ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>


<div class="modal fade" id="addReminderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo e(route('reminders.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Add Reminder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="reminder_time" class="form-label">Reminder Time</label>
                        <input type="datetime-local" class="form-control" name="reminder_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="color" class="form-control form-control-color" name="color" value="#f8f9fa">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Reminder</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project-app/resources/views/reminders/index.blade.php ENDPATH**/ ?>