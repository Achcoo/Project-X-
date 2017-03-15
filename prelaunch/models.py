from django.db import models
from datetime import datetime

class User(models.Model):
    firstname = models.CharField(max_length=50)
    lastname = models.CharField(max_length=50)
    email = models.CharField(max_length=50)
    password = models.CharField(max_length=50,null=True)
    signup_date = models.DateTimeField()
    fb_link = models.CharField(max_length=200,null=True)
    tw_link = models.CharField(max_length=200,null=True)
    insta_link = models.CharField(max_length=200,null=True)
    gplus_link = models.CharField(max_length=200,null=True)
    li_link = models.CharField(max_length=200,null=True)
    gender = models.CharField(max_length=10)
    points = models.IntegerField()
    num_persons = models.IntegerField()
    referred_by = models.BigIntegerField(null=True)
    session = models.BigIntegerField(primary_key=True)

    def verify_if_exist(idsesssion):
    	if (User.objects.get(session=idsesssion) != []):
    		return True
    	else:
    		return False

    def email_exist(email):
        if (User.objects.get(session=email) != []):
            return True
        else:
            return False

    #new user signing through social network
    def new_user(idsesssion, fname, lname, em, link, gend, point, referred_id, socialnet):
        if(verify_if_exist(idsesssion)):
    	 	now = datetime.datetime.now()
    	 	if (socialnet == 'facebook'):
    	 		u = User(session=idsesssion, firstname=fname, lastname=lname, email=em, signup_date=now, fb_link=link, gender=gend, points=point,num_persons=1,referred_by=referred_id)
    	 	elif (socialnet == 'googleplus'):
    	 		u = User(session=idsesssion, firstname=fname, lastname=lname, email=em, signup_date=now, gplus_link=link, gender=gend, points=point,num_persons=1,referred_by=referred_id)
    	 	elif (socialnet == 'twitter'):
    	 		u = User(session=idsesssion, firstname=fname, lastname=lname, email=em, signup_date=now, tw_link=link, gender=gend, points=point,num_persons=1,referred_by=referred_id)
    	 	elif (socialnet == 'linkedin'):
    	 		u = User(session=idsesssion, firstname=fname, lastname=lname, email=em, signup_date=now, li_link=link, gender=gend, points=point,num_persons=1,referred_by=referred_id)
    	 	elif (socialnet == 'instagram'):
    	 		u = User(session=idsesssion, firstname=fname, lastname=lname, email=em, signup_date=now, insta_link=link, gender=gend, points=point,num_persons=1,referred_by=referred_id)
    	 	u.save()

    #new user signing through email
    def new_user_email(fname, lname, em, gend, point, referred_id):
        if(verify_if_exist(idsesssion)):
            now = datetime.datetime.now()
            u = User(session=idsesssion, firstname=fname, lastname=lname, email=em, signup_date=now, gender=gend, points=point,num_persons=1,referred_by=referred_id)
            u.save()


    def update(idsession, point):
    	if(verify_if_exist(idsesssion)):
    		u = User.objects.filter(session=idsession).update(points = points+ point)
    		u.save()

#class Choice(models.Model):
#    question = models.ForeignKey(Question, on_delete=models.CASCADE)
#    choice_text = models.CharField(max_length=200)
#    votes = models.IntegerField(default=0)