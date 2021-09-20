from flask import Flask, render_template, \
    request
import scrap

# program enables to calculate how many Polski Złoty(PLN) user has to pay for
# the specified by him amount of the currency he has chosen

app = Flask(__name__)
dt = scrap.DataScrap()
info = dt.get_data()


@app.route("/", methods=['GET', 'POST'])
def test():
    if request.method == 'POST':
        if request.form.get('comp_select') == '' or request.form['amount'] == '':
            result = 0
            select = ''
            amount = ''
            err = "Invalid amount or you forgot to pick the currency"
        else:
            amount = float(request.form['amount'])
            select = request.form.get('comp_select')
            result = round(float(info[str(select)]) * amount, 2)
            err = ''
        return render_template(
            'index.html',
            data=info.keys(),
            result=result,
            currency=str(select),
            amount=amount,
            error_message=err)
    else:
        return render_template(
            'index.html',
            data=info.keys())


if __name__ == '__main__':
    app.run(debug=True)
