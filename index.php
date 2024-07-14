<?php
// URL da API
$api_url = "https://random-data-api.com/api/users/random_user";

// Obter dados (GET) por uma requisição na API
$response = file_get_contents($api_url);

// Converter dados brutos em formato JSON
$data = json_decode($response, true);

// Validação da requisição - Pode não conter nenhum dado.
if ($data) {
  $foto = $data["avatar"];
  $primeiro_nome = $data["first_name"];
  $segundo_nome = $data["last_name"];
  $profissao = $data["employment"]["title"];
  $local_cidade = $data["address"]["city"];
  $local_estado = $data['address']["state"];
}
else {
  $foto = 'N/A';
  $primeiro_nome = 'N/A';
  $segundo_nome = 'N/A';
  $profissao = 'N/A';
  $local_cidade = 'N/A';
  $local_estado = 'N/A';
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerador de Perfis</title>
  <link rel="stylesheet" href="css/style-alt.css">
</head>
<body>
  <section class="container">
    <div class="grid-2 disappear"></div>
    <div class="grid-8">
      <div class="card flex-center-column gap-min mt-1 p-3">
        <div class="profile-big">
          <img src=<?php echo $foto ?> alt=<?php echo $primeiro_nome ?> class="profile-img">
        </div>
        <h5>
          <?php echo $primeiro_nome;?> <?php echo $segundo_nome;?>
        </h5>
        <h6 class="h7">
          <?php echo $profissao;?>
        </h6>
        <h6 class="h7 color-gray">
          <?php echo $local_cidade;?>, <?php echo $local_estado;?>
        </h6>

        <button class="btn mt-3" onclick="gerar()" id="reloadButton">Novo Perfil</button>
      </div>
    </div>
    <div class="grid-2 disappear"></div>
  </section>
  <script src="js/script.js"></script>
</body>
</html>