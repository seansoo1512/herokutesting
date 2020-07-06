# -*- coding: utf-8 -*-
"""
Created on Mon Jul  6 19:00:41 2020

@author: ZhenXiang
"""

from flask import Flask, render_template, url_for, request
import pandas as pd
import pickle
import joblib
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.naive_bayes import MultinomialNB
from nltk.corpus import stopwords
import string

app = Flask(__name__)


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
     

@app.route('/')
def home():
    return render_template('index.html')

@app.route('/predict', methods=['POST'])
def predict():
    
    NB_spam_model = open('NB_spam_model.pkl', 'rb')
    classifier = joblib.load(NB_spam_model)
     
    cv_model = open('cv.pkl', 'rb')
    cv = joblib.load(cv_model)
    
    if request.method == 'POST':
        message = request.form['message']
        data = [message]
        vect = cv.transform(data).toarray()
        my_prediction = classifier.predict(vect)
        
    return render_template('Contact.html', prediction = my_prediction)

if __name__ == '__main__':
    
    app.run()