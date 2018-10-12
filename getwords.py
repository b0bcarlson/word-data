#!/usr/bin/env python
import praw
import subprocess
import re
import requests
import os
import time
r = praw.Reddit(user_agent='Most common words 1.0', site_name='ibs')
already_done = set()
i=1
all_comments = r.subreddit('all').comments()
for comment in all_comments:
    if comment.id not in already_done:
        if comment.author.name != "AutoModerator":
                already_done.add(comment.id)
                co= re.escape(comment.body.encode('utf-8'))
                print "Processing comment number " +str(i)
                i+=1
                os.system("php-cgi -f wordscript.php text=\"" + co + "\"")
