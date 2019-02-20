#!/usr/bin/env python
# encoding: utf-8
import praw
import re
import os
import json
import urllib
import sys
from collections import defaultdict
from tendo import singleton

me = singleton.SingleInstance()

def isMod(comment):
        for mod in comment.subreddit.moderator():
                if mod == comment.author:
                        return True
        return False

r = praw.Reddit(user_agent='Most common words 1.0', site_name='ibs')
already_done = set()
for iter in range(10):
        all_comments = r.subreddit('all').comments(limit=int(sys.argv[1]))
        users = ["automoderator", "bot", "michaelm40", "kakrail69", "suitology", "kiveniraye", "czynot"]
        disallowed = ["i'm a bot", "i am a bot", "has been removed", "live streaming free", "livestreaming free", "live stream free", "livestream free", "free livestream", "free live stream", "you have awarded karma", "sports live stream", "live stream online", "online freeports", "this post was made by", "polarized light neutron", "watch live", "live stream", "live streams", "online nba", "game free", "click here", "message the mods", "message the mod", "ask a mod", "http", "à", "å", "ä", "ç", "č", "é", "è", "í", "ñ", "ò", "ø", "ö", "ù", "ü", "ß"]
        words = defaultdict(int)
        prog = re.compile(r"(\s+|^\s*)((([A-Z]+)\s+\4\s+\4)|(([A-Z]+)\s+([A-Z]+)\s+([A-Z]+)\s+\6\s+\7)|(([A-Z]+)\s+([A-Z]+)\s+\10\s+\11))")
        for comment in all_comments:
                if comment.id not in already_done:
                        if not any(n in comment.author.name.lower() for n in users) and not any(i in comment.body.lower().encode('utf-8') for i in disallowed) and comment.body.count(" ") > 1 and comment.submission.score > 3 and not isMod(comment):
                                already_done.add(comment.id)
                                co = re.escape(comment.body.encode('utf-8'))
                                co = re.sub(r'[^A-Z \n]', r'', co.upper().strip()).strip()
                                if not prog.search(co):
                                        co = "0" + co + "1"
                                        co = co.split()
                                        for w in co:
                                                words[w] += 1
                                        for x in range(2,6):
                                                for ind in range(0, len(co) + 1 - x):
                                                        word = ""
                                                        for w in range(x):
                                                                word = word + " " + co[ind + w]
                                                        words[word[1:]] += 1
        os.system("php -e wordscript.php -f=\"" + json.dumps(words).replace('"', r'\"') + "\"")
