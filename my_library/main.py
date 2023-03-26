from flask import Flask, render_template, request, redirect, url_for
from flask_sqlalchemy import SQLAlchemy


def check_rating(rating: float) -> float:
    if 0.0 <= rating <= 10.0:
        return rating
    elif rating > 10.0:
        return 10.0
    else:
        return 0.0


app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = "sqlite:///books.db"
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)


class Book(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(250), unique=True, nullable=False)
    author = db.Column(db.String(250), nullable=False)
    rating = db.Column(db.Float, nullable=False)

    # allow each book object to be identified by its title when printed.
    def __repr__(self):
        return f'<Book {self.title}>'


with app.app_context():
    db.create_all()


@app.route('/delete')
def delete():
    id = request.args.get('id')
    book_to_delete = Book.query.get(id)
    db.session.delete(book_to_delete)
    db.session.commit()
    return redirect(url_for('home'))


@app.route('/')
def home():
    global db
    all_books = db.session.query(Book).all()
    return render_template('index.html', all_books=all_books)


@app.route("/add", methods=['GET', 'POST'])
def add():
    if request.method == 'GET':
        return render_template('add.html')
    else:
        name = request.form.get("name")
        author = request.form.get("author")
        rating = check_rating(float(request.form.get("rating")))
        if name == '' or author == '' or rating == '':
            pass
        else:
            try:
                new_book = Book(title=name, author=author, rating=rating)
                db.session.add(new_book)
                db.session.commit()
            except Exception:
                return render_template('add.html', error_message="This title already exists!")
        return redirect(url_for('home'))


@app.route('/edit/<id>', methods=['GET', 'POST'])
def edit(id):
    book = Book.query.filter_by(id=id).first()
    if request.method == 'GET':
        rating_now = book.rating
        title = book.title
        author_now = book.author
        return render_template('edit.html',
                               old_rating=rating_now,
                               title=title,
                               old_author=author_now)
    else:
        book_to_update = Book.query.get(book.id)
        if not request.form.get('rating') == '':
            new_rating = check_rating(float(request.form.get('rating')))
            book_to_update.rating = new_rating
            db.session.commit()
        if not request.form.get('title') == '':
            book_to_update.title = request.form.get('title')
            db.session.commit()
        if not request.form.get('author') == '':
            book_to_update.author = request.form.get('author')
            db.session.commit()

        return redirect(url_for('home'))


if __name__ == "__main__":
    app.run(debug=True)
