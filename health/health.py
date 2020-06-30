from flask import Flask, render_template, url_for
app=Flask(__name__)

    {
        'author':'Ranjith ak',
        'title':'advice consultant',
        'content':'first post',
        'date_posted':'july 1,2020'
    },
    {
        'author':'priya ak',
        'title':'advice consultant',
        'content':'second post',
        'date_posted':'july 3,2020'
    }
]
@app.route("/")
@app.route("/home")
def home():
    return render_template('home.html', posts=posts)

@app.route("/about")
def about():
    return render_template('about.html', title='About')


if __name__ == '__main__':
    app.run(debug=True)
