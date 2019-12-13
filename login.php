<?
  $title = 'Регистрация';
  include 'site_components/header.php';
?>
    <main>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-6">
            <form id="regForm" action="reg_obr.php" method="POST" onsubmit="send(); return false;">
              <h1 class ="text-center mt-5">Регистрация</h1>
                <div class="input-group flex-nowrap my-2"> 
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-secret"></i></span>
          </div>
                  <input type="text" class="form-control" placeholder="Логин" name="login" required> 
        </div>
                <div class="input-group flex-nowrap my-2">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-secret"></i></span>
                </div>
                  <input type="password" class="form-control" placeholder="Пароль" name="pass" required>
                </div>
                <div class="input-group flex-nowrap my-2">
                <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-secret"></i></span>
                </div>
              <input type="password" class="form-control" placeholder="Подтверждение" name="passCheck"required>
                </div>
                <div class="input-group flex-nowrap my-2">
                <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-secret"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Имя" name="name" required>
                </div>
                <div class="input-group flex-nowrap my-2">
                <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-secret"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Фамилия" name="secondname" required>
                </div>
                <p>Дата рождения</p>
                <div class="input-group flex-nowrap my-2">
                <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-secret"></i></span>
                </div>
                <input type="date" class="form-control" placeholder="Дата рождения" name="birthday" required>
                </div>
                <input type="submit" class="btn btn-block btn-primary" value="Зарегистрироваться">
            </form> 
          </div>
        </div>
      </div>
    </main>
    <script>
      async function send() {
        let data = {
          auth: {
          login: regForm.querySelector('[name="login"]').value,
          pass: regForm.querySelector('[name="pass"]').value,
          passCheck: regForm.querySelector('[name="passCheck"]').value,
          },
          info: {
          name: regForm.querySelector('[name="name"]').value,
          secondname: regForm.querySelector('[name="secondname"]').value,
          birthday: regForm.querySelector('[name="birthday"]').value,
          },
        }
        let response = await fetch('reg_obr.php',{
          method: 'POST',
            headers: {
              'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(data),
        });
        if (response.ok) {
          let result = await response.json();
          if (result.code == 1) {
            alert(result.answer);
            window.location.href = 'auth.php';
          } else {
            alert(result.answer);
          }
        } else {
          alert('Ошибка: ' +response.status);
          }
      }
    </script>
<?php
  include 'site_components/footer.php';
?>
