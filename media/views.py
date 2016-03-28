from django.shortcuts import render
from django.http import HttpResponse

from .models import Video, Photo


def index(request):
    context = {
        'videos': Video.objects.all(),
        'photos': Photo.objects.all()
    }
    return render(request, "media/index.html", context)