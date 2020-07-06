#!/usr/bin/env python
# coding: utf-8

# ### Description: This program detects if an email is spam or not

# In[1]:


#Import libraries
import numpy as np
import pandas as pd
import nltk
from nltk.corpus import stopwords
import pickle
import string
import sklearn.external.joblib as extjoblib
import joblib


# In[2]:


#Load data
df = pd.read_csv('D:/Data Science Course/dataset/emails.csv')
df.head()


# In[3]:


#Print the shape
print(df.shape)
print(df.columns)


# In[4]:


#Check for duplicates
df.drop_duplicates(inplace = True)
df.shape


# In[5]:


#Show the number of missing data for each column
df.isnull().sum()


# In[6]:


#Download the stopwords package
nltk.download('stopwords')


# In[7]:

def process_text(text):
    #Remove punctuation
    #Remove stopwords
    #return a list of clean text words
    
    #1
    nopunc = [char for char in text if char not in string.punctuation]
    nopunc = ''.join(nopunc)
    
    #2 Remove stopwords
    clean_words = [word for word in nopunc.split() if word.lower() not in stopwords.words('english')]
    
    #3 
    return clean_words 
    


# In[8]:





# In[60]:


#Example
from sklearn.feature_extraction.text import CountVectorizer



# In[ ]:





# In[ ]:





# In[74]:


cv = CountVectorizer(analyzer=process_text)
cv_fit = cv.fit_transform(df['text'])


# In[11]:


#Split the data into 0.8 training and 0.2 testing
from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(cv_fit, df['spam'], test_size = 0.20, random_state = 0)


# In[76]:


#Get the shape of messages_bow
cv_fit.shape


# In[13]:


#Create and train the Naive Bayes Classifier
from sklearn.naive_bayes import MultinomialNB
classifier = MultinomialNB().fit(X_train, y_train)



# In[14]:


#Print the predictions
print(classifier.predict(X_train))

#Print the actual values
print(y_train.values)


# In[66]:


print(classifier.predict(X_train))


# In[15]:


#Evaluate the model
from sklearn.metrics import classification_report, confusion_matrix, accuracy_score
pred = classifier.predict(X_train)
print(classification_report(y_train, pred))
print()
print('Confusion Matrix:', confusion_matrix(y_train, pred))
print()
print('Accuracy:', accuracy_score(y_train, pred))


# In[16]:


#Print the predictions
print(classifier.predict(X_test))

#Print the actual values
print(y_test.values)


# In[17]:


#Evaluate the model
from sklearn.metrics import classification_report, confusion_matrix, accuracy_score
pred = classifier.predict(X_test)
print(classification_report(y_test, pred))
print()
print('Confusion Matrix:', confusion_matrix(y_test, pred))
print()
print('Accuracy:', accuracy_score(y_test, pred))


# In[80]:


##df['text'].head().apply(process_text)
#CountVectorizer(analyzer=process_text).fit_transform([[message4], [message5]])
#messages_bow = CountVectorizer(analyzer = process_text).fit_transform(df['text'])

examples1 = ['Good Job, I think you are very good at your job! Keep at it']
examples2 = ['Viargra!, free! Come come!']
examples1Input = cv.transform(examples1)
examples2Input = cv.transform(examples2)
predict1 = classifier.predict(examples1Input)
predict2 = classifier.predict(examples2Input)
print(predict1)
print(predict2)


# In[83]:

joblib.dump(classifier, 'NB_spam_model.pkl')
joblib.dump(cv, 'cv.pkl')




# In[84]:





# In[85]:





# In[ ]:





# In[ ]:





# In[ ]:





# In[ ]:





# In[ ]:





# In[ ]:




