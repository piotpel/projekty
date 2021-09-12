from turtle import Turtle
import random

COLORS = ["red", "orange", "yellow", "green", "blue", "purple"]
STARTING_MOVE_DISTANCE = 5
MOVE_INCREMENT = 10


class CarManager(Turtle):
    move_speed = STARTING_MOVE_DISTANCE

    def __init__(self):
        super().__init__()
        self.all_cars = []
        self.penup()  # disable drawing
        self.shape("square")
        self.shapesize(stretch_wid=1, stretch_len=2)  # extend car size
        self.color(random.choice(COLORS))
        self.goto(x=280, y=random.randint(0, 460) - 230)
        self.setheading(180)
        self.all_cars.append(self)

    def hit_the_road(self):  # move all of the cars forward
        for car in self.all_cars:
            car.forward(self.move_speed)

    def create_car(self):
        rand_num = random.randint(1, 6)
        if rand_num == 1:  # 1/6 chance for car to be spawned
            new_car = CarManager()
            self.all_cars.append(new_car)

    def increase_speed(self):
        self.move_speed += MOVE_INCREMENT
