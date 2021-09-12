from turtle import Turtle


class Scoreboard(Turtle):

    def __init__(self):
        super().__init__()
        with open('data.txt') as file:
            self.high_score = file.read()
        self.pencolor("white")
        self.hideturtle()
        self.penup()
        self.score = 0
        self.goto(x=0, y=280)
        self.display_score()

    def display_score(self):
        self.clear()
        self.write("Score: {0}  High score: {1}".format(self.score, self.high_score), align="center",
                   font=("Arial", 12, "bold"))

    def add_point(self):
        self.score += 1
        self.display_score()

    # def game_over(self):
    #     self.goto(0, 0)
    #     self.write("GAME OVER", align="center", font=("Arial", 24, "bold"))

    def reset(self):
        if self.score > int(self.high_score):
            self.high_score = self.score
            with open('data.txt', 'w') as file:
                file.write(str(self.high_score))
        self.score = 0
        self.display_score()
