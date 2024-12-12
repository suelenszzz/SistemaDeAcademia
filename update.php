<?php 
include 'conexao.php';

// Verifica se o ID do aluno foi passado via GET
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Consulta o banco de dados para recuperar os dados do aluno
    $sql = "SELECT * FROM alunos1 WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o aluno foi encontrado
    if(!$aluno){
        echo "Aluno não encontrado";
        exit;
    }
}

// Atualiza os dados do aluno no banco de dados quando o formulário é enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $plano = $_POST['plano'];

    // Atualiza os dados na tabela 'alunos1'
    $sql = "UPDATE alunos1 SET nome = :nome, telefone = :telefone, email = :email, endereco = :endereco, plano = :plano WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":nome" => $nome,
        ":telefone" => $telefone,
        ":email" => $email,
        ":endereco" => $endereco,
        ":plano" => $plano,
        ":id" => $id
    ]);

    // Mensagem de sucesso
    $mensagem = "Aluno atualizado com sucesso";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6; /* Cor de fundo suave */
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #007bff; /* Azul para o título */
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
        .alert {
            font-size: 1.1rem;
            font-weight: bold;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 10px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .card-body {
            padding: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Editar Aluno</h1>

                <?php if (isset($mensagem)): ?>
                    <!-- Mensagem de sucesso após atualização -->
                    <div class="alert alert-success"><?= $mensagem ?></div>
                <?php endif; ?>

                <!-- Formulário de edição -->
                <form method="POST">
                    <!-- Campo para o nome do aluno -->
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Aluno</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= $aluno['nome'] ?>" required>
                    </div>

                    <!-- Campo para o telefone do aluno -->
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $aluno['telefone'] ?>" required>
                    </div>

                    <!-- Campo para o e-mail do aluno -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $aluno['email'] ?>" required>
                    </div>

                    <!-- Campo para o endereço do aluno -->
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $aluno['endereco'] ?>" required>
                    </div>

                    <!-- Campo para selecionar o plano do aluno -->
                    <div class="mb-3">
                        <label for="plano" class="form-label">Plano</label>
                        <select class="form-control" id="plano" name="plano" required>
                            <option value="Diário" <?= $aluno['plano'] == 'Diário' ? 'selected' : '' ?>>Diário</option>
                            <option value="Mensal" <?= $aluno['plano'] == 'Mensal' ? 'selected' : '' ?>>Mensal</option>
                            <option value="Anual" <?= $aluno['plano'] == 'Anual' ? 'selected' : '' ?>>Anual</option>
                        </select>
                    </div>

                    <!-- Botão para atualizar as informações do aluno -->
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>

                <!-- Link para voltar para a lista de alunos -->
                <a href="read.php" class="btn btn-secondary mt-3">Voltar</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
