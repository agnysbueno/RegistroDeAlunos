<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Verifica se o POST não está vazio
if (!empty($_POST)) {
    // Se não estiver vazio, insere um novo registro
    // Configura as variáveis ​​que vão ser inseridas, verifica se as variáveis ​existem, senão deixa em branco
    $ra = isset($_POST['ra']) && !empty($_POST['ra']) && $_POST['ra'] != 'auto' ? $_POST['ra'] : NULL;
    // Verifica se a variável "nome" existe, se não, deixa o valor em branco, e assim para todas as outras variáveis
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
    $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    // Insere um novo registro na tabela de alunos
    $stmt = $pdo->prepare('INSERT INTO alunos VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$ra, $nome, $endereco, $complemento, $numero, $bairro, $cidade, $estado, $telefone]);
    // Mensagem de sucesso
    $msg = 'Novo aluno registrado com sucesso!';
}
?>

<?=template_header('Create')?>

<div class="content update">
	<h2>Registrar Aluno</h2>
    <form action="create.php" method="post">
        <label for="ra">RA</label>
        <label for="nome">Nome</label>
        
        <input type="text" name="ra" placeholder="2091301913001" id="ra">
        <input type="text" name="nome" placeholder="John Doe" id="nome">
        
        <label for="endereco">Endereço</label>
        <label for="complemento">Complemento</label>
        
        <input type="text" name="endereco" placeholder="Rua João" id="endereco">
        <input type="text" name="complemento" placeholder="casa 2" id="complemento">
        
        <label for="numero">Número</label>
        <label for="bairro">Bairro</label>
        
        <input type="text" name="numero" placeholder="600" id="numero">
        <input type="text" name="bairro" placeholder="Jardim Belval" id="bairro">
        
        <label for="cidade">Cidade</label>
        <label for="estado">Estado</label>
        
        <input type="text" name="cidade" placeholder="Barueri" id="cidade">
        <input type="text" name="estado" placeholder="São Paulo" id="estado">

        <label for="telefone">Telefone</label>
        
        <!--label apenas para manter a estrutura visual do form no navgador-->
        <label for=""></label>

        <input type="text" name="telefone" placeholder="2025550143" id="telefone">

        <!--label apenas para manter a estrutura visual do form no navgador-->
        <label for=""></label>

        <input type="submit" value="Registrar">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>