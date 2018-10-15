#!/usr/bin/env python
# encoding: utf-8
import praw
import re
import os
r = praw.Reddit(user_agent='Most common words 1.0', site_name='ibs')
already_done = set()
all_comments = r.subreddit('all').comments(limit=10)
users = ["automoderator", "bot", "michaelm40", "kakrail69"]
disallowed = ["i'm a bot", "i am a bot", "your post has been removed", "live streaming free", "livestreaming free", "live stream free", "livestream free", "free livestream", "free live stream", "http", "à", "å", "ä", "ç", "č", "é", "è", "í", "ñ", "ò", "ø", "ö", "ù", "ü", "ß"]
for comment in all_comments:
    if comment.id not in already_done:
        if not any(n in comment.author.name.lower() for n in users) and not any(i in comment.body.lower().encode('utf-8') for i in disallowed) and comment.body.count(" ") > 1:
                already_done.add(comment.id)
                co= re.escape(comment.body.encode('utf-8'))
                os.system("php-cgi -f wordscript.php text=\"" + co + "\"")
