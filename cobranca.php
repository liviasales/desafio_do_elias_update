<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio do Elias</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<?php
    $valorTotal = $_POST['valorTotal'];
    $valorPago = $_POST['valorPago'];
    $valorTroco = $valorPago - $valorTotal;
    $valorDivida = $valorTotal - $valorPago;
    $notas = [100,50,20,10,5,2];
    $troco = [0,0,0,0,0,0];
    function troco($valor) {       
        for($i = 0; $i < count($troco); $i++) {
            $troco[$i] = floor($valor / $notas[$i]);
            $valor -= $troco[$i] * $notas[$i];
        }
        return $troco;
    }
    $trocoCont = $troco[$valorTroco];
    if (($valorPago > $valorTotal) &&  (!empty($valorPago)) &&  (!empty($valorTotal))) {
        echo "<script>alert('Seu troco é de: R$$valorTroco,00');</script><br>";
        echo "<script>alert('A quantidade de notas é de: $trocoCont');</script><br>";
    } elseif ($valorPago < $valorTotal) {
        echo "<script>alert('Você ficou devendo o mercado: R$$valorDivida,00');</script><br>";                        
    } else {
        echo "<script>alert('Você não possui troco!!');</script>";
    }   
?>
<body>
    <div class="container">
            <div class="tittle">
                <h3>Desafio do troco</h3>
                <small>By: Elias</small>
            </div>
        <form method="POST" action="">                        
            <div class="form-group">
                <label for="exampleInputEmail1"><b>Valor total dos produtos:</b></label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                </div>
                <input type="text" autocomplete="off" name="valorTotal" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Insira o valor total da sua compra." required="required">
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"><b>Valor pago:</b></label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                </div>
                <input type="text" autocomplete="off" name="valorPago" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Insira o valor pago por você." required="required">
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
                </div>
            </div>
            <input type="submit" value="Calcular troco" class="btn btn-success btn-lg btn-block">
        </form>
    </div>
</body>
</html>