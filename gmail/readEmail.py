#!C:/Python27/python.exe

print("Content-Type: text/html\r\n\r\n")
print('''
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Home</title>
      <link rel="stylesheet" type="text/css" href="gmail_python.css">
      <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    </head>

<body class="container">

  <header>
    <img src="../images/Citizen-logo.png" id="header-logo">
    <hr>
    <nav>
      <ul>
        <li><a href="../index.html">Twitter</a></li>
        <li><a href="../facebook/index.html">Facebook</a></li>
        <li><a href="readEmail.py">Gmail</a></li>
      </ul>
    </nav>
  </header>

  <div class = "wrapper">
    <div class = "posts">
      ''')

import smtplib
import time
import imaplib
import email
import re
import cgi
from cryptography.fernet import Fernet

# Get the key again (for the demonstration)
file = open('key.key', 'rb')
key = file.read()  # The key will be type bytes
file.close()

# Decrypt the encrypted message
with open('email.txt.encrypted', 'rb') as f:
    email_data = f.read()

# Decode the message
fernet = Fernet(key)
decrypted_email = fernet.decrypt(email_data)

# Decrypt the encrypted message
with open('password.txt.encrypted', 'rb') as f:
    password_data = f.read()

# Decode the message
fernet = Fernet(key)
decrypted_password = fernet.decrypt(password_data)

# Converts the byte to string
user_email = decrypted_email.decode("utf-8")
user_password = decrypted_password.decode("utf-8")

# Gmail Credentials
FROM_EMAIL = user_email  # Enter your email here
FROM_PWD = user_password  # Enter your email password here
SMTP_SERVER = 'imap.gmail.com'  # imap.gmail.com is the STMP server to fetch emails.


def read_email_from_gmail():
    try:
        mail = imaplib.IMAP4_SSL(SMTP_SERVER)
        mail.login(FROM_EMAIL,FROM_PWD)
        mail.select('inbox')

        type, data = mail.search(None, 'ALL')
        mail_ids = data[0]  # data is a list

        id_list = mail_ids.split()  # ids is a space separated string
        # latest_email_id = id_list[-1]  # get the latest
        counter = 0  # limits email to 5 results

        for i in reversed(id_list):
            typ, data = mail.fetch(i, '(RFC822)')

            for response_part in data:
                if isinstance(response_part, tuple):
                    msg = email.message_from_string(response_part[1].decode('utf-8'))
                    email_subject = msg['subject'] # Gets the Email Subject
                    email_from = msg['from'] # Gets the Email Subject
                    body = ""  # Initialization of body string variable for the body of the message

                    # PRINTS RECIPIENT AND SUBJECT OF THE MESSAGE
                    print('<div class = "post-header"><div class = "post-header-from"><p>From : ' + email_from + '\n</p></div>')
                    print('<div class = "post-header-subject"><p>Subject : ' + email_subject + '\n</p></div></div>')

                    for part in msg.walk():  # Since the body of the message is a multiLine and retuns a list instead of string. This msg.walk will decode the message.
                        if part.get_content_type() == "text/plain":
                            email_body = part.get_payload(decode=True)  # Decoder of the Message bytes to list
                            body = body + str(email_body)  # Concatenates the parts of the list to one string.

                    # body = body.strip('b"')
                    # body = body.strip('b\'')
                    # body = re.sub(r"^\S\"", " ", body)  # Removes the b" at the start of the String Message
                    # body = re.sub(r"^\S\'", " ", body)  # Removes the b' at the start of the String Message
                    # body = re.sub(r"\\r\\n", "<br>", body)  # Replaces all the \r\n to <br>
                    body = re.sub(r"\n", "<br>", body)  # Replaces all the \r\n to <br>

                    # PRINTS THE BODY OF THE MESSAGE
                    print('<div class = "post-content"><p>' + body + '\n</p><hr></div>')  # Prints the body of the message

                    counter += 1
                    if counter == 5:
                        return
        mail.logout()
    except Exception as e:
        print(str(e))  # Prints an error is message is not successfully fetch.


read_email_from_gmail()  # Calls the Method to read the messages of the email.

print('''
    </div>
  </div>


</body>
  
</html>''')
