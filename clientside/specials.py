__author__ = 'Yseriu'

import os

def find(msg):
    ans = ""
    msgs = msg.split('\n')
    if msgs[-1] == '': msgs.pop(-1)
    for msg in msgs:
        ans += msg + "\n"
        if 'url:' in msg:
            ans += "                  ->  Use 'chat url' command to open url above\n"
            url = msg.split("url:", 1)[1]
            os.system("echo "+url+" > url.tmp")
        if 'cmd:' in msg:
            ans += "                  ->  Use 'chat cmd' command to run command above\n"
            cmd = msg.split("cmd:", 1)[1]
            os.system("echo "+cmd+" > cmd.tmp")
    return ans