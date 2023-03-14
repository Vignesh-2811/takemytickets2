import os
import imaplib
import email
import yaml
import sys
import json

with open("credentials.yml") as f:
    content = f.read()

my_credentials = yaml.load(content, Loader=yaml.FullLoader)

user, password = my_credentials["user"], my_credentials["password"]

imap_url = 'imap.gmail.com'

my_mail = imaplib.IMAP4_SSL(imap_url)

my_mail.login(user, password)

my_mail.select('Inbox')

key = 'FROM'
value = sys.argv[1] 
_, data = my_mail.search(None, key, value)

mail_id_list = data[0].split()[-10:]

if mail_id_list:
    latest_mail_id = mail_id_list[-1]
    typ, data = my_mail.fetch(latest_mail_id, '(RFC822)')
    my_msg = email.message_from_bytes(data[0][1])
    payload = my_msg.get_payload()
    if isinstance(payload, list):
        payload = payload[0]
    if payload.get_content_type() == "text/plain":
        body = payload.get_payload(decode=True).decode("utf-8")
        lines = body.strip().split("\n")

        # create an empty dictionary
        ticket_info = {}

        for line in lines:
            if "From: BookMyShow <tickets@bookmyshow.email>" in line:
                ticket_info['from'] = "tickets@bookmyshow.email"
                 
        for line in lines:
             if "To:" in line:
                to_address = line.strip().split("<")[-1].strip(">")
                ticket_info['to'] = to_address

        for i, line in enumerate(lines):
            if "BOOKING ID:" in line:
                booking_line = lines[i+1].strip()
                ticket_info['booking_id'] = booking_line

        for i, line in enumerate(lines):
            if "Venue" in line:
                venue_line = lines[i-1].strip()
                ticket_info['venue'] = venue_line

        for i, line in enumerate(lines):
            if "Category" in line:
                category_line = lines[i+1].strip()
                ticket_info['category'] = category_line

        for i, line in enumerate(lines):
            if "Quantity" in line:
                quantity_line = lines[i+2].strip()
                ticket_info['quantity'] = int(quantity_line)

        for i, line in enumerate(lines):
            if "Total amount paid" in line:
                amount_paid_line = lines[i].strip()
                amount_paid = amount_paid_line.split('₹')[1] 
                ticket_info['amount_paid'] = float(amount_paid)

        print(json.dumps(ticket_info))

else:
    print("No emails found from", value)
    
my_mail.close()
my_mail.logout()
