from django.contrib import admin
from .models import Profile
from charts.models import ChartValue
from polls.models import post

admin.site.register(post)


admin.site.register(ChartValue)

admin.site.register(Profile)