<?php
// Iniciar a sessão para manter o valor do display entre as requisições
session_start();

// Inicializar o display (se não houver nada na sessão, começamos com uma string vazia)
$display = $_SESSION['display'] ?? '';

// Processar os botões
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se o usuário clicar em um número, adicionamos ao display
    if (isset($_POST['num'])) {
        $display .= $_POST['num'];
    }

    // Se o usuário clicar em um operador, adicionamos ao display
    if (isset($_POST['operator'])) {
        $display .= ' ' . $_POST['operator'] . ' ';
    }

    // Se o usuário clicar em "C" (limpar), resetamos o display
    if (isset($_POST['clear'])) {
        $display = '';
    }

    // Se o usuário clicar em "=" (igual), realizamos a operação
    if (isset($_POST['equal'])) {
        // Usamos a função eval() para calcular a expressão
        try {
            // Aqui vamos avaliar a expressão diretamente
            $result = eval("return $display;");
            $display = $result;
        } catch (Exception $e) {
            $display = 'Erro';
        }
    }

    // Salvar a variável de display na sessão para manter o valor
    $_SESSION['display'] = $display;

    // Redirecionar para o mesmo arquivo, mantendo o estado da calculadora
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <script>
       
    </script>
</head>
<body>
 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
 
  <nav class="navbar navbar-expand-lg " data-bs-theme="dark" style="background:#000261; width: 100%; height: 100px; font-family: inter; font-weight: 600; font-size: small;" >
    <div class="container-fluid ">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" >
        <img src="img/imagem (1).png" style="width: 90px; height: 90px;"alt="">
      </a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="inicio.html">INÍCIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cadastro.html">CADASTRAR</a>
          </li>s
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="calcular.php">CALCULAR</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
            <button type="button" style="background: rgb(12,88,126);
            background: linear-gradient(90deg,  rgba(142,203,253,1)0%,  rgba(142,203,253,1) 71%, rgba(142,203,253,1) 100%); color: rgb(255, 255, 255); background-color: rgb(126, 195, 252); font-size: small;  font-weight: 800; width: 180px; height: 40px; border-radius: 20px;" class="btn btn" href="index.html"   >Saiba mais</button>
        </form>
      </div>
    </div>
  </nav>

  <br><br><br><br>

      <style>

  
          .calculator {
              background-color: #fff;
              padding: 20px;
              border-radius: 10px;
              box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
              display: flex;
              justify-content: center;
              align-items: center;
          }
  
          .display {
              width: 100%;
              height: 50px;
              text-align: right;
              font-size: 24px;
              margin-bottom: 10px;
              padding: 10px;
              border: 1px solid #ccc;
              border-radius: 5px;
          }
  
          .buttons button {
              width: 50px;
              height: 50px;
              font-size: 18px;
              background-color: #f1f1f1;
              border: 1px solid #ccc;
              margin: 5px;
              cursor: pointer;
              border-radius: 5px;
          }
  
          .buttons button:hover {
              background-color: #ddd;
          }
  
          .buttons {
              display: grid;
              grid-template-columns: repeat(4, 1fr);
              grid-gap: 10px;
          }
  
          .buttons button:active {
              background-color: #bbb;
          }
  
          .buttons .equal {
              background-color: #4CAF50;
              color: white;
          }
  
          .buttons .clear {
              background-color: #f44336;
              color: white;
          }
          
        .h3{
          margin-left:45%;
          color: black;
        }

          
      </style>
      <p class="h3">CALCULAR</p><br><br>


      <div class="calculator">
      
          <form method="post">
          <caption>Faça seus calculos</caption>
              <input type="text" name="display" id="display" class="display" value="<?= htmlspecialchars($display) ?>" disabled>
              
              <div class="buttons">
                  <button type="submit" name="num" value="1">1</button>
                  <button type="submit" name="num" value="2">2</button>
                  <button type="submit" name="num" value="3">3</button>
                  <button type="submit" name="operator" value="+">+</button>
  
                  <button type="submit" name="num" value="4">4</button>
                  <button type="submit" name="num" value="5">5</button>
                  <button type="submit" name="num" value="6">6</button>
                  <button type="submit" name="operator" value="-">-</button>
  
                  <button type="submit" name="num" value="7">7</button>
                  <button type="submit" name="num" value="8">8</button>
                  <button type="submit" name="num" value="9">9</button>
                  <button type="submit" name="operator" value="*">*</button>
  
                  <button type="submit" name="num" value="0">0</button>
                  <button type="submit" name="clear" value="clear" class="clear">C</button>
                  <button type="submit" name="operator" value="/">/</button>
                  <button type="submit" name="equal" value="=" class="equal">=</button>
              </div>
          </form>
      </div>

  
 <!-- Footer -->
 <footer class="text-center text-lg-start " style="background:#000142;">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" >
      <!-- Left -->
      <div class="me-5 d-none d-lg-block" style="color: #ffff;">
        <span>Siga-nos nas redes sociais:</span>
      </div>
      <!-- Left -->
  
      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16" style=" color: #ffff; ">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
              </svg>
        </a>
        <a href="" class="me-4 text-reset">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16" style=" color: #ffff; ">
                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
              </svg>
    
        <a href="" class="me-4 text-reset">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16" style=" color: #ffff; ">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
              </svg>
        </a>
        <a href="" class="me-4 text-reset">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16" style=" color: #ffff; ">
                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
              </svg>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class="container"style="background-color: #000142; color: #ffff; ">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Contato: 
            </h6>
            <p>
                carolina.scarvalho10@gmail.com
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
                Telefone:
            </h6>
            <p>
              <a href="#!" class="text-reset">(11) 00000-0000</a>
            </p>
         
          </div>
     
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color:#000142; color: white;">
        © 2025 Nome da Empresa. Todos os direitos reservados
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</body>
</html>
</body>
</html>
 
