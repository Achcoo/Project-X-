from django import forms
from .models import User
from django.core.validators import URLValidator

class submitUserForm(forms.Form):
	CHOICES =[('Masculino','Masculino'),
         ('Femenino','Femenino')]
	name = forms.CharField(label='Nombre', required=True)
	last_name = forms.CharField(label='Apellido', required=True)
	gender = forms.ChoiceField(choices=CHOICES, widget=forms.RadioSelect())
	password = forms.CharField(widget=forms.PasswordInput)
	captcha_answer = forms.IntegerField(label='2 + 2', label_suffix=' =')

class submitEmailForm(forms.Form):
	email = forms.EmailField(required=True, label='Correo')
