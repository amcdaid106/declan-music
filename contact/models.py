from __future__ import unicode_literals

from django.db import models

class ContactButton(models.Model):
    button_text = models.CharField(max_length=200)
    on_click_text = models.CharField(max_length=500)
