import oauth2
import sys
import json

access_token='146310978-voHSB6Bj0s5TK7GphB5kg0VNAmpN1Ql0JDhtJCwK'
secret_token='PveLHK2vHZNqnsctaRarYojixlFplpqtZRr3nwq9qBBLi'

def oauth_req(url, key, secret, http_method="GET", post_body=b"", http_headers=None):
    consumer = oauth2.Consumer(key="zrTLMEIamYi5bLfTakfq9JTmQ", secret="cLvreIFRzwtgkrFnGKkc0UYF8CC33wbCVFMw0lJR0vi8YHtJLS")
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

