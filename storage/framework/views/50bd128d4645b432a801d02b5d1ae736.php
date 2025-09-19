<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Dwello')); ?> - Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Poppins', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'Noto Sans', 'sans-serif'],
                    },
                    colors: {
                        'dwello-brown': '#36211A',
                        'dwello-beige': '#FDF8F5',
                        'dwello-light-beige': '#EADCD2',
                        'dwello-tan': '#EADED4',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased bg-dwello-beige">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <!-- Logo -->
        <div class="flex items-center mb-8">
            <img src="<?php echo e(asset('logo.png')); ?>" alt="Dwello Logo" class="h-12 w-auto">
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-dwello-brown">Welcome Back</h2>
                <p class="text-gray-600 mt-2">Sign in to your account</p>
            </div>

            <?php if($errors->any()): ?>
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul class="list-disc list-inside">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-dwello-brown mb-2">Email</label>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           value="<?php echo e(old('email')); ?>" 
                           required 
                           autofocus 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-dwello-brown focus:border-transparent">
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-dwello-brown mb-2">Password</label>
                    <input id="password" 
                           type="password" 
                           name="password" 
                           required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-dwello-brown focus:border-transparent">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-6">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" 
                               type="checkbox" 
                               name="remember" 
                               class="rounded border-gray-300 text-dwello-brown shadow-sm focus:border-dwello-brown focus:ring focus:ring-dwello-brown focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end">
                    <button type="submit" 
                            class="w-full bg-dwello-brown text-white py-2 px-4 rounded-lg hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-dwello-brown focus:ring-offset-2 transition duration-300">
                        Log in
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Don't have an account? 
                    <a href="<?php echo e(route('register')); ?>" class="text-dwello-brown hover:text-gray-900 font-medium">
                        Sign up
                    </a>
                </p>
            </div>
        </div>

        <!-- Demo Credentials -->
        <div class="mt-8 p-4 bg-dwello-tan rounded-lg max-w-md">
            <h3 class="text-lg font-bold text-dwello-brown mb-2">Demo Credentials</h3>
            <div class="text-sm text-dwello-brown space-y-1">
                <p><strong>Admin:</strong> admin@dwello.com / password</p>
                <p><strong>User:</strong> user@dwello.com / password</p>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\estate\resources\views/auth/login.blade.php ENDPATH**/ ?>