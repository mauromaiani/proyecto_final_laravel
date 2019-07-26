window.onload = function(){

  let formulario = document.querySelector('.form');
  formulario.elements.name.focus();
  console.log(formulario.elements);

  formulario.onsubmit = function(e){
    if(!validaciones()){
      e.preventDefault();
    }else{
      formulario.submit();
    }
  }

  function validaciones(){
    let { name, email, username, password } = formulario.elements;
    if(!validarName(name)) return false;
    if(!validarEmail(email)) return false;
    if(!validarUserName(username)) return false;
    if(!validarPassword(password)) return false;
    return true;
  }

  function validarName(name){
    let errorName = document.getElementById('errorName');
    let re = /^(([A-Za-z]+[\-\']?)*([A-Za-z]+)?\s)+([A-Za-z]+[\-\']?)*([A-Za-z]+)?$/;
    if(!re.test(name.value)){
      name.classList.add('is-invalid');
      errorName.classList.add('alert-danger');
      //errorName.innerHTML = "Email invalido";
      return false;
    }else {
      errorName.innerHTML = "";
      name.classList.remove('is-invalid');
      name.classList.add('is-valid');
      errorName.classList.remove('alert-danger');
      formulario.email.focus();
      return true;
    }
  }

  function validarEmail(email){
    let errorEmail = document.getElementById('errorEmail');
    let re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
    if(!re.test(email.value)){
      email.classList.add('is-invalid');
      errorEmail.classList.add('alert-danger');
      //errorEmail.innerHTML = "Email invalido";
      //input.focus();
      return false;
    }else {
      errorEmail.innerHTML = "";
      email.classList.remove('is-invalid');
      email.classList.add('is-valid');
      errorEmail.classList.remove('alert-danger');
      formulario.username.focus();
      return true;
    }
  }

  function validarUserName(username){
    let errorUserName = document.getElementById('errorUserName');
    let re = /^(([A-Za-z]+[\-\']?)*([A-Za-z]+)?\s)+([A-Za-z]+[\-\']?)*([A-Za-z]+)?$/;
    if(!re.test(username.value)){
      username.classList.add('is-invalid');
      errorUserName.classList.add('alert-danger');
      //errorName.innerHTML = "Email invalido";
      return false;
    }else {
      errorUserName.innerHTML = "";
      username.classList.remove('is-invalid');
      username.classList.add('is-valid');
      errorUserName.classList.remove('alert-danger');
      formulario.password.focus();
      return true;
    }
  }

  function validarPassword(password){
    let errorPassword = document.getElementById('errorPassword');
    let re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/;
    if(!re.test(password.value)){
      password.classList.add('is-invalid');
      errorPassword.classList.add('alert-danger');
      //errorName.innerHTML = "Email invalido";
      return false;
    }else {
      errorPassword.innerHTML = "";
      password.classList.remove('is-invalid');
      password.classList.add('is-valid');
      errorPassword.classList.remove('alert-danger');
      //formulario.password.focus();
      return true;
    }
  }



}
