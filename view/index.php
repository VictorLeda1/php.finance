<?php require_once("../controller/ControllerListar.php");?>

<?php 
    require_once("../controller/ControllerValores.php");
    $valores = new valoresController;

    function inteiro_decimal_rs($numero) {
        $numero = number_format($numero, 2, ',', '.');
        echo $numero;
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>php.finance$</title>

        <link rel="stylesheet" href="./style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <h2 class="logo">php<span>.</span>finance<span>$</span></h2>
        </header>

        <main class="container">
            <section id="balance">
                <h2 class="sr-only">Balanço</h2>

                <div class="card">
                    <h3>
                        <span>Entradas</span>
                        <img src="./assets/income.svg" alt="Image de entradas">
                    </h3>
                    <p>R$ <?php $exibiEntrada = $valores->pegaPositivo(); 
                                inteiro_decimal_rs($exibiEntrada);
                        ?>
                    </p>
                </div>

                <div class="card">
                    <h3>
                        <span>Saídas</span>
                        <img src="./assets/expense.svg" alt="Image de saídas">
                    </h3>
                    <p>R$ <?php $exibiSaida = $valores->pegaNegativo(); 
                                inteiro_decimal_rs($exibiSaida) 
                        ?></p>
                </div>

                <div class="card total">
                    <h3>
                        <span>Total</span>
                        <img src="./assets/total.svg" alt="Image de total">
                    </h3>
                    <p>R$ <?php $exibiTotal = $valores->pegaTotal(); 
                                inteiro_decimal_rs($exibiTotal);
                        ?></p>
                </div>
            </section>

            <section>
                <h2 class="sr-only">Transações</h2>

                <a href="#" 
                onclick="Modal.open()"
                class="button new">+ Nova Transação</a>
                
                <table id="data-table">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php new listarController();  ?>
                    </tbody>
                </table>
            </section>
        </main>

        <div class="modal-overlay">
            <div class="modal">
                <div>
                    <h2>Nova Transação</h2>
                    <form action="../controller/ControllerCadastro.php" method="POST">
                        <div class="input-group">
                            <label 
                                class="sr-only" 
                                for="description">Descrição</label>
                            <input 
                                type="text" 
                                id="description" 
                                name="descricao"
                                placeholder="Descrição"
                            />
                        </div>

                        <div class="input-group">
                            <label 
                                class="sr-only" 
                                for="amount">Valor</label>
                            <input 
                                type="number"
                                step="0.01"
                                id="amount" 
                                name="valor"
                                placeholder="0,00"
                            />
                            <small class="help">Use o sinal - (negativo) para despesas e , (vírgula) para casas decimais</small>
                        </div>

                        <div class="input-group">
                            <label 
                                class="sr-only" 
                                for="date">Data</label>
                            <input 
                                type="date" 
                                id="date" 
                                name="data"
                            />
                        </div>

                        <div class="input-group actions">
                            <a 
                            onclick="Modal.close()"
                            href="#" 
                            class="button cancel">Cancelar</a>
                            <button type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <footer><p>php.finance$</p></footer>

        <script src="./scripts.js"></script>
    </body>
</html>
