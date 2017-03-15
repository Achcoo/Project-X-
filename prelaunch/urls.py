from django.conf.urls import include, url

from .views import Index, Menu, SocNetSignUp

urlpatterns = [
 	url(r'^$', Index.as_view(), name='index'),
  	url(r'^menu/$', Menu.as_view(), name="menu"),
  	url(r'^redSocial/', SocNetSignUp.as_view(), name="soc_net"),
  	#python social auth
  	#url('',       include('social.apps.django_app.urls', namespace='social')),
]