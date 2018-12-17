#!/usr/bin/env python
# encoding: utf-8
import praw
import re
import os
import json
import urllib
from collections import defaultdict

r = praw.Reddit(user_agent='Most common words 1.0', site_name='ibs')
already_done = set()
all_comments = r.subreddit('all').comments(limit=20)
users = ["automoderator", "bot", "michaelm40", "kakrail69"]
disallowed = ["i'm a bot", "i am a bot", "your post has been removed", "live streaming free", "livestreaming free", "live stream free", "livestream free", "free livestream", "free live stream", "http", "à", "å", "ä", "ç", "č", "é", "è", "í", "ñ", "ò", "ø", "ö", "ù", "ü", "ß"]
words = defaultdict(int)
for comment in all_comments:
    if comment.id not in already_done:
        if not any(n in comment.author.name.lower() for n in users) and not any(i in comment.body.lower().encode('utf-8') for i in disallowed) and comment.body.count(" ") > 1:
                already_done.add(comment.id)
                co= re.escape(comment.body.encode('utf-8'))
                co = re.sub(r'[^A-Z \n]', r'', co.upper()).split()
                for w in co:
                        words[w] += 1
                for x in range(2,4):
                        for ind in range(0, len(co) + 1 - x):
                                word = ""
                                for w in range(x):
                                        word = word + " " + co[ind + w]
                                words[word[1:]] += 1
os.system("php -e wordscript.php -f=\"" + json.dumps(words).replace('"', r'\"') + "\"")
