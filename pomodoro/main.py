from tkinter import *
from tkinter import messagebox
import sqlite3

# ---------------------------- CONSTANTS ------------------------------- #
PINK = "#e2979c"
RED = "#e7305b"
GREEN = "#9bdeac"
CHECKMARK_GREEN = "#1ea300"
YELLOW = "#f6f6c2"
FONT_NAME = "Courier"
WORK_MIN = 25
SHORT_BREAK_MIN = 5
LONG_BREAK_MIN = 20
reps = 0
timer = None

# ---------------------------- DATABASE ------------------------------- #
db = sqlite3.connect('pomodoros.sqlite')
db.execute("CREATE TABLE IF NOT EXISTS workloads(time_ended TEXT)")


def insert_pomodoro_to_db():
    db.execute('INSERT INTO workloads(time_ended) VALUES(CURRENT_TIMESTAMP)')
    db.commit()


def show_report():
    total_data = db.execute("SELECT count(*) FROM workloads ")

    pomodoros_total = f"Total amount of pomodoros: {total_data.fetchall()[0][0]}"
    print(pomodoros_total)
    this_week_data = db.execute(
        "SELECT count(*) FROM workloads WHERE DATE(time_ended) >= DATE('now', 'weekday 0', '-7 days'); ")
    pomodoros_this_week = f"Pomodoros this week: {this_week_data.fetchall()[0][0]}"
    print(pomodoros_this_week)
    pomodoros_today_data=db.execute("SELECT count(*) FROM workloads WHERE DATE(time_ended) = DATE('now')")
    pomodoros_today = f"Pomodoros today: {pomodoros_today_data.fetchall()[0][0]}"
    msgbox_text = pomodoros_total + '\n' + pomodoros_this_week + '\n' + pomodoros_today
    messagebox.showinfo(title='Report', message=msgbox_text)
    total_data.close()
    this_week_data.close()


# ---------------------------- TIMER RESET ------------------------------- #
def reset_timer():
    global reps
    reps = 0
    window.after_cancel(timer)
    canvas.itemconfig(timer_text, text="00:00")
    text_canvas.itemconfig(status_text, text="Timer", fill=GREEN)


# ---------------------------- TIMER MECHANISM ------------------------------- #
def start_timer():
    global reps
    reps += 1
    work_sec = WORK_MIN * 60
    short_break_sec = SHORT_BREAK_MIN * 60
    long_break_sec = LONG_BREAK_MIN * 60
    if reps % 8 == 0:
        count_down(long_break_sec)
        text_canvas.itemconfig(status_text, text="Break", fill=RED)
        checkmarks['text'] += "✔"
        insert_pomodoro_to_db()
    elif reps % 2 == 0:
        count_down(short_break_sec)
        text_canvas.itemconfig(status_text, text="Break", fill=PINK)
        checkmarks['text'] += "✔"
        insert_pomodoro_to_db()
    else:
        count_down(work_sec)
        text_canvas.itemconfig(status_text, text="Work", fill=GREEN)


# ---------------------------- COUNTDOWN MECHANISM ------------------------------- #

def count_down(count):
    count_text = f"{count // 60}:{count % 60:02d}"
    canvas.itemconfig(timer_text, text=count_text)
    if count > 0:
        global timer
        timer = window.after(1000, count_down, count - 1)
    else:
        start_timer()


# ---------------------------- USER INTERFACE SETUP ------------------------------- #

window = Tk()
window.title('Pomodoro')
window.geometry("500x474+100+200")
window.geometry("500x474-550-200")
window.config(padx=100, pady=20, bg=YELLOW)

canvas = Canvas(width=200, height=224, bg=YELLOW, highlightthickness=0)
bg_image = PhotoImage(file='tomato.png')
canvas.create_image(100, 112, image=bg_image)
timer_text = canvas.create_text(100, 130, text='00:00', fill='white', font=(FONT_NAME, 35, 'bold'))

text_canvas = Canvas(width=200, height=100, bg=YELLOW, highlightthickness=0)
status_text = text_canvas.create_text(100, 50, text='Timer', fill=GREEN, font=(FONT_NAME, 50, 'bold'))
text_canvas.grid(row=1, column=2)
canvas.grid(row=2, column=2)

btnStart = Button(text='Start', font=(FONT_NAME, 10, 'bold'), command=start_timer)
btnStart.grid(row=3, column=1)

btnReset = Button(text='Reset', font=(FONT_NAME, 10, 'bold'), command=reset_timer)
btnReset.grid(row=3, column=3)

checkmarks = Label(fg=CHECKMARK_GREEN, bg=YELLOW, font=(FONT_NAME, 15, 'bold'))
checkmarks.grid(column=2, row=4)

window.columnconfigure(1, weight=1)


# ---------------------------- REPORT  ------------------------------- #
btn_report = Button(text="Show report", font=(FONT_NAME, 10, 'bold'), command=show_report)
btn_report.grid(column=2, row=5)

window.mainloop()
