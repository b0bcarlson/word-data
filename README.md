# word-data
Source for retrieving words (binomals, trinomals, etc) from Reddit, and updating the database.

This project relies on PRAW.
Words are retrieved only with Python. All logic and processing is done through PHP.

Assumed tables "words1", "words2", and "words3" already created in MySQL. config.php should contain the $conn for the MySQL connection.
