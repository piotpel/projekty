from turtle import Screen, Turtle
import time
from food import Food
from snake import Snake
from scoreboard import Scoreboard

screen = Screen()
screen.setup(width=600, height=600)
screen.bgcolor("black")
screen.title("Snake")
screen.tracer(0)  # turns off turtle animation and set delay for update drawings

snake = Snake()
food = Food()
game_is_on = True
scoreboard = Scoreboard()

screen.listen()
screen.onkey(snake.up, "Up")
screen.onkey(snake.down, "Down")
screen.onkey(snake.left, "Left")
screen.onkey(snake.right, "Right")

while game_is_on:
    screen.update()
    time.sleep(0.1)
    snake.move()

    if snake.head.distance(food) < 15:
        # detect collision with food
        food.refresh()
        scoreboard.add_point()
        snake.extend()

        # detect collision with wall
    if not -285 < snake.head.xcor() < 285 or not -285 < snake.head.ycor() < 285:
        scoreboard.reset()
        snake.reset()
        # detect collision with the tail

    # detect collisions with yourself
    for segment in snake.segments[1:]:
        if snake.head.distance(segment) < 10:
            scoreboard.reset()
            snake.reset()

screen.exitonclick()
