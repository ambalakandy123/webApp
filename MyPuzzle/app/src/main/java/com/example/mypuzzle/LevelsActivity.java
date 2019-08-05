package com.example.mypuzzle;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.Adapter;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
import android.widget.ListView;



public class LevelsActivity extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_levels);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


    }

    public void twoByTwo(View view) {

        EditText MessageView = (EditText)findViewById(R.id.playerName);
        String messageText = MessageView.getText().toString();
        Intent i = new Intent(this, LauncherActivity.class);
        i.putExtra("username", messageText);
        startActivity(i);

        CharSequence text = "You have Selected 2X2 Puzzle Please select your favourit picture!";
        int duration = Toast.LENGTH_SHORT;
        Toast toast = Toast.makeText(this, text, duration);
        toast.show();
    }

    public void threeByThree(View view) {
        EditText MessageView = (EditText)findViewById(R.id.playerName);
        String messageText = MessageView.getText().toString();
        Intent i = new Intent(this, threebyimageActivity.class);
        i.putExtra("username", messageText);
        startActivity(i);
        CharSequence text = "You have Selected 3X3 Puzzle Please select your favourit picture!";
        int duration = Toast.LENGTH_SHORT;
        Toast toast = Toast.makeText(this, text, duration);
        toast.show();
    }

    public void fourByFour(View view) {
        EditText MessageView = (EditText)findViewById(R.id.playerName);
        String messageText = MessageView.getText().toString();
        Intent i = new Intent(this, fourbyFourActivity.class);
        i.putExtra("username", messageText);
        startActivity(i);
        CharSequence text = "You have Selected 4X4 Puzzle Please select your favourit picture!";
        int duration = Toast.LENGTH_SHORT;
        Toast toast = Toast.makeText(this, text, duration);
        toast.show();
    }
}