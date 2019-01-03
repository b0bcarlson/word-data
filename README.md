# word-data
Source for retrieving words (binomials, trinomials, etc) from Reddit, and updating the database.

This project relies on PRAW. praw.ini required, user is "ibs".
Words are retrieved and processed with Python. Some logic and processing is done through PHP.

Assumed tables "words1" through "words5" already created in MySQL. 
config.php should contain the $conn for the MySQL connection; $days and $count for how long and which "old" words should be kept (see below).

## getwords.py
`python getwords.py <number of comments to fetch>`

Uses PRAW to grab a comment, the input string is uppercased and any character that is not alphanumeric or a space is removed, then is analyzed for quality (not spam, in English, contains at least 2 spaces).  The string is converted to an array by the spaces. All the comments are broken down into their respective words through 5nomials and the result is passed to `wordscript.php`

## wordscipt.php
Takes the input string, processes it into a 2D array (one array for each table), then each array is passed through an insert statement to insert or update the respective row.

## cleandatabase.php
Using $days and $count, words are removed. This is used to remove words that are likely not actual words.
The higher $days is, the more days the word (or binomial or trinomial) is kept.
The lower $count is, the more likely a word will be removed.
This script is useful for when somebody makes up words or as a result of out of context text. This script is very important, but must be used with caution, as it could potentially remove more than intended.
I am still, and will for the forseeable future, adjusting exactly this file to remove as much junk as possible while attempting to preserve useful data.

## process.php
This part of the project is not yet complete.
Using the input data, this script will choose what words (or phrases) are significant. The idea is that you can insert a string to get a general idea of what the topic is.

## gen.php
This is a work in progress, see the commits for more information. The end result will be to use the data to create sentences.
