<div class="bg-gray-100 p-3 rounded">
    <h1 class="text-2xl font-bold">Document requis pour : <?php echo e($document->intitule); ?></h1>
    <div class="mt-4">
        <?php $__empty_1 = true; $__currentLoopData = $document->docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li><?php echo e($doc); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <span>Aucun document requis</span>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\Users\user\PhpstormProjects\minijust\resources\views/filaments/demande/information.blade.php ENDPATH**/ ?>