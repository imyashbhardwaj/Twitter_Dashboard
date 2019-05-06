import oauth2
import sys
import json

access_token='146310978-voHSB6Bj0s5TK7GphB5kg0VNAmpN1Ql0JDhtJCwK'
secret_token='PveLHK2vHZNqnsctaRarYojixlFplpqtZRr3nwq9qBBLi'
lis=[]
def oauth_req(url, key, secret, http_method="GET", post_body=b"", http_headers=None):
    consumer = oauth2.Consumer(key="zrTLMEIamYi5bLfTakfq9JTmQ", secret="cLvreIFRzwtgkrFnGKkc0UYF8CC33wbCVFMw0lJR0vi8YHtJLS")
    token = oauth2.Token(key=key, secret=secret)
    client = oauth2.Client(consumer, token)
    resp, content = client.request( url, method=http_method, body=post_body, headers=http_headers )
    return content

url='https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='+sys.argv[1]
url1='https://api.twitter.com/1.1/friends/list.json?screen_name='+sys.argv[1]
user_timeline = oauth_req( url, access_token,secret_token  )
user_timeline=user_timeline.decode("utf-8")
user_timeline=json.loads(user_timeline)
l1=[] 
for i in user_timeline:
    l1.append([i["text"],i["created_at"]])
lis.append(l1)
follower = oauth_req( url1, access_token,secret_token  )
follower=follower.decode("utf-8")

followers=json.loads(follower)
l=[]
for i in followers["users"]:
    l.append(i["screen_name"]) 
#print (l)

for i in l:
    url='https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='+i+'&count=2'
    user_timeline = oauth_req( url, '146310978-voHSB6Bj0s5TK7GphB5kg0VNAmpN1Ql0JDhtJCwK', 'PveLHK2vHZNqnsctaRarYojixlFplpqtZRr3nwq9qBBLi' )
    user_timeline= user_timeline.decode("utf-8")
    user_timeline=json.loads(user_timeline)
    lis.append([user_timeline[0]["text"],user_timeline[0]["created_at"],i])
    lis.append([user_timeline[1]["text"],user_timeline[1]["created_at"],i])
    
    

print(lis)
