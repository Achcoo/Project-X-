<?php
session_start(); 
?>

<!DOCTYPE html>

{% load staticfiles %}
{% load static %}

<html lang="en">
<head><!DOCTYPE html>


<html lang="en">
<head>
  <title>Prelaunch</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-signin-client_id" content="1057193297406-hpm99hhqlbdfv73b49plpit2sbkri93s.apps.googleusercontent.com">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{% static 'css/general.css' %}">
  <link rel="stylesheet" type="text/css" href="{% static 'css/lightbox.css' %}">
  <link rel="stylesheet" type="text/css" href="{% static 'intro.js-2.4.0/introjs.css' %}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
  <script type="text/javascript" src="{% static 'js/general.js' %}"></script>
  <script type="text/javascript" src="{% static 'js/fb_script.js' %}"></script>
  <script type="text/javascript" src="{% static 'js/gplus_script.js' %}"></script>
  <script type="text/javascript" src="{% static 'intro.js-2.4.0/intro.js' %}"></script>

  <style type="text/css">
    .circle {
       width: 100px;
       height: 100px;
       border: 3px solid;
       border-color: white;
       -moz-border-radius: 50%;
       -webkit-border-radius: 50%;
       border-radius: 50%;
       background: #00BBE9;
  }
  </style>
</head>
<body>
<!-- HTML for displaying user details -->
<div class="userContent"></div>
  
  <div id="fb-root"></div>

  <div id="status"></div>
  <div class="col-md-12">
    <center>
      <h3 id="thanks"></h3>
    </center>
  </div>

  <div class="container">
    <div class="col-md-4">
      <div id="logo">
        <img src="{%static 'images/logo.png' %}"/>
      </div>
      <div class="left-box box-style" style="display: {{product_image}}">
      {% if product_image == 'block' %}
        <img id="product" class="zoom" src="{%static 'images/prod.png' %}"/>
      {% endif %}
      
      </div>

      <div class="col-md-12 left-box box-style" style="display: {{authenticated}}; left: 0px">
          <div id="referal_link" data-step="2" data-intro="Comparte en tu red social favorita para ganar más puntos" style="display: {{authenticated}};"> 
          <center><div class="circle" id="circle">
            <h1 id="totalPoints">{{user.points}}</h1>
            <p class="text">Puntos</p>
          </div></center>
          <div>
            <div class="col-md-1" style="height: 200px;"></div>
            <div><h3 id="sharelinktext1" class="text">Invita a tus amigos y gana increíbles recompensas</h3></div>
            <div class="col-md-1"></div>  
          </div>
          <div>
            <div class="col-md-1"></div>
            <div class="col-md-10"><p id="sharelinktext2" class="text">Copia el siguiente enlace y empieza a compartir para obtener más puntos</p></div>
            <div class="col-md-1"></div>
          </div>
          <div>
            <div class="col-md-1"></div>
            <div class="col-md-10 link copy_btn" id="url_field" style="border: 2px solid #0000f4; height: 30px;"></div>
            <div class="col-md-1"></div>
          </div>
          <div class="col-md-12 button-group" style="position: relative;top: -50px"><center>
            <button id="fb_share" onclick="sharefb();" style="border: 0px; padding: 0px; background-color: transparent;">
              <img src="{% static 'images/fbook_button.png' %}"/>
            </button>
              
            <button style="border: 0px; padding: 0px; background-color: transparent;">
              <img src="{% static 'images/tw_button.png' %}"/>
            </button>

            <button style="border: 0px; padding: 0px; background-color: transparent;">
              <img src="{% static 'images/insta_button.png' %}"/>
            </button>
          </center>
          </div>
        </div>
      </div>

    </div>

    <div class="col-md-6 right-box box-style">
      <center><h1 class="title zoom" id="text1" data-step="1" data-intro="Completa esta guía y gana puntos adicionales" style="padding-top: 50px">Producto XYZ</h1>
        <h3 class="text" style="display: {{authenticated}}">
          Bienvenido {{user.firstname}}
        </h3> </center>
      <div class="col-md-12">
        <div class="col-md-1"></div>
        <div id="description" class="col-md-8">
          <h4 class="text" id="text2" style="padding-top: 50px">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent viverra tempus sapien, ac mattis felis consequat id. Aliquam erat volutpat. Morbi mattis consectetur nisl, suscipit pharetra dolor dignissim ac. Quisque eget molestie dolor. 
          </h4>   
        </div>  
      </div>
      
      
      <div><center>
        <div class="col-md-6 text" style="font-size: 22px">$X pesos en premios</div>
        <div class="col-md-6 text" style="font-size: 22px"> Z ganadores</div>

        <div style="height: 250px;"> Time</div></center>
      </div>

        <!-- If user is not authenticated-->
        <div id="social_links" style="display: {{register}}">
          <center><h2 class="text"> Regístrate para participar</h2>

              <!--<form>-->
                <div>
                  <!-- <img src="{% static 'images/key.png' %}"/> -->
                  <div class="backdrop" style="display: {{popup}};"></div>
                  <form method="POST" action="."> {% csrf_token %}
                  <input type="email" id="mail" name="user_mail" placeholder="Ingrese su correo" style="border: 1px solid #008; height: 40px; width: 250px">
                  <div class="box" style="display: {{popup}};">
                      <center>
                        <h3 class="text">Ingresa tus datos para empezar a ganar puntos</h3>
                        <div>
                        <input type="text" id="name" name="username" placeholder="Ingrese su nombre" required style="border: 1px solid #008; height: 40px; width: 200px">
                        </div>
                        <div>
                        <input type="text" id="last_name" name="lastname" placeholder="Ingrese su apellido" required style="border: 1px solid #008; height: 40px; width: 200px"></div>
                        <div>
                        <input type="radio" name="gender" value="male" checked> Hombre
                        <input type="radio" name="gender" value="female"> Mujer</div>
                        <div><input type="password" id="passw" name="password" placeholder="Ingrese contraseña" required style="border: 1px solid #008; height: 40px; width: 200px"></div>
                        <!-- {{form.as_p}} -->
                        <div><button class="btn btn-primary btn-md" name="new_user_info" type="submit" style="height: 40px">Ingresar</button>
                        </div>
                      </center>
                    
                    </div>
                  </form>
                  <!-- {{form.as_p}} -->
                  <button class="btn btn-primary btn-md lightbox" name="email" type="submit" style="height: 40px">Regístrarse</button>
                  <p class="text">{{msg}}</p>
                  <p class="text">{{msg2}}</p>
                </div>
              <!--</form>-->

              <div class="text" id="signin_lightbox"> <a href="#" class="signin_lightbox clickable"> ¿Ya eres un usuario? Inicia sesión</a> </div>
              <div>
                  <div class="backdrop_signin" style="display:{{popup_signin}};"></div>
                  <form method="POST" action="."> {% csrf_token %}
                    <div class="box_signin" style="display: {{popup_signin}};">
                      <div class="close"> x </div>
                      <center>
                        <h3 class="text">Inicia sesión y obtén más puntos</h3>
                        <div>
                        <input type="email" id="mail" name="user_email" placeholder="Ingrese su correo" required style="border: 1px solid #008; height: 40px; width: 200px">
                        </div>
                        <div>
                        <input type="password" id="passw" name="passw" placeholder="Ingrese su contraseña" required style="border: 1px solid #008; height: 40px; width: 200px"></div>
                          <!-- {{form.as_p}} -->
                        <div><button class="btn btn-primary btn-md" name="signin_info" type="submit" style="height: 40px">Entrar</button>
                        </div>
                      </center>                  
                    </div>
                  </form>
              </div>

          </center>
          <div class="col-md-12" id='sign_up_socnet'> <center>
          {% block sign_up_socnet %}{% endblock %}
            <!--<iframe src="{% url 'soc_net' %}" frameborder="0"></iframe>--> 
            </center>
          </div>

          
        </div>
        <!-- Else.. user is authenticated-->

        <div id="showdata"></div>

        <div id="slider" data-step="3" data-intro="Completa 100 puntos y llévate uno de nuestros premios totalmente gratis" style="display: {{authenticated}};">
          <div class="col-md-12"><center>
            <h3 class="text"> Recompensas a ganar:</h3></center>
          </div>
          <div>
            <div class="col-md-1"></div>
            <div class="col-md-9" style="top: 50px">
              <div id="myProgress">
                <div id="myBar">
                  <div id="label"></div>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="circle" id="circle gift"><center>
                <img src="{% static 'images/gift1.png' %}" style="position: absolute;left: 40px;top: 25px" /></center>
                <!--<div class="float-nav">
                <a href="#" class="menu-btn">
                  <ul>
                    <li class="line"></li>
                    <li class="line"></li>
                    <li class="line"></li>
                  </ul>
                  <div class="menu-txt">menu</div>
                </a>
              </div>

              <div class="main-nav">
                <ul>
                  <li><a href="#">Degree Programs</a></li>
                  <li><a href="#">Admissions</a></li>
                  <li><a href="#">Alumni & Friends</a></li>
                  <li><a href="#">Campus Community</a></li>
                  <li><a href="#">Parents</a></li>
                  <li><a href="#">Account Login</a></li>
                </ul>
              </div> --> <!-- Hasta aquí llega el menú de imágenes-->
              </div>
            </div>
          </div>
          <div class="col-md-12"><center>
          {% if user.numpersons > 0 %}
            <h4 class="text"> {{user.numpersons}} amigos se han unido </h4>
          {% else %}
            <h4 class="text"> 0 amigos se han unido </h4>
          {% endif %}
          </center>
          </div>

          {% if authenticated == 'block' %}
           <script type="text/javascript"> move({{user.points}}) </script>
          {% endif %}

        </div>

      </div>
    </div>

  </div>

</body>
<footer style="padding-top: 100px;">
  <center>Todos los derechos reservados</center>
</footer>
</html>
