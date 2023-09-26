<?php 

require_once 'header_inc.php';
require_once 'vendedor.php';

$vendedor = Vendedor::listarVendedores();
?>

<div class="container w-100 p-0 d-flex flex-column" style="max-width: 100%;">
    <div class="w-100">
        <img src="img/fachada.jpg" alt="" class="w-100 h-25" >      
    </div>

    <div class="w-100 p-4">
        <h1 class="text-center">Concessionária Di Giorgio</h1>
        <p class="py-3">A Di Giorgio se destaca como uma empresa que vai além da simples venda de veículos. Fundada em 1995, nossa empresa cresceu e evoluiu ao longo dos anos, tornando-se uma referência no setor não apenas pela variedade de veículos que oferecemos, mas também por nossa abordagem inovadora e compromisso com a satisfação do cliente.</p>
        <h3 class="text-center">Vendedores</h3>
        <table class="table table-bordered">
            <tr class="table-dark text-center text-center">
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            </tr>
            <?php foreach ($vendedor as $vendedor) { ?>
            <tr class="text-center">
            <td class="table-light" style="width:33.3%;"> <?= $vendedor->getNome()?> </td>
            <td class="table-light" style="width:33.3%;"> <?= $vendedor->getEmail()?> </td>
            <td class="table-light" style="width:33.3%;"> <?= $vendedor->getTelefone()?> </td>
            </tr>
            <?php  }?>
        </table>
    </div>

</div>

<?php require_once 'footer_inc.php'?>