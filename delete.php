<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Verifica se existe um aluno com aquele RA
if (isset($_GET['id'])) {
    // Seleciona o registro a ser excluído
    $stmt = $pdo->prepare('SELECT * FROM alunos WHERE ra = ?');
    $stmt->execute([$_GET['id']]);
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$aluno) {
        exit('Não encontramos nenhum aluno com esse RA!');
    }
    // Confirma se o usuário quer mesmo deletar aquele registro
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // Se o usuário clicar em "SIM", o registro é deletado
            $stmt = $pdo->prepare('DELETE FROM alunos WHERE ra = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'O registro foi excluído!';
        } else {
            // Se o usuário clicar em "NÃO", é redirecionado para a página read
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('Nenhum RA especificado!');
}
?>

<?=template_header('Delete')?>

<div class="content delete">
	<h2>Excluir Registro #<?=$aluno['ra']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Você tem certeza que quer excluir o registro #<?=$aluno['ra']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$aluno['ra']?>&confirm=yes">Sim</a>
        <a href="delete.php?id=<?=$aluno['ra']?>&confirm=no">Não</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>