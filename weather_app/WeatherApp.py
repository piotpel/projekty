import tkinter as tk
from tkinter import font,messagebox
import datetime
import requests
from PIL import Image, ImageTk

HEIGHT = 500
WIDTH = 600


def format_response(weather):
    try:
        heading = "Today at {0}, {1}".format(weather['list'][0]['dt_txt'][11:-3],
                                           weather['city']['name'])
        temperature = "Temperature: {0} °C".format(weather['list'][0]['main']['temp'])
        windchill = "Temperature windchill : {0} °C".format(weather['list'][0]['main']['feels_like'])
        weather_desc = "Weather: {0}".format(weather['list'][0]['weather'][0]['description'])

        search = str(datetime.date.today() + (datetime.timedelta(days=1))) + " 18:00:00"
        index = 0
        for idx, val in enumerate(weather['list']):
            if search in str(val):
                index = idx
                break

        tomorrow_Temperature = "Temperature: {0} °C".format(weather['list'][index]['main']['temp'])
        tomorrow_windchill = "Temperature windchill : {0} °C".format(weather['list'][index]['main']['feels_like'])
        tomorrow_weather_desc = "Weather: {0}".format(weather['list'][index]['weather'][0]['description'])

        final_str = heading + '\n' + '\n' + temperature \
                    + '\n' + windchill + '\n' + weather_desc + \
                    2 * '\n' + \
                    "Tomorrow at 18:00" + 2 * '\n' + tomorrow_Temperature \
                    + '\n' + tomorrow_windchill + '\n' + tomorrow_weather_desc

    except Exception:
        final_str = "There was a problem with providing the information"
    return final_str


def get_weather(city):  # command for button clicked event
    try:
        weather_key = '6968405c8a5253523cf3afb394472807'
        url = 'https://api.openweathermap.org/data/2.5/forecast'
        params = {'APPID': weather_key, 'q': city, 'units': 'metric'}
        response = requests.get(url, params=params)
        weather = response.json()

        lowerFrameLabel['text'] = format_response(weather)
        results['text'] = format_response(response.json())

        icon_name = weather['list'][0]['weather'][0]['icon']
        open_image(icon_name)
    except Exception:
        messagebox.showerror(title="Name error",
                             message="Invalid city name or data couldn't have been provided")


def open_image(icon):
    size = int(lower_frame.winfo_height() * 0.25)
    img = ImageTk.PhotoImage(Image.open('img/' +icon + '.png').resize((size, size)))
    weather_icon.delete("all")
    weather_icon.create_image(0, 0, anchor='nw', image=img)
    weather_icon.image = img


root = tk.Tk()
# ----------------------------------------------------------------------------
canvas = tk.Canvas(root, height=HEIGHT, width=WIDTH)  # window size
canvas.pack()

background_image = tk.PhotoImage(file='img/landscape.png')  # sets the background
background_label = tk.Label(root, image=background_image)
background_label.place(relwidth=1, relheight=1)

frame = tk.Frame(root, bg="#80c1ff", bd=5)  # bd = border, granice ramki
frame.place(relx=0.5, rely=0.05, relwidth=0.75, relheight=0.1, anchor='n')

entry = tk.Entry(frame, font=40)
entry.place(relwidth=0.65, relheight=1)

button = tk.Button(frame, text="Get Weather", font=('Arial', 15), command=lambda: get_weather(entry.get()))
button.place(relx=0.7, relwidth=0.3, relheight=1)

lower_frame = tk.Frame(root, bg="#80c1ff", bd=10)
lower_frame.place(relx=0.5, rely=0.20, relwidth=0.75, relheight=0.7, anchor='n')

lowerFrameLabel = tk.Label(lower_frame, font=('Arial', 15), anchor='nw', justify='left', bd=5)
lowerFrameLabel.place(relwidth=1, relheight=1)  # default anchor='nw'

bg_color = 'white'
results = tk.Label(lower_frame, anchor='nw', justify='left', bd=4,wraplength=400)
results.config(font=40, bg=bg_color)
results.place(relwidth=1, relheight=1)

weather_icon = tk.Canvas(results, bg=bg_color, bd=0, highlightthickness=0)
weather_icon.place(relx=.75, rely=0, relwidth=1, relheight=0.5)

# ----------------------------------------------------------------------------
tk.mainloop()
