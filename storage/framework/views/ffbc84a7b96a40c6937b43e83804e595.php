<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/register.css')); ?>">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>
                    <h2>Signup</h2>

                    <!-- Name Input -->
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" required>
                        <label for="name">Name</label>
                    </div>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: red;"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <!-- Email Input -->
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" required>
                        <label for="email">Email</label>
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: red;"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <!-- Password Input -->
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" id="password" required>
                        <label for="password">Password</label>
                        <ion-icon name="eye-off-outline" id="toggle-password" class="toggle-password"></ion-icon>
                        <small class="password-info">Password must be at least 8 characters long.</small>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: red;"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <!-- Confirm Password Input -->
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password_confirmation" id="confirm-password" required>
                        <label for="password_confirmation">Confirm Password</label>
                        <ion-icon name="eye-off-outline" id="toggle-confirm-password" class="toggle-password"></ion-icon>
                        <small id="confirm-password-info" class="password-info"></small>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit">Sign up</button>

                    <!-- Redirect to Login -->
                    <div class="register">
                        <p>Already have an account? <a href="<?php echo e(route('login')); ?>">Login</a> here!</p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Ionicons for Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Link to External JS -->
    <script src="<?php echo e(asset('js/register.js')); ?>"></script>
</body>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project-app/resources/views/auth/register.blade.php ENDPATH**/ ?>