<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Verifica se existe um aluno com o RA descrito, por exemplo: update.php?id=000000000 vai pegar o aluno com ra igual a 000000000
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // Verifica se a variável existe, se não, deixa em branco
        $ra = isset($_POST['ra']) ? $_POST['ra'] : NULL;
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
        $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';

        // Atualiza o registro
        $stmt = $pdo->prepare('UPDATE alunos SET ra = ?, nome = ?, endereco = ?, complemento = ?, numero = ?, bairro = ?, cidade = ?, estado = ?, telefone = ? WHERE ra = ?');
        $stmt->execute([$ra, $nome, $endereco, $complemento, $numero, $bairro, $cidade, $estado, $telefone, $_GET['id']]);
        $msg = 'Atualizado com sucesso!';
    }
    // Captura o aluno na tabela de alunos
    $stmt = $pdo->prepare('SELECT * FROM alunos WHERE ra = ?');
    $stmt->execute([$_GET['id']]);
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$aluno) {
        exit('Não encontramos nenhum aluno com esse RA!');
    }
} else {
    exit('Nenhum RA especificado!');
}
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Atualizar Registro #<?=$aluno['ra']?></h2>
    <form action="update.php?id=<?=$aluno['ra']?>" method="post">
        
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

        <input type="submit" value="Atualizar">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>