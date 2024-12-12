<?php 
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php'; 

// Verifica se o formulário foi submetido via método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $plano = $_POST['plano'];

    // Prepara a consulta SQL para inserir os dados na tabela 'alunos1'
    $sql = "INSERT INTO alunos1 (nome, telefone, email, endereco, plano) VALUES (:nome, :telefone, :email, :endereco, :plano)";
    $stmt = $pdo->prepare($sql); // Prepara a consulta
    $stmt->execute([
        ":nome" => $nome,
        ":telefone" => $telefone,
        ":email" => $email,
        ":endereco" => $endereco,
        ":plano" => $plano
    ]); // Executa a consulta com os dados fornecidos pelo usuário

    // Define uma mensagem de sucesso após o cadastro
    $mensagem = "Aluno cadastrado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Torna a página responsiva -->
    <title>Cadastrar Aluno</title> <!-- Título da página -->
    <!-- Inclui o arquivo CSS do Bootstrap para estilizar a página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Personalizações de estilo */
        body {
            background-color: #f4f7f6; /* Cor de fundo suave */
            font-family: 'Arial', sans-serif; /* Fonte básica */
        }
        .container {
            max-width: 800px; /* Limita a largura do formulário */
            margin-top: 50px; /* Margem superior */
        }
        .card {
            border-radius: 15px; /* Bordas arredondadas do cartão */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para dar profundidade */
        }
        h1 {
            font-size: 2rem; /* Tamanho do título */
            font-weight: bold; /* Deixa o título em negrito */
            color: #007bff; /* Cor azul para o título */
            margin-bottom: 30px; /* Espaçamento inferior */
        }
        .btn-primary {
            background-color: #007bff; /* Cor de fundo do botão */
            border-color: #007bff; /* Cor da borda do botão */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Cor de fundo quando o botão é pressionado */
            border-color: #0056b3; /* Cor da borda quando o botão é pressionado */
        }
        .form-label {
            font-weight: bold; /* Deixa os rótulos em negrito */
        }
        .form-control {
            border-radius: 10px; /* Bordas arredondadas dos campos de entrada */
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12); /* Sombra interna suave nos campos */
        }
        .form-control:focus {
            border-color: #007bff; /* Cor da borda do campo ao receber foco */
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Efeito de foco azul */
        }
        .card-body {
            padding: 30px; /* Espaçamento interno confortável dentro do cartão */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <!-- Título da página -->
                <h1>Cadastro de Aluno</h1>

                <?php if (isset($mensagem)): ?>
                    <!-- Exibe a mensagem de sucesso (caso a variável $mensagem tenha sido definida) -->
                    <div class="alert alert-success"><?= $mensagem ?></div>
                <?php endif; ?>

                <!-- Formulário de cadastro de aluno -->
                <form method="POST">
                    <!-- Campo de nome -->
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Aluno</label>
                        <input type="text" class="form-control" id="nome" name="nome" required> <!-- Campo obrigatório -->
                    </div>

                    <!-- Campo de telefone -->
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" required> <!-- Campo obrigatório -->
                    </div>

                    <!-- Campo de e-mail -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required> <!-- Campo obrigatório -->
                    </div>

                    <!-- Campo de endereço -->
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" required> <!-- Campo obrigatório -->
                    </div>

                    <!-- Campo de plano (Diário, Mensal, Anual) -->
                    <div class="mb-3">
                        <label for="plano" class="form-label">Plano</label>
                        <select class="form-control" id="plano" name="plano" required> <!-- Campo obrigatório -->
                            <option value="Diário">Diário</option>
                            <option value="Mensal">Mensal</option>
                            <option value="Anual">Anual</option>
                        </select>
                    </div>

                    <!-- Botão para submeter o formulário -->
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>

                <!-- Link para voltar à página de listagem -->
                <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
            </div>
        </div>
    </div>

    <!-- Inclui o script JS do Bootstrap para funcionalidades interativas -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
