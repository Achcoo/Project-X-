from django.conf.urls import include, url

from .views import Index, Menu, SocNetSignUp, newUser

urlpatterns = [
 	url(r'^$', Index.as_view(), name='inicio'),
  	url(r'^menu/$', Menu.as_view(), name="menu"),
  	url(r'^redSocial/', SocNetSignUp.as_view(), name="soc_net"),
  	url(r'^userForm/', newUser.as_view(), name="new_user"),
  	#python social auth
  	url('',       include('social.apps.django_app.urls', namespace='social')),
]