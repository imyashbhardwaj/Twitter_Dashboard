#insert your Access Key and token

import oauth2
import sys
import json

access_token='********' #enter access token here
secret_token='********' #enter access token secret here

def oauth_req(url, key, secret, http_method="GET", post_body=b"", http_headers=None):
    consumer = oauth2.Consumer(key="***********", secret="**********")    #enter API key and secret key
    token = oauth2.Token(key=key, secret=secret)
    client = oauth2.Client(consumer, token)
    resp, content = client.request( url, method=http_method, body=post_body, headers=http_headers )
    return content

url="https://api.twitter.com/1.1/trends/place.json?id=1"

trends = oauth_req( url, access_token,secret_token  )
trends=trends.decode("utf-8")
trends=json.loads(trends)
l=[]
for i in trends[0]["trends"]:
    l.append(i["name"])

print(l)
