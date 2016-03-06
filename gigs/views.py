from django.http import HttpResponse
from django.shortcuts import render

from .models import Gig 


def index(request):
    context = {
        'gigs': Gig.objects.order_by('-date_time'),
    }
    return render(request, "gigs/index.html", context)
