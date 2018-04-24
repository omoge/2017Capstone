package com.example.gina.capdb;

import android.content.Context;
import android.os.AsyncTask;
import android.widget.Toast;

import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

import javax.net.ssl.HttpsURLConnection;

/**
 * Created by Gina on 11/15/2017.
 */

public class BackgroundTask extends AsyncTask<String, Void, String> {
    Context ctx;
    BackgroundTask(Context ctx){
        this.ctx=ctx;

    }
    @Override

    protected void onPreExecute(){
        super.onPreExecute();

    }

    protected String doInBackground(String... params) {
        String reg_url="http://10.0.2.2:8080/register.php";
        String login_url="http://10.0.2.2:8080/login.php";
        String method=params[0];
        if (method.equals("register"))
        {
            String name=params[1];
            String user_name=params[2];
            String user_pass=params[3];
            try {
                URL url=new URL(reg_url);
                HttpsURLConnection httpsURLConnection= (HttpsURLConnection)url.openConnection();
                httpsURLConnection.setRequestMethod("POST");
                httpsURLConnection.setDoInput(true);
                OutputStream OS = httpsURLConnection.getOutputStream();
                BufferedWriter bufferedWriter= new BufferedWriter(new OutputStreamWriter(OS,"UTF-8"));
          String data= URLEncoder.encode("user","UTF-8")+"="+URLEncoder.encode(name, "UTF-8")+" & "+
                  URLEncoder.encode("user_name","UTF-8")+"="+URLEncoder.encode(user_name, "UTF-8")+" & "+
                  URLEncoder.encode("user_pass","UTF-8")+"="+URLEncoder.encode(user_pass, "UTF-8");
                bufferedWriter.write(data);
                bufferedWriter.flush();
                bufferedWriter.close();
                InputStream IS= httpsURLConnection.getInputStream();
                IS.close();
                return "Registration Success...";

            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }


        }



        return null;
    }

    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }

    @Override
    protected void onPostExecute(String result) {
        Toast.makeText(ctx,result,Toast.LENGTH_LONG).show();
    }
}
