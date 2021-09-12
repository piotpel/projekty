import time
from turtle import Screen
from player import Player
from car_manager import CarManager
from scoreboard import Scoreboard

screen = Screen()
screen.setup(width=600, height=600)
screen.tracer(0)  # disable automatic screen updates

screen.listen()
player = Player()
screen.onkey(player.go_up, 'Up')
car_manager = CarManager()
scoreboard = Scoreboard()

game_is_on = True
while game_is_on:
    car_manager.create_car()
    car_manager.hit_the_road()

    time.sleep(0.1)
    for car in car_manager.all_cars:  # check if there is a collision between car and a player
        if car.distance(player) < 25:
            game_is_on = False
            scoreboard.game_over()
    screen.update()
    if player.ycor() > 260:  # if the player has passed all the cars, level up
        player.initial_position()
        scoreboard.level_up()
        car_manager.increase_speed()

screen.exitonclick()
