<?php require_once("banco-produto.php");
 require_once("logica-usuario.php");

$id = $_POST['id'];
removeProduto($conexao, $id);
$_SESSION["success"] = "Produto removido com sucesso.";
header('Location: produto-lista.php');
die();
 	#<script>
 		#window.location.href = 'produto-lista.php?removido=true';
 	#</script>
?>