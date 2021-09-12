from turtle import Screen
from paddle import Paddle
from ball import Ball
from scoreboard import Scoreboard
import time

screen = Screen()
screen.title("Pong")
screen.setup(width=800, height=600)
screen.bgcolor('black')
# wid 20 hei 100 x_pos 350 y_pos 0
screen.tracer(0)

right_paddle = Paddle((350, 0))
left_paddle = Paddle((-350, 0))

screen.listen()
screen.onkey(right_paddle.paddle_up, "Up")
screen.onkey(right_paddle.paddle_down, "Down")
screen.onkey(left_paddle.paddle_up, "w")
screen.onkey(left_paddle.paddle_down, "s")

game_is_on = True
right_paddle.go_to_position()
left_paddle.go_to_position()
ball = Ball()
scoreboard = Scoreboard()

while game_is_on:
    time.sleep(ball.move_speed)
    screen.update()
    ball.go()

    # detect the collision with wall

    if ball.ycor() > 280 or ball.ycor() < -280:
        ball.bounce_y()

    # detect collision with one of the paddles

    if (ball.distance(right_paddle) < 50 and ball.xcor() > 320) or (
            ball.distance(left_paddle) < 50 and ball.xcor() < -320):
        ball.bounce_x()

        # left side scores
    if ball.xcor() > 380:
        ball.lost_point()
        scoreboard.l_point()
        sleep_time = 0.1

        # right side scores
    if ball.xcor() < -380:
        ball.lost_point()
        scoreboard.r_point()
        sleep_time = 0.1

screen.exitonclick()
