package com.project.qrsample;

import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class LogInActivity extends AppCompatActivity {
Button b;
EditText ed1,ed2;
String rslt,uid,pwd;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_log_in);
        b=(Button)findViewById(R.id.loginbut);
ed1=(EditText)findViewById(R.id.customerId);
ed2=(EditText)findViewById(R.id.customerPass);

        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
//                Intent intent=new Intent(getApplicationContext(),FingerprintActivity.class);
//                startActivity(intent);
                uid=ed1.getText().toString();
                pwd=ed2.getText().toString();
                callApi();
            }
        });
    }

    private void callApi() {

        StringRequest stringRequest = new StringRequest(Request.Method.POST, Constants.ApiLink,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            Log.d("res",response);
//                            Toast.makeText(getApplicationContext(),"response"+response,Toast.LENGTH_LONG).show();

                            JSONObject obj = new JSONObject(response);
                            rslt = obj.getString("status");

                            if(rslt.equals("ok"))
                            {
                                JSONObject jsonObject = new JSONObject(response);




                                JSONArray jsonArray = jsonObject.getJSONArray("data");
                                for (int i = 0; i < jsonArray.length(); i++) {

                                    JSONObject object = jsonArray.getJSONObject(i);
                                    String UserId = object.getString("id").trim();
                                    Toast.makeText(getApplicationContext(),"UserId"+uid,Toast.LENGTH_LONG).show();
                                    Intent intent = new Intent(getApplicationContext(), DecoderActivity.class);
                                    SharedPreferences.Editor editor = getSharedPreferences("Login", MODE_PRIVATE).edit();

                                    editor.putString("uid", UserId);
                                    editor.commit();
                                    startActivity(intent);

                                }





                            }
                            else {
                                Toast.makeText(getApplicationContext(), "Invalid Credentials", Toast.LENGTH_LONG).show();

                            }
                        } catch (JSONException e) {
                            Toast.makeText(getApplicationContext(), "Exception"+e.toString(), Toast.LENGTH_LONG).show();
                        }

                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {



            }
        }
        ) {
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String, String> params = new HashMap<>();
                params.put("custid", uid);
                params.put("pass", pwd);
                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
        requestQueue.add(stringRequest);
    }
}
