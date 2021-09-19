#The program monitors stock price changes of the picked company and if it changes
#more than by 5% then it sends sms message with the alert and info about company
#from news api

import requests
from dotenv import load_dotenv
import os
from twilio.rest import Client
import SMS_message


def positive_arrow():
    """Select the type of arrow in the message based on percentage difference
    between stocks closing values from the last 2 days"""
    if percentage_difference > 0:
        return '🔺'
    return '🔻'


load_dotenv("C:/Users/Piotrek/Desktop/Python/.env.txt")

# Stock API variables
STOCK_KEY = os.environ["STOCK_KEY"]
STOCK_ENDPOINT = "https://www.alphavantage.co/query"
STOCK = "TSLA"
STOCK_API_FUNCTION = 'TIME_SERIES_DAILY'

# News API variables
NEWS_KEY = os.environ["NEWS_KEY"]
COMPANY_NAME = "Tesla Inc"
NEWS_ENDPOINT = "https://newsapi.org/v2/everything"

# twilio API variables
TWILIO_SID = os.environ['ACC_SID']
TWILIO_AUTH_TOKEN = os.environ['ACC_AUTH_TOKEN']
MY_NUMBER = os.environ['MY_NUMBER']

# stock API request
url = f'https://www.alphavantage.co/query?function={STOCK_API_FUNCTION}&symbol={STOCK}&apikey={STOCK_KEY}'
r = requests.get(url)
data = r.json()

time_series_as_list = list(data['Time Series (Daily)'])
yesterday_stock = float(data['Time Series (Daily)'][time_series_as_list[0]]['4. close'])
before_yesterday_stock = float(data['Time Series (Daily)'][time_series_as_list[1]]['4. close'])
percentage_difference = round(before_yesterday_stock / yesterday_stock, 1)

# News API request
news_params = {
    'apiKey': NEWS_KEY,
    'qInTitle': COMPANY_NAME,
    'from': time_series_as_list[2]
}

news_data = requests.get(url=NEWS_ENDPOINT,
                         params=news_params,
                         )
latest_3_news = news_data.json()["articles"][:3]

# if the difference is more than 5%
if percentage_difference >= 5.0 or percentage_difference <= -5.0:
    arrow_type = positive_arrow()
    formatted_articles = [f"Headline: {article['title']}. \n Description: {article['description']}" for article in
                          latest_3_news]
    client = Client(TWILIO_SID, TWILIO_AUTH_TOKEN)
    for article in formatted_articles:
        message = client.messages \
            .create(
            body=SMS_message.message.replace('arrow_type_', positive_arrow())
                .replace('percentage', str(percentage_difference))
                .replace('rest_of_info', article),
            from_='+18059208079',
            to=MY_NUMBER
        )
