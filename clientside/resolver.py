import sys, os


def resolve(addr):
    os.system("ping -c 1 " + addr + " | head -1 | cut -d ' ' -f 3 > addr.tmp")

    f = open('addr.tmp')
    for i in f:
        x=i[1:-2]
        f.close()
        
        return x

def getHostname():
    os.system("hostname > hnm.tmp")
    f = open('hnm.tmp', 'r')
    for i in f:
        x = i[:-1]
        f.close()
        os.system("rm hnm.tmp")
        return x
    
def getUser(addr):
    """
    get username form machine name
    """
    os.system("ssh -o ConnectTimeout=1 -o StrictHostKeyChecking=no " + addr + " who < /home/barbieri/bin/P4_files/yes 2> /dev/null | head -1 | cut -d ' ' -f 1 > ssh.tmp")
    f = open("ssh.tmp", 'r')
    for i in f:
        x = i[:-1]
        f.close()
        os.system("rm ssh.tmp")
        return x

def searchUser(user):
    s = getSalle()
    a = 1
    while 1:
        print('Scannig ... ' + str(a), end='')
        sa = str(a) if a > 9 else '0'+str(a)
        addr = 'info'+str(s)+'-'+sa
        u = getUser(addr)
        a+=1
        print(u)
        if u == user or a > 20: break
    return resolve(addr) if a <= 20 else None

def getSalle():
    os.system("hostname > hnm.tmp")
    f = open('hnm.tmp', 'r')
    for i in f:
        x = i[4:6]
        f.close()
        os.system("rm hnm.tmp")
        return x

def whoami():
    os.system("whoami > whoami.tmp")
    f = open('whoami.tmp', 'r')
    for i in f:
        x = i[:-1]
        f.close()
        os.system("rm whoami.tmp")
        return x