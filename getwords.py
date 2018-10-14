#!/usr/bin/env python
import praw
import re
import os
r = praw.Reddit(user_agent='Most common words 1.0', site_name='ibs')
already_done = set()
all_comments = r.subreddit('all').comments(limit=10)
for comment in all_comments:
    if comment.id not in already_done:
        if comment.author.name != "AutoModerator":
                already_done.add(comment.id)
                co= re.escape(comment.body.encode('utf-8'))
                os.system("php-cgi -f wordscript.php text=\"" + co + "\"")
