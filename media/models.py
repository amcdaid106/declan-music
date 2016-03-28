from __future__ import unicode_literals
from django.db import models
from embed_video.fields import EmbedVideoField

class Video(models.Model):
    clip = EmbedVideoField()
    caption = models.CharField(max_length=200)

class Photo(models.Model):
    image = models.ImageField()
    caption = models.CharField(max_length=200)