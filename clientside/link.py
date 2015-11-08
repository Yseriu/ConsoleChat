__author__ = 'Yseriu'

import urllib.parse
import urllib.request
from resolver import *

serv = "http://127.0.0.1/ConsoleChat/serverside/"

def send(msg):
    sender = 'me'
    return urllib.request.urlopen(serv + "send.php?sender="+sender+"&message="+urllib.parse.quote(msg)).read().decode('utf-8')

def getMessages(qte=1):
    return urllib.request.urlopen(serv + "getMultipleMessages.php?qte="+str(qte)).read().decode('utf-8')

def getRecentMessages(lastTime):
    return urllib.request.urlopen(serv + "getRecentMessages.php?last="+urllib.parse.quote(str(lastTime))).read().decode('utf-8')

def getLastTime():
    return urllib.request.urlopen(serv + "getLastTime.php").read().decode('utf-8')