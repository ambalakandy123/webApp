from flask import Flask, render_template, url_for, flash, redirect
from forms import RegistrationForm, LoginForm
app=Flask(__name__)

app.config['SECRET_KEY'] = '3f8b455db08d114196721008c8abc2a3'

posts =[
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

@app.route("/register", methods=['GET','POST'])
def register():
    form = RegistrationForm()
    if form.validate_on_submit():
        flash(f'Account created for {form.username.data}!', 'success')
        return redirect(url_for('home'))
    return render_template('register.html', title= 'Register', form=form)

@app.route("/login")
def login():
    form = LoginForm()
    return render_template('login.html', title='Login', form=form)


if __name__ == '__main__':
    app.run(debug=True)
