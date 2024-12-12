<?php 
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Consulta para pegar todos os alunos do banco de dados
$sql = "SELECT * FROM alunos1";
$result = $pdo->query($sql);
$alunos = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Torna a página responsiva -->
    <title>Listagem de Alunos</title> <!-- Título da página -->
    <!-- Inclui o arquivo CSS do Bootstrap para estilizar a página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Personalizações de estilo */
        body {
            background-color: #f8f9fa; /* Cor de fundo suave */
            font-family: 'Arial', sans-serif; /* Fonte básica */
        }
        .container {
            max-width: 1000px; /* Aumenta a largura da área da listagem */
            margin-top: 50px; /* Margem superior */
        }
        h1 {
            font-size: 2.5rem; /* Aumenta o tamanho do título */
            font-weight: bold; /* Deixa o título em negrito */
            color: #007bff; /* Cor azul para o título */
            margin-bottom: 30px; /* Espaçamento inferior */
        }
        .table {
            border-radius: 10px; /* Bordas arredondadas na tabela */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para dar profundidade */
            font-size: 1.1rem; /* Aumenta o tamanho da fonte da tabela */
        }
        .table th, .table td {
            text-align: center; /* Alinha o texto ao centro */
            vertical-align: middle; /* Centraliza o conteúdo verticalmente */
            padding: 15px; /* Aumenta o padding nas células da tabela */
        }
        .table th {
            background-color: #007bff; /* Cor de fundo para os cabeçalhos */
            color: white; /* Cor do texto nos cabeçalhos */
            font-size: 1.1rem; /* Aumenta o tamanho da fonte nos cabeçalhos */
        }
        .btn {
            border-radius: 50px; /* Botões com bordas arredondadas */
        }
        .btn-warning, .btn-danger {
            margin-right: 10px; /* Espaçamento entre os botões */
        }
        .alert {
            font-size: 1.1rem; /* Aumenta o tamanho da fonte da mensagem de alerta */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Alunos</h1>

        <?php if (count($alunos) == 0): ?>
            <!-- Mensagem caso não haja alunos cadastrados -->
            <div class="alert alert-warning">Nenhum aluno cadastrado no sistema.</div>
        <?php else: ?>
            <!-- Tabela de listagem de alunos -->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Endereço</th>
                        <th>Plano</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alunos as $aluno): ?>
                        <tr>
                            <td><?= htmlspecialchars($aluno['nome']) ?></td>
                            <td><?= htmlspecialchars($aluno['telefone']) ?></td>
                            <td><?= htmlspecialchars($aluno['email']) ?></td>
                            <td><?= htmlspecialchars($aluno['endereco']) ?></td>
                            <td><?= htmlspecialchars($aluno['plano']) ?></td>
                            <td>
                                <!-- Botões para editar e deletar -->
                                <a href="update.php?id=<?= $aluno['id'] ?>" class="btn btn-warning">Editar</a>
                                <a href="delete.php?id=<?= $aluno['id'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este aluno?');">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <!-- Link para voltar à página de cadastro -->
        <a href="create.php" class="btn btn-primary mt-3">Cadastrar Novo Aluno</a>
        <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
    </div>

    <!-- Inclui o script JS do Bootstrap para funcionalidades interativas -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
