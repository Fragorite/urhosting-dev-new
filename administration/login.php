<?php include('includes/config.php'); 

    if(isset($_POST['formConnect'])) {
        if(!empty($_POST['usernameConnect']) && !empty($_POST['passwordConnect'])) {
            $username = htmlspecialchars($_POST['usernameConnect']);
            $password = sha1($_POST['passwordConnect']);
            $select = $db->prepare('SELECT * FROM site_users WHERE username = :username');
            $select->execute(array(
                'username' => $username
            ));
            $userSelect = $select->fetch(PDO::FETCH_ASSOC);
            if($password == $userSelect['password']) {
                $_SESSION['id'] = $userSelect['id'];
                header('Location: blank.php');
            } else {
                echo "Erreur mdp";
            }
        } else {
            echo "Champs incomplet";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UrHosting - Administration</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-2 d-none d-lg-block"></div>
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Connexion</h1>
                  </div>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="usernameConnect" aria-describedby="emailHelp" placeholder="Nom d'utilisateur">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="passwordConnect" placeholder="Mot de passe">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                      </div>
                    </div>
                    <input type="submit" name="formConnect" value="Connexion" class="btn btn-primary btn-user btn-block" />
                    <hr>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
