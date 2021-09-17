# This program scraps the data about flats placed nearby Katowice from the link placed below and automatically
# inserts it into the google form. Answers.xlsx is a file generated (manually) from
# the answers gathered by the form.

from selenium import webdriver
from bs4 import BeautifulSoup
import requests
import time

CHROME_DRIVER_PATH = "C:/Users/Piotrek/Desktop/Python/chromedriver/chromedriver.exe"
GOOGLE_SHEET_LINK = "https://docs.google.com/forms/d/e/1FAIpQLSdg30l5U1vz32e91OubP0YC4k0fWMmaUHGhTVbdBcZhPMdcxw/viewform?usp=sf_link"

PAGES = 3  # number of search pages returned on website

addresses = []
prices = []
links = []

# ----------------- DATA SCRAPING --------------------------------
for i in range(1, PAGES + 1, 1):
    website_link = f"https://gratka.pl/nieruchomosci/katowice/wynajem?page={i}&powierzchnia-w-m2:max=55&cena-calkowita:max=1000&powierzchnia-w-m2:min=30&cena-calkowita:min=500&promien=10"
    site = requests.get(website_link)
    soup = BeautifulSoup(site.text, "html.parser")

    location_info = soup.select(selector=".teaserUnified__location")
    addresses += [info.text.strip().replace("  ", "") for info in location_info]

    price_info = soup.select(selector=".teaserUnified__price")
    prices += [info.text.strip() for info in price_info]

    links_info = soup.select(selector=".teaserUnified__anchor")
    links += [link.get("href") for link in links_info]

driver = webdriver.Chrome(CHROME_DRIVER_PATH)

# -------------- INSERTING DATA TO THE GOOGLE FORM ----------------------------

for i in range(0, len(addresses)):
    driver.get(GOOGLE_SHEET_LINK)
    time.sleep(3)
    address_input = driver.find_element_by_xpath(
        '//*[@id="mG61Hd"]/div[2]/div/div[2]/div[1]/div/div/div[2]/div/div[1]/div/div[1]/input')
    price_input = driver.find_element_by_xpath(
        '//*[@id="mG61Hd"]/div[2]/div/div[2]/div[2]/div/div/div[2]/div/div[1]/div/div[1]/input')
    link_input = driver.find_element_by_xpath(
        '//*[@id="mG61Hd"]/div[2]/div/div[2]/div[3]/div/div/div[2]/div/div[1]/div/div[1]/input')
    send_button = driver.find_element_by_xpath('//*[@id="mG61Hd"]/div[2]/div/div[3]/div[1]/div/div/span/span')

    address_input.send_keys(addresses[i])
    price_input.send_keys(prices[i])
    link_input.send_keys(links[i])
    send_button.click()
    time.sleep(3)
