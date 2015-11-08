__author__ = 'Yseriu'

import time
from link import *

print(getMessages(10), end='')
last = getLastTime()

while 1:
    l2 = getLastTime()
    if l2 != last:
        print(getRecentMessages(last), end='')
        last = l2
    time.sleep(0.5)