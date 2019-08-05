package com.example.mypuzzle;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class fourbyFourActivity extends AppCompatActivity {
    public static final String Extra_message ="message";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_fourby_four);

        //DISPLAY WELCOME MESSAGE WITH THE NAME
        Intent i =getIntent();
        String MessageText =i.getStringExtra("username");
        TextView messageView =(TextView)findViewById(R.id.NameTextView);
        messageView.setText("Welcome: "+MessageText +" please Select a image");
    }
//Image Button intent to MainActivity
    public void mickymouse(View view) {
        Intent intent = new Intent(this, MainActivity.class);
        startActivity(intent);
        CharSequence text = "You have Selected Miky mouse";
        int duration = Toast.LENGTH_SHORT;
        Toast toast = Toast.makeText(this, text, duration);
        toast.show();
    }
//Image button intent to donaldfourActivity
    public void donaldfour(View view) {
        Intent intent = new Intent(this, donaldfourActivity.class);
        startActivity(intent);
        CharSequence text = "You have Selected Donald Duck";
        int duration = Toast.LENGTH_SHORT;
        Toast toast = Toast.makeText(this, text, duration);
        toast.show();
    }
//Image Button intent to popfourActivity
    public void popyi(View view) {
        Intent intent = new Intent(this, popfourActivity.class);
        startActivity(intent);
        CharSequence text = "You have Selected Popaye";
        int duration = Toast.LENGTH_SHORT;
        Toast toast = Toast.makeText(this, text, duration);
        toast.show();
    }
}
