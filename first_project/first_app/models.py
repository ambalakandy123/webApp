from django.db import models

class Date_time(models.Model):
    PersonCompleting =models.CharField(max_length=50, default="", editable=False)
    Date = models.DateField(auto_now_add=True)
    TimeIncidentStarted = models.DateTimeField(null=True, blank=True)
    TimeIncedentEnded = models.DateTimeField(null=True, blank=True)
class Location(models.Model):
    Date_time_id = models.CharField(max_length=50, default="", editable=False)
    wakingup = models.CharField(max_length=255)
    pain = models.CharField(max_length=255)
    staff = models.CharField(max_length=255)
    solution = models.CharField(max_length=255)
class Triggers(models.Model):
    Location_id = models.CharField(max_length=50, default="", editable=False)
    reason1 = models.CharField(max_length=255)
    reason2 = models.CharField(max_length=255)
    reason3 = models.CharField(max_length=255)
    reason4 = models.CharField(max_length=255)
    reason5 = models.CharField(max_length=255)
class CuesOfDistress(models.Model):
    cues_id = models.CharField(max_length=50, default="", editable=False)
    cues1 = models.CharField(max_length=255)
    cues2 = models.CharField(max_length=255)
    cues3 = models.CharField(max_length=255)
    cues4 = models.CharField(max_length=255)
    cues5 = models.CharField(max_length=255)
    cues6 = models.CharField(max_length=255)
