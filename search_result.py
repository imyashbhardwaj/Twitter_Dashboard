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

st=sys.argv[1]
if(st[0]=="#"):
    url="https://api.twitter.com/1.1/search/tweets.json?q=%23"+st[1:]
else:
    url="https://api.twitter.com/1.1/search/tweets.json?q="+st


tweets = oauth_req(url, access_token,secret_token)
tweets=tweets.decode("utf-8")
tweets=json.loads(tweets)

l=[]
for i in tweets["statuses"]:
    l.append([i["created_at"],i["text"],i["user"]["screen_name"]])

print(l)

