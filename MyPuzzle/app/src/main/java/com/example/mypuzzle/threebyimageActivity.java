package com.example.mypuzzle;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

public class threebyimageActivity extends AppCompatActivity {

    public static final String Extra_message ="message";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_threebyimage);

        //DISPLAY WELCOME MESSAGE WITH THE NAME
        Intent i =getIntent();
        String MessageText =i.getStringExtra("username");
        TextView messageView =(TextView)findViewById(R.id.NameTextView);
        messageView.setText("Welcome: "+MessageText +" please Select a image");
    }
    public void donald(View view)
    {
        Intent i = getIntent();
        String MessageText = i.getStringExtra("username");
        Intent intent = new Intent(this, donaldthreeActivity.class);
        intent.putExtra("playername", MessageText);
        startActivity(intent);

        CharSequence text = "You have Selected Donald Duck!";
        int duration = Toast.LENGTH_SHORT;
        Toast toast = Toast.makeText(this, text, duration);
        toast.show();

    }
    public void mik(View view)
    {
        Intent i = getIntent();
        String MessageText = i.getStringExtra("username");
        Intent intent = new Intent(this, donaldthreeActivity.class);
        intent.putExtra("playername", MessageText);
        startActivity(intent);
        CharSequence text = "You have Selected MICKY MOUSE!";
        int duration = Toast.LENGTH_SHORT;
        Toast toast = Toast.makeText(this, text, duration);
        toast.show();
    }
    public void pop(View view)
    {
        Intent i = getIntent();
        String MessageText = i.getStringExtra("username");
        Intent intent = new Intent(this, threepopActivity.class);
        intent.putExtra("playername", MessageText);
        startActivity(intent);
        CharSequence text = "You have Selected MICKY MOUSE!";
        int duration = Toast.LENGTH_SHORT;
        Toast toast = Toast.makeText(this, text, duration);
        toast.show();

    }

}
