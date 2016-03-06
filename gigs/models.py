import datetime

from django.db import models
from django.utils.encoding import python_2_unicode_compatible
from django.utils import timezone

@python_2_unicode_compatible
class Gig(models.Model):
    date_time = models.DateTimeField('date and time of gig')
    location_name = models.CharField(max_length=200)
    location_link = models.URLField()
    fb_event = models.URLField()

    def __str__(self):
        return str(self.date_time)