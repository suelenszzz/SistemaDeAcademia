<?php 
include 'conexao.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Consulta SQL para excluir o aluno com o ID fornecido
    $sql = "DELETE FROM alunos1 WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    // Mensagem de sucesso
    $mensagem = "Aluno deletado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        body {
            background-color: #f1f3f5; /* Fundo suave */
            font-family: 'Arial', sans-serif; /* Fonte básica */
        }
        .container {
            max-width: 600px; /* Largura máxima */
            margin-top: 100px; /* Margem superior para centralizar */
        }
        .alert {
            font-size: 1.1rem; /* Aumenta o tamanho da fonte das mensagens */
        }
        .btn {
            border-radius: 50px; /* Botões com bordas arredondadas */
            font-size: 1rem; /* Tamanho da fonte */
        }
        .btn-primary {
            margin-top: 20px; /* Distância do botão de voltar */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-danger">Deletar Aluno</h1>

        <?php if (isset($mensagem)): ?>
            <!-- Exibe a mensagem de sucesso quando o aluno é deletado -->
            <div class="alert alert-success text-center">
                <?= $mensagem ?>
            </div>
            <a href="read.php" class="btn btn-primary btn-block">Voltar para a lista de alunos</a>
        <?php else: ?>
            <!-- Caso não tenha deletado o aluno, mostra um aviso -->
            <div class="alert alert-warning text-center">
                Não foi possível deletar o aluno. Tente novamente mais tarde.
            </div>
            <a href="index.php" class="btn btn-secondary btn-block">Voltar</a>
        <?php endif; ?>
    </div>

    <!-- Inclui o script JS do Bootstrap para funcionalidades interativas -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
