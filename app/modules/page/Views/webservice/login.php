<div class="login-page">
  <div class="form">
    <form class="register-form" >
      <input type="text" placeholder="name"/>

      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" method="POST" action="/page/webservice/login">
      <input type="text" placeholder="username" name="name">
      <input type="password" placeholder="password" name="password"/>
      <input type="hidden" name="encuesta" value = "<?php echo $_GET['encuesta']?>">
      <button>login</button>
    </form>
  </div>
</div>