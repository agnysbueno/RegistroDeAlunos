<?php
include 'functions.php';
// Conexão com a base de dados MySQL
$pdo = pdo_connect_mysql();
// Captura a página via GET request (URL param: page), se não houver, deixa 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de resultados a serem mostrados por página
$records_per_page = 5;
// Prepara a query e pega os registros da tabela alunos, LIMIT vai determinar a página
$stmt = $pdo->prepare('SELECT * FROM alunos ORDER BY ra LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Busca os registros para serem exibidos
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Pega o número total de alunos para determinar se haverá um botão de página anterior e página seguinte
$num_alunos = $pdo->query('SELECT COUNT(*) FROM alunos')->fetchColumn();
?>

<?=template_header('Read')?>

<div class="content read">
	<h2>Lista de Alunos</h2>
	<a href="create.php" class="create-contact">Registrar Aluno</a>
	<table>
        <thead>
            <tr>
                <td>RA</td>
                <td>Nome</td>
                <td>Endereço</td>
                <td>Complemento</td>
                <td>Número</td>
                <td>Bairro</td>
                <td>Cidade</td>
                <td>Estado</td>
                <td>Telefone</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $aluno): ?>
            <tr>
                <td><?=$aluno['ra']?></td>
                <td><?=$aluno['nome']?></td>
                <td><?=$aluno['endereco']?></td>
                <td><?=$aluno['complemento']?></td>
                <td><?=$aluno['numero']?></td>
                <td><?=$aluno['bairro']?></td>
                <td><?=$aluno['cidade']?></td>
                <td><?=$aluno['estado']?></td>
                <td><?=$aluno['telefone']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$aluno['ra']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$aluno['ra']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_alunos): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>