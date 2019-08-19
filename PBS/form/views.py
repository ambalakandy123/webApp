from django.shortcuts import render

def home (request):
    return render(request,'form/home.html')
def order (request):
    return render(request,'form/order.html')

