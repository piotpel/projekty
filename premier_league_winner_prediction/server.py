from flask import Flask, render_template, request, flash
from flask_bootstrap import Bootstrap
from flask_wtf import FlaskForm
from wtforms import SelectField, SubmitField, DecimalField, validators
import teams
import os
import pandas as pd
import numpy as np
import pickle
import sklearn

SECRET_KEY = os.urandom(32)

app = Flask(__name__)
app.config['SECRET_KEY'] = SECRET_KEY
Bootstrap(app)

MODEL = pickle.load(open('static/model.pkl', 'rb'))
PREDICTION_DF = pd.DataFrame(columns=['B365H', 'B365D', 'B365A', 'HomeTeam_Arsenal', 'HomeTeam_Aston Villa',
                                      'HomeTeam_Brighton', 'HomeTeam_Burnley', 'HomeTeam_Chelsea',
                                      'HomeTeam_Crystal Palace', 'HomeTeam_Everton', 'HomeTeam_Leicester',
                                      'HomeTeam_Liverpool', 'HomeTeam_Man City', 'HomeTeam_Man United',
                                      'HomeTeam_Newcastle', 'HomeTeam_Norwich', 'HomeTeam_Southampton',
                                      'HomeTeam_Watford', 'HomeTeam_West Ham', 'HomeTeam_Wolves',
                                      'AwayTeam_Arsenal', 'AwayTeam_Aston Villa', 'AwayTeam_Brighton',
                                      'AwayTeam_Burnley', 'AwayTeam_Chelsea', 'AwayTeam_Crystal Palace',
                                      'AwayTeam_Everton', 'AwayTeam_Leicester', 'AwayTeam_Liverpool',
                                      'AwayTeam_Man City', 'AwayTeam_Man United', 'AwayTeam_Newcastle',
                                      'AwayTeam_Norwich', 'AwayTeam_Southampton', 'AwayTeam_Watford',
                                      'AwayTeam_West Ham', 'AwayTeam_Wolves'])

abspath = 'C:/Users/piotr/Downloads/big_football_data/Datasets'
cwd = os.path.abspath(abspath)
files = os.listdir(cwd)
df = pd.DataFrame()

for file in files:
    if file.endswith('.csv'):
        df = df.append(pd.read_csv(abspath + '/' + file), ignore_index=True)


class TeamPickForm(FlaskForm):
    first_team = SelectField('Pierwsza drużyna:', validators=[], choices=teams.all_teams)
    second_team = SelectField('Druga drużyna:', validators=[], choices=teams.all_teams)
    submit = SubmitField('Wybierz')


class PredictionTeamPickForm(FlaskForm):
    first_team = SelectField('Pierwsza drużyna (gospodarz):', validators=[], choices=teams.all_teams)
    first_team_odds = DecimalField('Kurs bukmacherski na wygraną pierwszej drużyny',
                                   validators=[validators.data_required()])
    second_team = SelectField('Druga drużyna (gość):', validators=[], choices=teams.all_teams)
    second_team_odds = DecimalField('Kurs bukmacherski na wygraną drugiej drużyny',
                                    validators=[validators.data_required()])
    draw_odds = DecimalField('Kurs bukmacherski na remis', validators=[validators.data_required()])
    submit = SubmitField('Wybierz')


@app.route('/', methods=['GET', 'POST'])
def main_page():
    return render_template("title_page.html")


@app.route('/2000_2019')
def stats_2000_2019():
    return render_template("2000_2019.html")


@app.route('/2015_2019', methods=['GET', 'POST'])
def stats_2015_2019():
    return render_template("2015_2019.html")


@app.route('/predict', methods=['GET', 'POST'])
def predict():
    """Return site for using machine learning algorythm
    Includes form with 2 dropdowns for picking teams """
    form = PredictionTeamPickForm()
    error_message = ""
    if request.method == 'POST':
        if form.first_team.data == '' \
                or form.second_team.data == '' \
                or form.first_team_odds.data == None \
                or form.second_team_odds.data == None \
                or form.draw_odds.data == None:
            flash("Wybierz dwa zespoły i podaj ich kursy.")
            return render_template("index.html",
                                   form=form)
        elif form.first_team.data == form.second_team.data:
            flash("Nie możesz wybrać dwóch tych samych drużyn!")
            return render_template("index.html",
                                   form=form)

        else:
            home_team = str(form.first_team.data)
            away_team = str(form.second_team.data)
            home_team_odds = float(form.first_team_odds.data)
            draw_odds = float(form.draw_odds.data)
            away_team_odds = float(form.second_team_odds.data)
            prediction_array = [home_team_odds, draw_odds, away_team_odds]
            for column in PREDICTION_DF.columns[3:]:
                if column == 'HomeTeam_' + home_team or column == 'AwayTeam_' + away_team:
                    prediction_array.append(1)
                else:
                    prediction_array.append(0)

            first_team_win_chance = MODEL.predict_proba([prediction_array])[0][1]

            result_message = f"Na {first_team_win_chance * 100:.2f}% przewiduję zwycięstwo {form.first_team.data}"

            return render_template("index.html",
                                   form=form,
                                   result_message=result_message)

    return render_template("index.html", form=form)


@app.route('/head-to-head', methods=['GET', 'POST'])
def head_to_head():
    """ Return site for head to head matches"""
    form = TeamPickForm()
    error_message = ""
    if request.method == 'POST':
        if form.first_team.data == '' or form.second_team.data == '':
            flash("Wybierz dwa zespoły.")
            return render_template("head_to_head.html",
                                   form=form)
        elif form.first_team.data == form.second_team.data:
            flash("Nie możesz wybrać dwóch tych samych drużyn!")
            return render_template("head_to_head.html",
                                   form=form)

        else:
            conditions = [df['FTR'] == 'H', df['FTR'] == 'A', df['FTR'] == 'D']
            choices = [df.AwayTeam, df.HomeTeam, 'Match Drawn']
            choices2 = [df.HomeTeam, df.AwayTeam, 'Match Drawn']
            df['Losing Team'] = np.select(conditions, choices, default=np.nan)
            df['Winning Team'] = np.select(conditions, choices2, default=np.nan)

            def win_loss(team1, team2):
                """Calculate number of wins and draws between two teams"""
                new_df = df[(df['HomeTeam'] == team1) | (df['HomeTeam'] == team2)]
                new_df = new_df[(new_df['AwayTeam'] == team1) | (new_df['AwayTeam'] == team2)]
                return new_df['Winning Team'].value_counts()

            # to_string - usuwa name i dtype z rozwiązania
            # patrz https://stackoverflow.com/questions/53025207/how-do-i-remove-name-and-dtype-from-pandas-output
            result_message = win_loss(form.first_team.data, form.second_team.data).to_string().replace('Match Drawn',
                                                                                                       'Remis')

            return render_template("head_to_head.html",
                                   form=form,
                                   result_message=result_message)

    return render_template("head_to_head.html", form=form)


if __name__ == '__main__':
    app.run(debug=True)
