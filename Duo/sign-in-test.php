<?php
session_start();
if (isset($_SESSION["user"])) {
  header("location: dashboard-test.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Sign-in</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
    body {
      /* background: url(/images/beach.jpg) center center/cover; */
    }

    .sign-in-panel {
      width: 320px;
    }

    .signUpPanel {
      display: none;
    }

    .logo {
      height: 48px;
    }

    .input-area .form-floating:first-child .form-control {
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
    }

    .input-area .form-floating:last-child .form-control {
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    .input-area .form-floating:last-child .form-control {
      border-top: transparent;
    }

    .input-area .form-control:focus {
      z-index: 1;
    }

    .form-floating>label {
      z-index: 5;
    }
  </style>
</head>

<body class="bg-light">
  <div class="vh-100 d-flex justify-content-center align-items-center maindiv">
    <div class="sign-in-panel text-center signInPanel">
      <!-- <img class="logo" src="/images/Tripadvisor_lockup_horizontal_secondary_registered.svg" alt=""> -->
      <h4 class="my-3 ">會員登入</h4>
      <?php if (isset($_SESSION["error"]["times"]) && $_SESSION["error"]["times"] >= 5) : ?>
        <h2 class="text-center">錯誤次數太多，請稍後再登入</h2>
      <?php else : ?>
        <form action="doLogin-test.php" method="post">
          <div class="input-area">
            <div class="form-floating ">
              <input type="text" class="form-control position-relative" id="floatingInput" placeholder="" name="account">
              <label for="floatingInput">account</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control position-relative" id="floatingPassword" placeholder="" name="password">
              <label for="floatingPassword">Password</label>
            </div>
          </div>
          <?php if (isset($_SESSION["error"]["message"])) : ?>
            <div class="pt-2 text-danger"><?= $_SESSION["error"]["message"] ?></div>
          <?php unset($_SESSION["error"]["message"]);
          endif; ?>
          <div class="d-flex justify-content-center">
            <div class="form-check my-3">
              <input class="form-check-input" type="checkbox" value="" id="remember">
              <label class="form-check-label" for="remember">
                Remember me
              </label>
            </div>
          </div>
          <div class="d-grid gap-2"><!--d-grid可以讓button變得跟容器一樣寬-->
            <button class="btn btn-primary" type="submit">登入</button>

          </div>
          <div class="pt-4 d-grid gap-2">
            <h6>還不是會員嗎? <a href="sign-up-test.php" id="signUp" class="text-decoration-none">點此註冊</a> </h6>

          </div>
        </form>
      <?php endif; ?>

      <div class="mt-5 text-secondary">
        <p>&copy;2023</p>
      </div>
    </div>

  </div>




  <!-- <div class="container d-flex align-items-center">
    <main>

    </main>
  </div> -->
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>


  <script>


  </script>
</body>

</html>