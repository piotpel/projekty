from turtle import Turtle


class Paddle(Turtle):
    def __init__(self, coords):
        self.x = coords[0]
        self.y = coords[1]
        super().__init__()
        self.shapesize(stretch_wid=5, stretch_len=1)
        self.speed("fastest")
        self.shape("square")
        self.color("white")
        self.penup()

    def paddle_up(self):  # go upwards
        self.goto(self.xcor(), self.ycor() + 20)

    def paddle_down(self):  # go downwards
        self.goto(self.xcor(), self.ycor() - 20)

    def go_to_position(self):
        self.goto(x=self.x, y=self.y)
