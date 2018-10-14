# word-data
Source for retrieving words (binomals, trinomals, etc) from Reddit, and updating the database.

This project relies on PRAW. praw.ini required, user is "ibs".
Words are retrieved only with Python. All logic and processing is done through PHP.

Assumed tables "words1", "words2", and "words3" already created in MySQL. 
config.php should contain the $conn for the MySQL connection; $days and $count for how long and which "old" words should be kept (see below).

## getwords.py
Uses PRAW to grab an array of comments. Each comment is sent to wordscript.php

## wordscipt.php
The input string is uppercased and any character that is not alphanumeric or a space is removed. The string is converted to an array by the spaces.
For each trinomal, binomal, and word, each is further processed (nothing too long to clearly be a word or obviously a link). Then each word is added to the table and incremented.

## cleandatabase.php
Using $days and $count, words are removed. This is used to remove words that are likely not actual words.
The higher $days is, the more days the word (or binomal or trinomal) is kept.
The lower $count is, the more likely a word will be removed.
This script is useful for when somebody makes up words or as a result of out of context text. This script is very important, but must be used with caution, as it could potentially remove more than expected.
