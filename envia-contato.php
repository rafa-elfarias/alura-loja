<?php
session_start();
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("PHPMailerAutoLoad.php");

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "contato@teste.com.br";
$mail->Password = "123456";

$mail->setFrom("contato@teste.com.br", "Rafael Ribeiro");
$mail->addAddress("contato@teste.com.br");
$mail->Subject = "E-mail de contato da loja";
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
$mailAltBody = "de: {$nome}\nemail: {$email}\nmensagem: {$mensagem}";

if($mail->send()) {
	$_SESSION["success"] = "Mensagem enviada com sucesso";
	header("Location: index.php");
} else {
	$_SESSION["danger"] = "Erro ao enviar mensagem" . $mail->ErrorInfo;
	header("Location: contato.php");
}
die();