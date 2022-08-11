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





<h1 style="font-family: Impact; text-decoration: underline; font-weight: bold; position: absolute; top: 20%; left: 25% ">CERTIFICAT DE NATIONALITE IVOIRIENNE</h1>

<article>





    <table class="inventory" style="position: absolute; top: 30%; font-weight: bold">

        <tbody>
        <tr><td><span class='recus'></span>NUMERO TRANSACTION : <b><?php echo e($paiement->reference); ?> </b></td></tr>
        <tr><td><span class='recus'></span>MONTANT :  <strong> <?php echo e($type_document->montant); ?> FCFA </strong></td></tr>
        <tr><td><span class='recus'></span>TYPE DE DEMANDE : ETABLISSEMENT D'UN <?php echo e(strtoupper($type_document->intitule) ?? 'CERTIFICAT DE NATIONALITE'); ?></td></tr>
        <tr><td><span class='recus'></span>DEMANDEUR :<strong><?php echo e(ucfirst(auth()->user()->fullName)); ?></strong> </td></tr>
        <tr><td><span class='recus'></span>DATE NAISSANCE :<strong></strong> <?php echo e(auth()->user()->date_naissance); ?> </td></tr>
        <tr><td><span class='recus'></span>LIEU DE NAISSANCE :<strong><?php echo e(auth()->user()->date_naissance); ?> </strong></td></tr>
        <tr><td><span class='recus'></span>DATE DE LA DEMANDE :<strong><?php echo e(\Carbon\Carbon::make($demande->created_at)->format('d/m/y')); ?> </strong>  </td></tr>

        </tbody>
    </table>


</article>



</body>
</html>
<?php /**PATH C:\Users\user\PhpstormProjects\minijust\resources\views/pdf/certificate_recu.blade.php ENDPATH**/ ?>