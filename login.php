<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
}

.form {
    width: 600px;
    margin: auto;
    padding: 1.5rem;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.titulo {
    display: flex;
    font-size: 24px;
    color: #333;    
    margin-bottom: 0.2rem;
    justify-content: center;

}

.email {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 20px;
}

input{
    background-color:aliceblue;
    border-radius: 0.8rem;
    border: none;
    padding: 0.8rem;
}

button {
    display: flex;
    justify-content: center;
    padding: 1rem;
    background-color: #007bff;
    color: #fff;
    border: none;
    text-decoration: none;
    border-radius: 0.8rem;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
</style>  

</head>

<body>

<p class="titulo">Login</p>
  <div class="form-caixa">

    <form class="form" method="post" action="conexaoLogin.php">

      <div class="input-caixatexto">
        <label for="userEmail">Email:</label>
        <input type="text" name="userEmail" id="email" placeholder="Digite o email..." required>
      </div>

      <br>
    
      <div class="input-caixatexto">
        <label for="passwords">Senha:</label>
        <input type="password" name="passwords" id="senha" placeholder="Digite a senha..." required>
      </div>
    
<br>

      <button type="submit" name="submit-button" class="entrar">Entrar</button>
      <small id="form-text"></small>

      <p id="error-message" style="color: red; display: none; text-align: center; margin-top: 1rem; font-weight: bold">Por favor, preencha todos os campos.</p>
    </form>