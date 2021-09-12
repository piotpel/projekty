from turtle import Turtle

STARTING_POSITION = (0, -280)
MOVE_DISTANCE = 10
FINISH_LINE_Y = 280


class Player(Turtle):
    def __init__(self):
        super().__init__()
        self.shape("turtle")
        self.penup()  # prevent drawing
        self.initial_position()

    def go_up(self):
        self.forward(10)

    def initial_position(self):
        self.speed("fastest")
        self.setheading(90)
        self.goto(x=0, y=-280)
