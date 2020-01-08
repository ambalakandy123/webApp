from django.shortcuts import render
from django.views.generic import TemplateView
from .models import ChartValue

class ChartView(TemplateView):
    template_name = 'charts/charts.html'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context["qs"] = ChartValue.objects.all()
        return context
