package com.example.mypuzzle;

import android.content.Intent;
import android.database.Cursor;
import android.media.MediaPlayer;
import android.os.CountDownTimer;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import java.util.Arrays;
import java.util.Random;
import java.util.Timer;
import java.util.TimerTask;

public class threebythreeActivity extends AppCompatActivity {
    private final int NO_OF_PIECES = 9;
    private final String BUTTON_NAME_PREFIX = "btnt";
    int time_to_solve_puzzle = 1;
    private MediaPlayer mp;

    //an array of buttons
    Button[] btnt = new Button[NO_OF_PIECES];

    //correct sequence of IDs of buttons
    int[] correct_id_seq = new int[NO_OF_PIECES];

    /*this array is the working array.
      Its element's values are similar to correct_id_seq[] except diff locations*/
    int[] rand_id_seq = new int[NO_OF_PIECES];

    //array to keep 2 indexes of 2 elements in the array rand_id_seq from 2 clicks
    int two_indexes_to_swap_img[] = {-1, -1};

    int num_of_clicks = 0; //need 2 clicks to swap images

    Button two_buttons_to_swap[] = {null, null};

    TextView timeTextView;

    Timer T;
DBHelper myDB;


    public void rand_arr_elements(int[] arr) {
        Random random = new Random();
        int temp_index;
        int temp_obj;
        for (int i = 0; i < arr.length - 1; i++) {
            //a random number between i+1 and arr.length - 1
            temp_index = i + 1 + random.nextInt(arr.length - 1 - i);
            //swap the element at i with the element at temp_index
            temp_obj = arr[i];
            arr[i] = arr[temp_index];
            arr[temp_index] = temp_obj;
        }
    }
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_threebythree);
        timeTextView = (TextView) findViewById(R.id.timeTextView);
        myDB = new DBHelper(this);
        test_db();


        // get buttons
        for(int i = 0; i < NO_OF_PIECES; i++) {
            btnt[i] = (Button) findViewById(this.getResources().getIdentifier(
                    BUTTON_NAME_PREFIX + Integer.toString(i), "id", this.getPackageName()));
        }
        //first puzzle
        play_game(5, "am");

    }

    public void play_game(int perusal_time_by_seconds, String image_name) {

        //set the values for the correct_id_seq array
        for(int i = 0; i < NO_OF_PIECES; i++){
            correct_id_seq[i] = this.getResources().getIdentifier(image_name
                    + Integer.toString(i),"drawable", this.getPackageName());
        }

        // based on the values of correct_id_seq, set the button background
        for(int i = 0; i < NO_OF_PIECES; i++){
            btnt[i].setBackgroundResource(correct_id_seq[i]);
        }

        for(int i = 0; i < NO_OF_PIECES; i++){
            btnt[i].setClickable(false);
        }

        //display image in an amount of perusal_time_by_seconds
        new CountDownTimer(perusal_time_by_seconds * 1000, 1000){
            @Override
            public void onTick(long millisUntilFinished) {
                timeTextView.setText("TIME: " + Long.toString(millisUntilFinished/1000));
            }
            @Override
            public void onFinish() {

                for(int i = 0; i < NO_OF_PIECES; i++){
                    btnt[i].setClickable(true);
                }
                make_puzzle_with_time_tick();
            }
        }.start();
    }


    public void make_puzzle_with_time_tick(){
        //construct rand_id_seq array, firstly, start with the correct sequence of ids
        rand_id_seq = Arrays.copyOf(correct_id_seq, correct_id_seq.length);

        //and then call the function rand_arr_elements to randomly swap elements
        //call 2 times for better results
        rand_arr_elements(rand_id_seq); rand_arr_elements(rand_id_seq);

        // based on the values of rand_id_seq, set the buttons' background
        for(int i = 0; i < NO_OF_PIECES; i++){
            btnt[i].setBackgroundResource(rand_id_seq[i]);
        }

        //counting time by seconds
        time_to_solve_puzzle = -1;
        T = new Timer();
        T.scheduleAtFixedRate(new TimerTask() {
            @Override
            public void run() {
                runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        time_to_solve_puzzle++;
                        timeTextView.setText("TIME: " + time_to_solve_puzzle);
                    }
                });
            }
        }, 1000, 1000);
    }


    public void on_click_image(View v){
        Button button = (Button)v;

        //value of temp similar to com.jc165984.puzzle:id/btnt0
        String temp_str = button.getResources().getResourceName(button.getId());

        // "id/" + BUTTON_NAME_PREFIX = "id/btnt"
        int id_pos = temp_str.indexOf("id/" + BUTTON_NAME_PREFIX);

        //get the button's index.For example, id/btnt0 has index 0
        int index = Integer.parseInt(temp_str.substring(id_pos +
                ("id/" + BUTTON_NAME_PREFIX).length()));

        two_indexes_to_swap_img[num_of_clicks] = index;
        two_buttons_to_swap[num_of_clicks] = button;

        if (num_of_clicks == 1) {
            //2 clicks already - swap images now
            two_buttons_to_swap[0].setBackgroundResource(rand_id_seq[two_indexes_to_swap_img[1]]);
            two_buttons_to_swap[1].setBackgroundResource(rand_id_seq[two_indexes_to_swap_img[0]]);
            //update the rand_id_seq array
            int temp = rand_id_seq[two_indexes_to_swap_img[0]];
            rand_id_seq[two_indexes_to_swap_img[0]] = rand_id_seq[two_indexes_to_swap_img[1]];
            rand_id_seq[two_indexes_to_swap_img[1]] = temp;

            //check if the 2 array rand_id_seq and correct_id_seq are equal
            //if it is then the user wins
            if (Arrays.equals(correct_id_seq, rand_id_seq)) {
                if (T != null)
                    T.cancel();
                Log.i("Time = ", Integer.toString(time_to_solve_puzzle));
                for(int i = 0; i < NO_OF_PIECES; i++){
                    btnt[i].setClickable(false);
                    CharSequence text = "congratulations you Won in : "+time_to_solve_puzzle+ "Seconds Try Again to Improve the time"; int duration = Toast.LENGTH_LONG;
                    Toast toast = Toast.makeText(this, text, duration); toast.show();
                }

                if(mp != null) mp.release();
                mp = MediaPlayer.create(getApplicationContext(), R.raw.h);
                mp.start();
                CharSequence text = "Amanda Eli lee";
                int duration = Toast.LENGTH_SHORT;
                Toast toast = Toast.makeText(this, text, duration);
                toast.show();
            }
        }
        num_of_clicks++;

        if (num_of_clicks == 2)
            num_of_clicks = 0;
    }





    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);

    }

    private void test_db(){
        Intent intent =getIntent();
        String MessageText =intent.getStringExtra("playername");


        myDB.insertPlayer(MessageText, 40, 1, "am");


        Cursor cursor = myDB.getAllPlayers();

        if(cursor !=null){
            cursor.moveToFirst();
            do{
                String username =
                        cursor.getString(cursor.getColumnIndex(DBHelper.USERNAME_COL));
                String duration =
                        cursor.getString(cursor.getColumnIndex(DBHelper.DURATION_COL));
                String level =
                        cursor.getString(cursor.getColumnIndex(DBHelper.LEVEL_COL));
                String date =
                        cursor.getString(cursor.getColumnIndex(DBHelper.DATE_COL));
                String image =
                        cursor.getString(cursor.getColumnIndex(DBHelper.IMAGE_NAME_COL));
                Log.i("Player:", username + " "
                        + duration  + " "
                        + level + " "
                        + date + " "
                        + image);

            } while (cursor.moveToNext());

        }
    }

}



