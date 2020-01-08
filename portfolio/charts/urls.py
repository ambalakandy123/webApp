from django.urls import path
from django.contrib import admin

from .views import ChartView


urlpatterns = [

    path('chart/', ChartView.as_view(), name='charts')

   ]