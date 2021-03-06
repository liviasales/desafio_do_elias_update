<?php
    if (isset($_POST['calcular'])) {
        $valorTotal = $_POST['valorTotal'];
        $valorPago = $_POST['valorPago'];
        $valorTroco = $valorPago - $valorTotal;
        $valorDivida = $valorTotal - $valorPago;
        $notas = array(100,50,20,10,5,2);
        $quantidade = array(0,0,0,0,0,0);
        $notas = array(100,50,20,10,5,2);
        function troco($valor) {
            $notas = array(100,50,20,10,5,2);
            $quantidade = array(0,0,0,0,0,0);       
            for($i = 0; $i < count($quantidade); $i++) {
                $quantidade[$i] = floor($valor / $notas[$i]);
                $valor -= $quantidade[$i] * $notas[$i];
            }        
            return $quantidade;
        }
        $array = troco($valorTroco);
        $mensagem = '';
        for ($i = 0; $i < 6; $i++) {
            if (!empty($array[$i])) {
                $mensagem .= $array[$i]. 'nota(s) de: '.$notas[$i].'reais'.'\\n';
            }
        }
        $mensagem = $array[0]. 'nota(s) de: '.$notas[0].'reais, '
                    .$array[1]. 'nota(s) de: '.$notas[1].'reais, '
                    .$array[2]. 'nota(s) de: '.$notas[2].'reais, '
                    .$array[3]. 'nota(s) de: '.$notas[3].'reais, '
                    .$array[4]. 'nota(s) de: '.$notas[4].'reais, '
                    .$array[5]. 'nota(s) de: '.$notas[5].'reais.';        
        if ((isset($valorPago)) && (isset($valorTotal)) && (!empty($valorPago)) &&  (!empty($valorTotal)) && ($valorPago > $valorTotal)) {
            echo "<script>alert('Seu troco é de: R$$valorTroco,00');</script><br>";
            echo "<script>alert('$mensagem');</script><br>";
        } elseif ($valorPago < $valorTotal) {
            echo "<script>alert('Você ficou devendo o mercado: R$$valorDivida,00');</script><br>";                        
        } else {
            echo "<script>alert('Você não possui troco!!');</script>";
        }
    }       
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio do Elias</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>
    <div class="container">
            <div class="tittle">
                <h3>Desafio do troco</h3>
                <small>By: Elias</small>
            </div>
        <form method="POST" action="#">                        
            <div class="form-group">
                <label for="exampleInputEmail1"><b>Valor total dos produtos:</b></label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                </div>
                <input type="text" id="valorTotal" name="valorTotal" autocomplete="off" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Insira o valor total da sua compra." required="required">
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
                <input type="text" id="valorPago" name="valorPago" autocomplete="off" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Insira o valor pago por você." required="required">
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
                </div>
            </div>
            <input type="submit" name="calcular" value="Calcular troco" class="btn btn-success btn-lg btn-block">
        </form>
    </div>
</body>
</html>
