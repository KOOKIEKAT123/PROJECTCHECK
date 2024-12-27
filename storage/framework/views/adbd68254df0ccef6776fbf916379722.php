<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-4">Recent Tasks</h2>
    <?php $__empty_1 = true; $__currentLoopData = $recentTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mb-3">
            <a href="<?php echo e(route('tasks.show', $task)); ?>" class="text-blue-600 hover:underline">
                <?php echo e($task->title); ?>

            </a>
            <p class="text-sm text-gray-500"><?php echo e($task->description); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-500">No tasks yet</p>
    <?php endif; ?>
    <a href="<?php echo e(route('tasks.index')); ?>" class="text-sm text-blue-600 hover:underline">View all tasks</a>
</div>


      
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-4">Today's Habits</h2>
    <?php $__empty_1 = true; $__currentLoopData = $todaysHabits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mb-3 flex items-center justify-between">
            <span><?php echo e($habit->title); ?></span>
            <form action="<?php echo e(route('habits.log', $habit)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="text-sm bg-blue-500 text-white px-3 py-1 rounded">
                    Complete
                </button>
            </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-500">No habits scheduled for today</p>
    <?php endif; ?>
    <a href="<?php echo e(route('habits.index')); ?>" class="text-sm text-blue-600 hover:underline">Manage habits</a>
</div>

<div class="lg:col-span-3 bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Weekly Activity</h2>
            <div class="h-64">
                <canvas id="activityChart"></canvas>
            </div>
        </div>

<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-4">Upcoming Reminders</h2>
    <?php $__empty_1 = true; $__currentLoopData = $upcomingReminders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reminder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mb-3">
            <p class="font-medium"><?php echo e($reminder->title); ?></p>
            <?php if($reminder->due_at): ?>
                <p class="text-sm text-gray-500"><?php echo e(\Carbon\Carbon::parse($reminder->due_at)->format('M d, Y H:i')); ?></p>
            <?php else: ?>
                <p class="text-sm text-gray-500">No due date</p>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-500">No upcoming reminders</p>
    <?php endif; ?>
    <a href="<?php echo e(route('reminders.index')); ?>" class="text-sm text-blue-600 hover:underline">View all reminders</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Get the stats data from PHP
        const stats = <?php echo json_encode($weeklyStats, 15, 512) ?>;
        
        // Prepare data for Chart.js
        const ctx = document.getElementById('activityChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: stats.map(day => day.date),
                datasets: [{
                    label: 'Tasks Completed',
                    data: stats.map(day => day.tasks),
                    backgroundColor: '#4F46E5',
                }, {
                    label: 'Habits Completed',
                    data: stats.map(day => day.habits),
                    backgroundColor: '#10B981',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project-app/resources/views/dashboard.blade.php ENDPATH**/ ?>