{% extends 'index.php' %}

<?php
session_start(); 
?>

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
       
          </center>
          </div>