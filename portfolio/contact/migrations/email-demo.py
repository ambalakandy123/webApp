import os
import smtplib

EMAIL_ADDRESS = os.environ.get('EMAIL_USER')
EMAIL_PASS = os.environ.get('EMAIL_PASS')
with smtplib.SMTP('smtp.gmail.com', 587)as smtp:
    smtp.ehlo()
    smtp.starttls()
    smtp.ehlo()

    smtp.login(EMAIL_ADDRESS, EMAIL_PASS)

    subject ='grab dinner with me'
    body='tonight we can have dinner from dum n rum '

    msg = f'Subject: {subject}\n\n{body}'

    smtp.sendmail(EMAIL_ADDRESS,EMAIL_ADDRESS, msg)
