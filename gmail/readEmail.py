#!D:/Program Files/Python 2.7.16/python.exe

print("Content-Type: text/html\r\n\r\n")
print('''
    <head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="gmail_python.css">
</head>

<body>
  <!--<form action="readEmail.py" method="post">-->
  <div class = "left-menu">
    <h1 id = "left-menu-header">Groups</h1>
      <div class = "left-menu-subcontainer">
      <div>
        <a href="../index.html">
          <button id = "left-menu-content" type="button">Twitter</button>
        </a>
      </div>
      <div>
        <a href="index.html">
          <button id = "left-menu-content" type="button">Gmail</button>
        </a>
      </div>
      <div>
        <a href="../facebook/index.html">
          <button id = "left-menu-content" type="button">Facebook</button></div>
        </a>
      </div>
      <div>
        <a href="../canvas/index.html">
        <button id = "left-menu-content" type="button">Canvas</button>
        </a>
      </div>
    </div>
  </div>

  <div class = "middle-content">
    <div class = "posts">
      <div class = "post-header">
      ''')

import smtplib
import time
import imaplib
import email
import re
import cgi

# Gmail Credentials
FROM_EMAIL = ''  # Enter your email here
FROM_PWD = ''  # Enter your email password here
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
                    print('<div id = "post-header-from"><p>From : ' + email_from + '\n</p></div>')
                    print('<div id = "post-header-subject"><p>Subject : ' + email_subject + '\n</p></div>')


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
                    print('<div id = "post-content"><p>' + body + '\n</p><hr>')  # Prints the body of the message

                    counter += 1
                    if counter == 5:
                        return

    except Exception as e:
        print(str(e))  # Prints an error is message is not successfully fetch.

read_email_from_gmail()  # Calls the Method to read the messages of the email.

print('''
    </div>
    </div>
    </div>
  </div>


</body>
  
</html>''')
