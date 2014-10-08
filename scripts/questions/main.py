import MySQLdb
from config import *
from checker.TextTokenizer import *

'''
connect to the database using credentials imported from config.py
'''
def connect_db():
    db = MySQLdb.connect(host="localhost",
                         user=mysql_username,
                         passwd=mysql_password,
                         db=mysql_database)
    return db


def matching(a,b):
    if len(a) == 0:
        return 0
    c = set(a).intersection(b)
    return 2.0*len(c)/(len(a) + len(b))

t = textTokenizer()

dbcon = connect_db()
dbcur = dbcon.cursor()
query = "SELECT description FROM questions"
dbcur.execute(query)
quest = ''
match = 0
index = 0
question = t.extract_keywords(raw_input("enter a question: "))
#print question
for row in dbcur.fetchall():
    temp = t.extract_keywords(row[0])
    m = matching(question, temp)
    if m > match:
        quest = row[0]
        match = m
        print quest
    index += 1
    #if index % 1000 == 2:
        #print match

print "final match:",quest
#print t.extract_keywords(quest)

