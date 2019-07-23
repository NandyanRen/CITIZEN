# CITIZEN

CITIZEN is a CIIT Announcement Aggregator that consists of Twitter, Facebook, and Gmail modules

## Installation

Use [xampp](https://www.apachefriends.org/index.html) to use the webapp 

```
localhost/CITIZEN
```

## Gmail

Gmail modules needs to be configured in order to work

### xampp

**httpd.conf**
1. Search for AddHandler
2. Add .py
It should look like this

```
AddHandler cgi-script .cgi .pl .asp .py
```

### readEmail.py

**Requirements**
* [Python 2.7.16](https://www.python.org/downloads/) - Gmail module interpreter
* Cryptography Module - Decryption of user email and password
```python
python -m pip install Cryptography
```

**Python Interpreter for Web**
1. On readEmail.py located at CITIZEN/gmail/
Line 1 Consists of #!<Directory of Python 2.7 .exe
2. Change the directory to where your python 2.7 .exe is located

## Gmail Account Configuration

[Less secured app access](https://myaccount.google.com/security) should be enabled

## Built with
* [PyCharm](https://www.jetbrains.com/pycharm/)
* [Sublime](https://www.sublimetext.com)
* [Graph Api](https://developers.facebook.com)
* [Twitter Api](https://developer.twitter.com)
