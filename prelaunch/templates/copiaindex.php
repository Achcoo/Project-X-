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
  <link rel="stylesheet" type="text/css" href="{% static 'css/lightbox.css' %}">
  <link rel="stylesheet" type="text/css" href="{% static 'css/general.css' %}">
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
      <div class="left-box box-style">
        <img id="product" class="zoom" src="{%static 'images/product.png' %}"/>
      </div>
    </div>

    <div class="col-md-8 right-box box-style">
      <h1 class="title zoom" id="text1" data-step="1" data-intro="Completa esta guía y gana puntos adicionales" style="padding-top: 50px">Product XYZ</h1> 
      <h4 class="text zoom" id="text2" style="padding-top: 50px">Nuevo producto xyz, que te permite hacer xyz cosas en x menor tiempo. Ingresa y participa por uno de los sorteos que tenemos para que te lleves un kit completamente gratis</h4> 

      <div id="referal_link" data-step="2" data-intro="Comparte en tu red social favorita para ganar más puntos" style="display: none;"> 
        <div class="circle" id="circle">
          <h1 id="totalPoints"></h1>
          <p class="text">Puntos</p>
        </div>
        <h2 id="sharelinktext1" class="text">Invita a tus amigos y gana increíbles recompensas</h2>
        <p id="sharelinktext2" class="text">Copia el siguiente enlace y empieza a compartir para obtener más puntos</p>
        <div class="link copy_btn" id="url_field" style="border: 2px solid #008; height: 30px;"></div>
          <div class="button-group"><center>
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

  </div>
  <!--
  <div class="banner" style="background-image: url({% static 'images/banner.jpg' %}); position: relative; width: 1500px; left: -110px ">
    <center>
      <div class="container">
          <div class="col-md-6"> 
            <h1 class="title zoom" id="text1" data-step="1" data-intro="Completa esta guía y gana puntos adicionales" style="padding-top: 50px">Product XYZ</h1> 
            <h4 class="text zoom" id="text2" style="padding-top: 50px">Nuevo producto xyz, que te permite hacer xyz cosas en x menor tiempo. Ingresa y participa por uno de los sorteos que tenemos para que te lleves un kit completamente gratis</h4> 
        </div>
      
          <div class="col-md-6">

            <img id="product" class="zoom" src="{%static 'images/product.png' %}"/>

            <div id="referal_link" data-step="2" data-intro="Comparte en tu red social favorita para ganar más puntos" style="display: none;"> 
              <div class="circle" id="circle">
                <h1 id="totalPoints"></h1>
                <p class="text">Puntos</p>
              </div>
              <h2 id="sharelinktext1" class="text">Invita a tus amigos y gana increíbles recompensas</h2>
              <p id="sharelinktext2" class="text">Copia el siguiente enlace y empieza a compartir para obtener más puntos</p>
              <div class="link copy_btn" id="url_field" style="border: 2px solid #008; height: 30px;"></div>
              <div class="button-group"><center>
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
    </center>
  </div> -->

  <div class="container" id="social_links">
    <center><h2 class="text"> Ingresa para participar</h2>
        <img src="{% static 'images/key.png' %}"/>
        <input type="text" style="border: 2px solid #008; height: 40px;"></input>
        <button class="btn btn-primary btn-md" style="color: #008; height: 40px">Ingresar</button>
    </center>
    <div class="button-group"><center>
      <button onclick="login();" class="" ="fb_button" style="border: 0px; padding: 0px; background-color: transparent;">
        <img src="{% static 'images/fbook_button.png' %}" />
      </button>
      
      <button style="border: 0px; padding: 0px; background-color: transparent;">
        <img src="{% static 'images/tw_button.png' %}"/>
      </button>

      <button style="border: 0px; padding: 0px; background-color: transparent;">
        <img src="{% static 'images/insta_button.png' %}"/>
      </button>

      <button style="border: 0px; padding: 0px; background-color: transparent;">
        <img src="{% static 'images/wa_button.png' %}"/>
      </button>

      <!-- <div id="gSignIn"></div> -->

      <!-- <a href="#" class="lightbox">Open Lightbox</a> -->
 
     <div class="backdrop"></div>
    <div class="box">
      <div class="close"> x </div>
      <label for="name">¿Cuantos hijos bebés tienes?</label>
      <form id=infoBabies>
        <li>   
          <select id="numBabies" name="numBabies" onchange="numBabiesForm()" required>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>                     
          </select>
        </li>
        <input type="hidden" name="" id="age1" placeholder="Edad hijo #1" maxlength="3">
        <input type="hidden" name="" id="age2" placeholder="Edad hijo #2" maxlength="3">
        <input type="hidden" name="" id="age3" placeholder="Edad hijo #3" maxlength="3">
        <input type="hidden" name="" id="age4" placeholder="Edad hijo #4" maxlength="3">
        <input type="hidden" name="" id="age5" placeholder="Edad hijo #5" maxlength="3">

        <li id="babies_button" display='none'>
          <input class="button" id="formButton" type="submit" formmethod="post" formaction="" value="Aceptar" onclick="onclickFormButton();" />
        </li>

      </form>
    </div>
 
    </center>
    </div>
  </div>

  <div id="showdata"></div>

  <div class="container" id="slider" data-step="3" data-intro="Completa 100 puntos y llévate uno de nuestros premios totalmente gratis" style="display: none;">
    <div class="col-md-12">
      <h3 class="text"> Recompensas a ganar:</h3>
    </div>
    <div class="col-md-12">
      <div id="myProgress">
        <div id="myBar">
          <div id="label"></div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <h4 class="text"> 0 amigos se han unido:</h4>
    </div>
  </div>


</body>
<footer style="padding-top: 100px;">
  <center>Todos los derechos reservados</center>
</footer>
</html>
