from django.shortcuts import render
from django.http import HttpResponseRedirect
from .models import Date_time, Location


def index(request):
    Datetime = Date_time.objects.all()
    return render(request, 'firstapp.html',
        {'all_time': Datetime})

def addLocaion(request):
    all_location = Location.objects.all()
    return render(request,'firstapp.html', {'locationall': all_location})

def addBehaviour(request):
    new_entry = Date_time(PersonCompleting=request.POST['PersonCompleting'])
    new_entry.save()
    return HttpResponseRedirect('/first_app/')
def deletePbss(request, Datetime_id):
    to_delete = Date_time.objects.get(id=Datetime_id)
    to_delete.delete()
    return HttpResponseRedirect('/first_app/')