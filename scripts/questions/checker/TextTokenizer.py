import nltk
from nltk.stem.porter import *
st = PorterStemmer()



class textTokenizer:

    def __init__(self):
        self.avoid = set('/|{}()[]\+-=*^1234567890,._')
        self.stopwords = set(['video', 'answer', 'explan', 'enter', "'ll", "'re", 'http', 'car', 'exampl', 'problem', 'told', 'suppos', 'all', 'invent', 'poorli', 'where', 'four', 'signific', 'edu', 'go', 'follow', 'sorri', 'elsewher', 'to', 'certainli', 'becam', 'aris', 'sent', 'everi', 'far', 'none', 'appar', 'did', 'ref', 'pleas', 'past', 'further', 'even', 'index', 'what', 'sub', 'section', 'asid', 'abl', 'brief', 'sup', 'new', 'ever', 'descript', 'never', 'here', 'let', 'along', 'becom', 'sinc', "i'v", 'anymor', 'arent', 'ourselv', 'hither', 'nineti', 'regardless', 'approxim', 'readili', 'put', 'ord', 'use', 'from', 'would', 'two', 'next', 'everybodi', 'few', 'more', 'peopl', 'hundr', 'relat', 'it', 'particular', 'known', 'ok', 'herebi', 'must', 'me', 'mg', 'ml', 'work', 'nine', 'can', 'mr', 'my', 'give', "n't", 'want', 'everywher', 'end', 'rather', 'anoth', 'six', 'alway', 'anyon', 'instead', 'simpl', 'okay', 'may', 'after', 'befor', 'hereupon', 'ff', 'date', 'such', 'eighti', 'caus', 'inform', 'so', 'over', 'becaus', 'affect', 'still', 'mainli', 'how', 'inward', 'fix', 'late', 'might', 'then', 'them', 'good', 'overal', 'auth', 'somebodi', 'they', 'not', 'now', 'day', 'nor', 'somewher', 'name', 'anyth', 'each', 'found', 'mean', 'ed', 'eg', 'realli', 'ex', 'year', 'our', 'happen', 'beyond', 'out', 'shown', 'goe', 'research', 'rd', 're', 'rel', 'got', 'forth', 'million', 'given', 'someon', 'que', 'believ', 'ask', 'anyhow', 'afterward', 'promptli', 'your', 'suffici', 'could', 'omit', 'success', 'keep', 'perhap', 'place', 'outsid', 'ltd', 'onto', 'think', 'first', 'onc', 'one', 'alreadi', 'done', 'miss', 'avail', 'differ', 'sometim', 'least', 'their', 'necessarili', 'similarli', 'lot', 'that', 'specifi', 'part', 'mostli', 'kept', 'nobodi', 'herself', 'than', 'provid', 'gotten', 'i', 'result', 'and', 'ran', 'beforehand', 'ani', 'say', 'have', 'need', 'seen', 'seem', 'saw', 'latter', 'especi', 'note', 'also', 'take', 'which', 'selv', 'noth', 'predominantli', 'begin', 'sure', 'normal', 'who', 'most', 'eight', 'amongst', 'the', 'hereaft', 'kg', 'later', 'km', 'doe', 'inde', 'meanwhil', 'away', 'came', 'somewhat', 'show', 'anyway', 'particularli', 'fifth', 'onli', 'mug', 'should', 'itd', 'do', 'nearli', 'get', 'stop', 'soon', 'hid', 'him', 'requir', 'qv', 'she', 'contain', 'nowher', 'accord', 'see', 'sec', 'are', 'said', 'someth', 'behind', 'between', 'import', 'neither', 'across', 'we', 'come', 'both', 'last', 'howev', 'alon', 'against', 'etc', 'mani', 'com', 'among', 'co', 'ca', 'non', 'respect', 'assum', 'quit', 'pp', 'hardli', 'due', 'been', 'much', 'besid', 'ah', 'immedi', 'quickli', 'anywher', 'latterli', 'former', 'present', 'myself', 'look', 'these', 'will', 'near', 'abov', 'everyon', 'seven', 'almost', 'is', 'henc', 'herein', 'itself', 'im', 'substanti', 'in', 'ie', 'id', 'sever', 'if', 'suggest', 'make', 'same', 'probabl', 'howbeit', 'effect', 'recent', 'off', 'nevertheless', 'nonetheless', 'well', 'thi', 'everyth', 'moreov', 'lest', 'just', 'less', 'when', 'obtain', 'previous', 'had', 'except', 'littl', 'els', 'adj', 'ought', 'gave', 'around', 'mayb', 'five', 'know', 'abst', 'like', 'specif', 'obvious', 'necessari', 'either', 'downward', 'page', 'describ', 'shed', 'right', 'old', 'often', 'some', 'back', 'self', 'home', 'for', 'noon', 'shall', 'per', 'larg', 'be', 'plu', 'run', 'although', 'meantim', 'by', 'on', 'about', 'actual', 'oh', 'of', 'slightli', 'act', 'or', 'own', 'anybodi', 'primarili', 'owe', 'somethan', 'into', 'down', 'formerli', 'couldnt', 'announc', 'mere', 'accordingli', 'her', 'aren', 'there', 'biol', 'hed', 'way', 'himself', 'enough', 'regard', 'but', 'somehow', 'hi', 'et-al', 'line', 'ha', 'with', 'he', 'made', 'possibl', 'up', 'us', 'below', 'otherwis', 'similar', 'significantli', 'gone', 'proud', 'ad', 'certain', 'dure', 'am', 'an', 'strongli', 'as', 'at', 'aw', 'et', 'inc', 'again', "'ll", 'no', 'na', 'nd', 'other', 'you', 'nay', 'briefli', 'furthermor', 'potenti'])
        
    '''
    returns list of important keywords from the documents after removing html, latex and stopwords
    Porter Stemmer is used to stem words
    words containing special chars are removed
    words with length less than 3 are removed
    '''
    
    def extract_keywords(self, s):
        s=format(s)
        a = nltk.word_tokenize(s)
        b =[]
        for word in a:
            if word[-1] == '.':
                word = word[:-1]
            tempword = st.stem(word.lower())
            if len(word) > 2 and self.avoid.isdisjoint(word) and not tempword in self.stopwords:
                b.append(tempword)
        return b

