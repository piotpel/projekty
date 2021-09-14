from tkinter import *
import pandas
import random

BACKGROUND_COLOR = "#B1DDC6"

try:
    data = pandas.read_csv('words_to_learn.csv')
except FileNotFoundError:
    data = pandas.read_csv('data/norwegian_words.csv')
my_dict = data.to_dict(orient='records')
random_word = {}


def show_translation():  # show english version of the word
    canvas.itemconfig(background, image=back_image)
    word = random_word['English']
    canvas.itemconfig(title_text, text='English', fill='white')
    canvas.itemconfig(word_text, text=word, fill='white')


def through_words():  # show norwegian version of the word
    global random_word, flip_timer
    main_window.after_cancel(flip_timer)
    random_word = random.choice(my_dict)
    canvas.itemconfig(background, image=front_image)
    word = random_word['Norwegian']
    canvas.itemconfig(title_text, text='Norwegian', fill='black')
    canvas.itemconfig(word_text, text=word, fill='black')
    main_window.after(3000, show_translation)  # after 3 seconds, show translation


def update_data():
    global random_word
    my_dict.remove(random_word)  # remove the word I already know from the words to learn
    data = pandas.DataFrame(my_dict)
    data.to_csv('data/words_to_learn.csv', index=False)


main_window = Tk()
main_window.title("Flashcards")
main_window.geometry("800x750+400+0")
main_window.geometry("800x750-400-70")
main_window.config(bg=BACKGROUND_COLOR)

flip_timer = main_window.after(3000, func=through_words)  # flip card after 3 seconds

canvas = Canvas(width=800, height=600, bg=BACKGROUND_COLOR, bd=0, highlightthickness=0, relief='ridge')
front_image = PhotoImage(file='images/card_front.png')
back_image = PhotoImage(file='images/card_back.png')
background = canvas.create_image(410, 310, image=front_image)
canvas.grid(row=1, column=1, columnspan=2)

right_button_image = PhotoImage(file="images/right.png")
right_button = Button(image=right_button_image, highlightthickness=0, relief='flat', bd=0,
                      command=lambda: [through_words(), update_data()])
right_button.grid(row=2, column=2)

wrong_button_image = PhotoImage(file="images/wrong.png")
wrong_button = Button(image=wrong_button_image, highlightthickness=0, relief='flat', bd=0, command=through_words)
wrong_button.grid(row=2, column=1)

title_text = canvas.create_text(400, 150, text='Title', font=('Arial', 40, 'italic'))
word_text = canvas.create_text(400, 260, text='Word', font=('Arial', 60, 'bold'))

main_window.mainloop()
