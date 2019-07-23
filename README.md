# CITIZEN

CITIZEN is a CIIT Announcement Aggregator that consists of Twitter, Facebook, and Gmail modules

## Installation

Use [xampp](https://www.apachefriends.org/index.html) to use the webapp 
'''
localhost/CITIZEN
'''

## Gmail

Gmail modules needs to be configured in order to work

**on xampp's httpd.conf**
1. Search for AddHander
2. Add .py
It should look like this

'''bash
AddHandler cgi-script .cgi .pl .asp .py
'''

**readEmail.py**

1. Install [Python 2.7.16](https://www.python.org/downloads/)
2. On readEmail.py located at CITIZEN/gmail/
Line 1 Consists of #!<Directory of Python 2.7 .exe
3. Change the directory to where your python 2.7 .exe is located

## Gmail Account Configuration

[Less secured app access](https://myaccount.google.com/security) should be enabled