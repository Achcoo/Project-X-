from django.shortcuts import render
from django.views.generic import TemplateView
from django.http import HttpResponse, HttpResponseRedirect
from .models import User
from django import template
from django.core import serializers
from django.views import View
from .forms import submitEmailForm, submitUserForm

class newUser(View):
    def get(self, request, *args, **kwargs):
    	the_form = submitUserForm()
    	context = {"form": the_form}
    	return render(request, "form.html", context)

    def post(self, request, *args, **kwargs):
        form = submitUserForm(request.POST)
        return render(request, "index.php", context)

def email_exist(em):
		if User.objects.filter(email=em).exists():
			return True
		else:
			return False

class Index(View):
	

	def get(self, request, *args, **kwargs):
		return render(request, "index.php", {})

	def post(self, request, *args, **kwargs):
		if request.method == 'POST':
			em = request.POST.get('user_mail')
		if (email_exist(em)):
			print ("existe el usuario")
		else:
			return render(request, "form.html", {})
        #user_form = newUser()

#class Index(request):
    #return render(request,'index.php')

class Menu(TemplateView):
    template_name = "menu.html"

class SocNetSignUp(TemplateView):
	template_name = 'signup_socnet.html'
