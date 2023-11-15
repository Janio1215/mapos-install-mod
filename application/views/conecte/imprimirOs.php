<?php
$totalServico = 0;
$totalProdutos = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $this->config->item('app_name') ?></title>
    <meta name="description" content="<?php echo $this->config->item('app_name') . ' - ' . $this->config->item('app_subname') ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="invoice-content">
                    <div class="invoice-head" style="margin-bottom: 0">
                        <table class="table">
                            <tbody>
                                <?php if ($emitente == null) { ?>
                                    <tr>
                                        <td colspan="3" class="alert">
                                            Você precisa configurar os dados do emitente.
                                            >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                            <<<<
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <td style="width: 25%"><img src="<?php echo $emitente->url_logo; ?>"></td>
                                        <td>
                                            <span style="font-size: 20px;"><?php echo $emitente->nome; ?></span> <br>
                                            <span><?php echo $emitente->cnpj; ?> <br>
                                            <?php echo $emitente->rua . ', ' . $emitente->numero . ' - ' . $emitente->bairro . ' - ' . $emitente->cidade . ' - ' . $emitente->uf; ?> </span> <br>
                                            <span>E-mail: <?php echo $emitente->email . ' - Fone: ' . $emitente->telefone; ?></span>
                                        </td>
                                        <td style="width: 18%; text-align: center">
                                            #Protocolo: <span><?php echo $result->idOs ?></span> <br> <br>
                                            <span>Emissão: <?php echo date('d/m/Y') ?></span>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <table class="table" style="margin-top: 0">
                            <tbody>
                                <tr>
                                    <td style="width: 50%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span><h5>Cliente</h5></span>
                                                <span><?php echo $result->nomeCliente ?></span><br />
                                                <span><?php echo $result->rua ?>, <?php echo $result->numero ?>, <?php echo $result->bairro ?></span><br />
                                                <span><?php echo $result->cidade ?> - <?php echo $result->estado ?></span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td style="width: 50%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span><h5>Responsável</h5></span>
                                                <span><?php echo $result->nome ?></span> <br />
                                                <span>Telefone: <?php echo $result->telefone ?></span><br />
                                                <span>Email: <?php echo $result->email_usuario ?></span>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div style="margin-top: 0; padding-top: 0">
                                    <table class="table table-condensed">
                                        <tbody>
                                            <?php if ($result->dataInicial != null) { ?>
                                            <tr>
                                                <td>
                                                    <b>STATUS OS: </b>
                                                    <?php echo $result->status ?>
                                                </td>
                                                <td>
                                                    <b>DATA INICIAL: </b>
                                                    <?php echo date('d/m/Y', strtotime($result->dataInicial)); ?>
                                                </td>
                                                <td>
                                                    <b>DATA FINAL: </b>
                                                    <?php echo $result->dataFinal ? date('d/m/Y', strtotime($result->dataFinal)) : ''; ?>
                                                </td>
                                                <?php if ($result->garantia) {
                                                        ?>
                                                <td>
                                                    <b>GARANTIA: </b>
                                                    <?php echo $result->garantia . ' dias'; ?>
                                                </td>
                                                <?php
                                                    } ?>
                                                <td>
                                                    <b>
                                                        <?php if ($result->status == 'Finalizado') { ?>
                                                        VENC. DA GARANTIA:
                                                    </b>
                                                    <?php echo dateInterval($result->dataFinal, $result->garantia); ?><?php } ?>
                                            </tr>
                                            <?php } ?>
                                            <?php if ($result->descricaoProduto != null) { ?>
                                            <tr>
                                                <td colspan="">
                                                    <b>PRODUTO: </b>
                                                    <?php echo htmlspecialchars_decode($result->descricaoProduto) ?>
                                                </td>
                                                <td colspan="">
                                                    <b>MARCA: </b>
                                                    <?php echo htmlspecialchars_decode($result->marcaProdutoOs) ?>
                                                </td>
                                                <td colspan="">
                                                    <b>MODELO: </b>
                                                    <?php echo htmlspecialchars_decode($result->modeloProdutoOs) ?>
                                                </td>
                                                <td colspan="">
                                                    <b>NS: </b>
                                                    <?php echo htmlspecialchars_decode($result->nsProdutoOs) ?>
                                                </td>
                                            </tr>
                                            <?php } ?>



                                            <?php if ($result->defeito != null) { ?>
                                            <tr>
                                                <td colspan="5">
                                                    <b>DEFEITO APRESENTADO: </b>
                                                    <?php echo htmlspecialchars_decode($result->defeito) ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php if ($result->analiseBasica != null) { ?>
                                            <tr>
                                                <td colspan="5">
                                                    <b>DEFEITO CONSTATADO EM PRÉ-ANÁLISE: </b>
                                                    <?php echo htmlspecialchars_decode($result->analiseBasica) ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php if ($result->observacoes != null) { ?>
                                            <tr>
                                                <td colspan="5">
                                                    <b>OBSERVAÇÕES: </b>
                                                    <?php echo htmlspecialchars_decode($result->observacoes) ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php if ($result->laudoTecnico != null) { ?>
                                            <tr>
                                                <td colspan="5">
                                                    <b>LAUDO TÉCNICO: </b>
                                                    <?php echo htmlspecialchars_decode($result->laudoTecnico) ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>


                                    <?php if ($produtos != null) { ?>
                                    <table class="table table-bordered table-condensed" id="tblProdutos">
                                        <thead>
                                            <tr>
                                                <th>Produtos</th>
                                                <th>Marca</th>
                                                <th>Modelo</th>
                                                <th>NS</th>
                                                <th>Qt</th>
                                                <th>V. UN R$</th>
                                                <th>S.Total R$</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($produtos as $p) {
                                                    $totalProdutos = $totalProdutos + $p->subTotal;
                                                    echo '<tr>';
                                                    echo '<td>' . $p->descricao . '</td>';
                                                    echo '<td>' . $p->marcaProduto . '</td>';
                                                    echo '<td>' . $p->modeloProduto . '</td>';
                                                    echo '<td>' . $p->nsProduto . '</td>';
                                                    echo '<td>' . $p->quantidade . '</td>';
                                                    echo '<td>' . $p->preco ?: $p->precoVenda . '</td>';
                                                    echo '<td>R$ ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
                                                    echo '</tr>';
                                                } ?>
                                            <tr>
                                                <td colspan="6" style="text-align: right"><strong>Total
                                                        Produtos:</strong></td>
                                                <td><strong>R$
                                                        <?php echo number_format($totalProdutos, 2, ',', '.'); ?></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php } ?>
                                    <?php if ($servicos != null) { ?>
                                    <table class="table table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Serviços</th>
                                                <th>Descrição</th>
                                                <th>Qt</th>
                                                <th>V. UN R$</th>
                                                <th>S.Total R$</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                setlocale(LC_MONETARY, 'en_US');
                                        foreach ($servicos as $s) {
                                            $preco = $s->preco ?: $s->precoVenda;
                                            $subtotal = $preco * ($s->quantidade ?: 1);
                                            $totalServico = $totalServico + $subtotal;
                                        
                                            echo '<tr>';
                                            echo '<td>' . $s->nome . '</td>';
                                            echo '<td>' . $s->descricao . '</td>';
                                            echo '<td>' . ($s->quantidade ?: 1) . '</td>';
                                            echo '<td>' . $preco . '</td>';
                                            echo '<td>R$ ' . number_format($subtotal, 2, ',', '.') . '</td>';
                                            echo '</tr>';
                                        } ?>
                                            <tr>
                                                <td colspan="4" style="text-align: right"><strong>Total
                                                        Serviços:</strong></td>
                                                <td><strong>R$
                                                        <?php echo number_format($totalServico, 2, ',', '.'); ?></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php } ?>
                                    <?php
                            
                                     if ($totalProdutos != 0 || $totalServico != 0) {
                                        echo "<h6 style='text-align: right'>TOTAL DA OS: R$ " . number_format($totalProdutos + $totalServico, 2, ',', '.') . " " .
                                        ($result->valor_desconto != 0 ? " ---- DESCONTO: R$ " . number_format($result->valor_desconto != 0 ? $result->valor_desconto - ($totalProdutos + $totalServico) : 0.00, 2, ',', '.') . " ---- " : "") .
                                        ($result->valor_desconto != 0 ? "[ VALOR FINAL: R$ " . number_format($result->valor_desconto, 2, ',', '.') . " ] " . "</h6>" : "");
                                    }
                                    

                                    
?>
                                    <table class="table table-bordered table-condensed">
                                        <tbody>
                                            <?php if ($result->laudoTecnico != null) { ?>
                                            <tr>
                                                <td>Assinatura do Técnico
                                                    <hr>
                                                </td>
                                            
                                                <td style='text-align: right'>
                                                    <img src="<?= base_url('assets/img/carimbo/carimbo.png'); ?>"
                                                        style="max-height: 80px">
                                                </td>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                    
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>

    <script>
        window.print();
    </script>
</body>
</html>
