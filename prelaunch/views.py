from django.shortcuts import render, redirect
from django.views.generic import TemplateView
from django.http import HttpResponse, HttpResponseRedirect
from .models import User
from django import template
from django.core import serializers
from django.views import View
from .forms import submitEmailForm, submitUserForm
import datetime

def email_exist(em):
		if User.objects.filter(email=em).exists():
			return True
		else:
			return False

def is_user(em, passw):
	if User.objects.filter(email=em,password=passw).exists():
		return True
	else:
		return False

def user_details(em, passw):
	user = User.objects.filter(email=em,password=passw)
	print(user.firstname)
	return user

class Index(View):
	def get(self, request, *args, **kwargs):
		content = {'popup':'none', 'popup_signin':'none', 'register':'block','authenticated':'none','product_image':'block'}
		return render(request, "index.php", content)

	def post(self, request, *args, **kwargs):
		if request.method == 'POST' and 'new_user_info' in request.POST:
			em = request.POST.get('user_mail')
			if (email_exist(em)):
				context = {"popup":'none','popup_signin':'none','authenticated':'none', 'product_image':'block', "msg": 'Este correo ya existe en nuestro sistema de premios.', "msg2": "Inicia sesion para ganar mas puntos"}
				return render(request, 'index.php', context)
			else:
				un = request.POST.get('username')
				ln = request.POST.get('lastname')
				gend = request.POST.get('gender')
				em = request.POST.get('user_mail')
				passw = request.POST.get('password')
				point = 5
				ref_id = 121321432
				now = datetime.datetime.now()
				user = User.objects.create(session=2,firstname=un,lastname=ln,email=em, password=passw,gender=gend,points=point,referred_by=ref_id,signup_date=now,num_persons=0)
				user.save()	
				context = {"popup": 'none','popup_signin':'none',"username": un, 'register':'none','authenticated':'block','product_image':'none','user':user}
				return render(request, 'index.php', context)
		if request.method == 'POST' and 'signin_info' in request.POST:
			em = request.POST.get('user_email')
			passw = request.POST.get('passw')
			if (is_user(em,passw)):
				#user = user_details(em,passw)
				user = User.objects.filter(email=em,password=passw)
				context = {"popup": 'none','popup_signin':'none','register':'none', 'authenticated':'block','user':user[0],'product_image':'none'}
				return render(request, 'index.php', context)
			else:
				context = {"popup": 'none','popup_signin':'none','register':'none', 'msg': 'Datos incorrectos, intenta nuevamente','authenticated':'none','product_image':'block'}
				return render(request, 'index.php', context)

class Menu(TemplateView):
    template_name = "menu.html"

class SocNetSignUp(TemplateView):
	template_name = 'signup_socnet.html'
