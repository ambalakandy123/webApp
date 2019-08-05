package com.example.mypuzzle;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.nio.channels.InterruptedByTimeoutException;

public class LauncherActivity extends AppCompatActivity {

    public static final String Extra_message = "message";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_launcher);

        //DISPLAY WELCOME MESSAGE WITH THE NAME
        Intent i = getIntent();
        String MessageText = i.getStringExtra("username");
        TextView messageView = (TextView) findViewById(R.id.NameTextView);
        messageView.setText("Welcome: " + MessageText + " please Select a image");


    }

    //Intent the micky mouse image buttton to main2Acyivity
    public void micky(View view) {

        Intent i = getIntent();
        String MessageText = i.getStringExtra("username");
        Intent intent = new Intent(this, Main2Activity.class);
        intent.putExtra("playername", MessageText);
        startActivity(intent);

        CharSequence text = "You have Selected MICKY MOUSE!";
        int duration = Toast.LENGTH_SHORT;
        Toast toast = Toast.makeText(this, text, duration);
        toast.show();

    }
    //Intent the donald duck image button to donaldtwoActivity

    public void donaldClick(View view) {
        Intent i = getIntent();
        String MessageText = i.getStringExtra("username");

        Intent intent = new Intent(this, donaldtwoActivity.class);
        intent.putExtra("playername", MessageText);
        startActivity(intent);
        CharSequence text = "You have Selected DONALD DUCK!";
        int duration = Toast.LENGTH_SHORT;
        Toast toast = Toast.makeText(this, text, duration);
        toast.show();
    }

    //intent the imagebutton to poptwoactivity
    public void popClick(View view) {
        Intent i = getIntent();
        String MessageText = i.getStringExtra("username");
        Intent intent = new Intent(this, poptwoActivity.class);
        intent.putExtra("playername", MessageText);
        startActivity(intent);
        CharSequence text = "You have Selected POPAYE!";
        int duration = Toast.LENGTH_SHORT;
        Toast toast = Toast.makeText(this, text, duration);
        toast.show();
    }

}
