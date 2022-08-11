<html>
<head>
    <meta charset="utf-8">
    <title>CERTIFICAT DE NATIONALITE</title>
    <link rel="stylesheet" href="<?php echo e(public_path('/pdf/design.css')); ?>">
    <link rel="license" href="https://www.opensource.org/licenses/mit-license/">
    <style>
        body{
            background: url("<?php echo e(public_path('/pdf/bg.jpg')); ?>") no-repeat center center fixed;
        }
    </style>
</head>
<body>





<h1 style="font-family: Impact; text-decoration: underline; font-weight: bold; position: absolute; top: 20%; left: 40% ">CASIER JUDICIAIRE</h1>

<article style="position: absolute; top: 30%; font-weight: bold">

    <table class="inventory">

        <tbody>
        <tr><td><span class='filler'></span>N°<b><?php echo e($registre); ?> </b>du régistre d'ordre</td></tr>
        <tr><td><span class='filler'></span>Le Nommé <strong><?php echo e($user->fullName); ?></strong> </strong>  </td></tr>
        <tr><td><span class='filler'></span>de <strong><?php echo e($user->last_name_pere.' '.$user->first_name_pere); ?>  né(e) à <strong><?php echo e($user->lieu_naissance_pere); ?> </strong>le <strong><?php echo e($user->date_naissance_pere); ?></strong> </td></tr>
        <tr><td><span class='filler'></span>et de <strong><?php echo e($user->last_name_mere.' '.$user->first_name_mere); ?>  né(e) à <strong><?php echo e($user->lieu_naissance_mere); ?> le <strong><?php echo e($user->date_naissance_mere); ?></strong> </td></tr>
        <tr><td><span class='filler'></span>Domicilié à <strong><?php echo e($user->quartier); ?></strong>  </td></tr>
        <tr><td><span class='filler'></span>né(e) à <strong><?php echo e($user->lieu_naissance); ?></strong>  le <strong><?php echo e($user->date_naissance); ?></strong> </td></tr>
        </tbody>
    </table>

    <table class="table w-full" style="width: 680px; background-color: rgba(230,230,230,0.7)" border="1">
        <tr>
            <td>Dates des Condamnations</td>
            <td>Cours ou tribunaux</td>
            <td>Nature des crimes au délits</td>
            <td>Dates précise des crimes ou délits</td>
            <td>Nature et quantum des pieces </td>
            <td>Date de mandat de dépot </td>
            <td>Observations</td>
        </tr>
        <?php $__currentLoopData = $sentences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($s['sentence_at']); ?></td>
                <td><?php echo e($s['tribunal']); ?></td>
                <td><?php echo e($s['crime']); ?></td>
                <td><?php echo e(substr($s['crime_at'], 0, 10)); ?></td>
                <td><?php echo e($s['quantum']); ?></td>
                <td><?php echo e(substr($s['deposit_at'], 0, 10)); ?></td>
                <td><?php echo e($s['observations']); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

</article>

<div align="center" class="qr_code" style="position: absolute; top: 70%; left: 40%">
    <img src="data:image/png;base64, <?php echo base64_encode(QrCode::format('png')->size(100)->generate($document->id)); ?> " >
</div>


</body>
</html>
<?php /**PATH C:\Users\user\PhpstormProjects\minijust\resources\views/pdf/casier.blade.php ENDPATH**/ ?>