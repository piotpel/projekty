from turtle import Turtle

FONT = ("Courier", 24, "normal")


class Scoreboard(Turtle):
    def __init__(self):
        super().__init__()
        self.penup()  # prevent drawing
        self.hideturtle()
        self.speed('fastest')
        self.goto(x=-290, y=240)
        self.level = 0
        self.show_level()

    def level_up(self):
        self.level += 1
        self.show_level()

    def show_level(self):
        self.clear()
        self.write(f"Level: {self.level}", font=FONT)

    def game_over(self):
        self.goto(0, 0)
        self.write("GAME OVER", align="center", font=("Arial", 24, "bold"))
