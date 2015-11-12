__author__ = 'Yseriu'


# in link.py

def changeProfile(pseudo, pcolor):
    sender = 'me'
    return request(serv + "editProfile.php?login="+sender+"&pseudo="+urllib.parse.quote(pseudo)+"&pcolor="+urllib.parse.quote(pcolor))

# in profile.py

def profile():
    changeProfile(input("Entrer un nouveau pseudo : "), toColor(input("Enter une couleur de chat")))

def toColor(color):
    colors = {'Dark Gray' : '10', 'Blue' : '04','Light Blue' : '14', 'Green' : '02', 'Light Green' : '12', 'Cyan' : '06', 'Light Cyan' : '16', 'Red' : '01', 'Light Red' : '11', 'Purple' : '05','Light Purple' : '15','Brown' : '03', 'Yellow'  : '13', 'Light Gray' : '07','White' : '17'}
    if color not in colors.keys():
        color = '00'
    else:
        color = colors['color']
    return color