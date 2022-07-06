package com.project.qrsample;

import android.Manifest;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.graphics.PointF;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.v4.app.ActivityCompat;
import android.telephony.TelephonyManager;
import android.util.Log;
import android.view.animation.Animation;
import android.view.animation.LinearInterpolator;
import android.view.animation.TranslateAnimation;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.dlazaro66.qrcodereaderview.QRCodeReaderView;
import com.dlazaro66.qrcodereaderview.QRCodeReaderView.OnQRCodeReadListener;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.params.BasicHttpParams;
import org.apache.http.params.HttpConnectionParams;
import org.apache.http.params.HttpParams;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class DecoderActivity extends Activity implements OnQRCodeReadListener {

	private TextView myTextView;
	private QRCodeReaderView mydecoderview;
	private ImageView line_image;
	String rimei, rotp;
	private static final int REQUEST_CODE = 101;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_decoder);

		mydecoderview = (QRCodeReaderView) findViewById(R.id.qrdecoderview);
		mydecoderview.setOnQRCodeReadListener(this);

		myTextView = (TextView) findViewById(R.id.exampleTextView);

		line_image = (ImageView) findViewById(R.id.red_line_image);


		TranslateAnimation mAnimation = new TranslateAnimation(
				TranslateAnimation.ABSOLUTE, 0f,
				TranslateAnimation.ABSOLUTE, 0f,
				TranslateAnimation.RELATIVE_TO_PARENT, 0f,
				TranslateAnimation.RELATIVE_TO_PARENT, 0.5f);
		mAnimation.setDuration(1000);
		mAnimation.setRepeatCount(-1);
		// Use this function to enable/disable decoding
		mydecoderview.setQRDecodingEnabled(true);
		mAnimation.setRepeatMode(Animation.REVERSE);
		mAnimation.setInterpolator(new LinearInterpolator());
		line_image.setAnimation(mAnimation);

	}


	@Override
	public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
		switch (requestCode) {
			case REQUEST_CODE: {
				if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
					Toast.makeText(this, "Permission granted.", Toast.LENGTH_SHORT).show();
				} else {
					Toast.makeText(this, "Permission denied.", Toast.LENGTH_SHORT).show();
				}
			}
		}

	}

	// Called when a QR is decoded
	// "text" : the text encoded in QR
	// "points" : points where QR control points are placed
	@Override
	public void onQRCodeRead(String text, PointF[] points) {
		if (text.isEmpty() || text == null) {
			myTextView.setText("Failed");

		} else {
			myTextView.setText("successfully scanned qr-code");

			TelephonyManager tm = (TelephonyManager) getApplicationContext().getSystemService(getApplicationContext().TELEPHONY_SERVICE);
			if (ActivityCompat.checkSelfPermission(DecoderActivity.this, Manifest.permission.READ_PHONE_STATE) != PackageManager.PERMISSION_GRANTED) {
				ActivityCompat.requestPermissions(DecoderActivity.this, new String[]{Manifest.permission.READ_PHONE_STATE}, REQUEST_CODE);
				return;
			}
			String imei = tm.getDeviceId();


			rimei=text.substring(4, text.length());
			rotp=text.substring(0,4);
			Log.i(imei+"IMEI"+rotp, "IMEI"+rimei);
//			Log.d("DeviceIMEI",imei);
			imei="357403136868960";
			Log.d("DeviceIMEI FROM SERVER",rimei);
			if(imei.equalsIgnoreCase(rimei)){

       // new transaction().execute();

        callApi();


				myTextView.setText("IMEI Verified successfully");
			}else{
				myTextView.setText("IMEI Not Matching");
			}



				}
	}

	private void callApi() {

		StringRequest stringRequest = new StringRequest(Request.Method.POST, Constants.ip,
				new Response.Listener<String>() {
					@Override
					public void onResponse(String response) {
						try {
							Log.d("res",response);
//                            Toast.makeText(getApplicationContext(),"response"+response,Toast.LENGTH_LONG).show();

							JSONObject obj = new JSONObject(response);
							String rslt = obj.getString("status");

							if(rslt.equals("ok"))
							{

								Toast.makeText(getApplicationContext(), "Updated Succesfully", Toast.LENGTH_LONG).show();



							}
							else {
								Toast.makeText(getApplicationContext(), "Failed to Update", Toast.LENGTH_LONG).show();

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
				params.put("resotp", rotp);

				return params;
			}
		};
		RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
		requestQueue.add(stringRequest);
	}

	// Called when your device have no camera
	
    
	@Override
	protected void onResume() {
		super.onResume();
		mydecoderview.startCamera();
	}
	
	@Override
	protected void onPause() {
		super.onPause();
		mydecoderview.stopCamera();
	}



	public class transaction extends AsyncTask<String, String, String> {
		InputStream is = null;
		String result = null;
		String line = null;

		@Override
		protected String doInBackground(String... arg) {


			List<NameValuePair> params = new ArrayList<NameValuePair>();
				params.add(new BasicNameValuePair("resotp",rotp ));


			String stat = null;
String URl=Constants.ip+"resultFromApp.php";


			try {

				HttpParams httpParameters = new BasicHttpParams();

				int timeoutConnection = 10000;
				HttpConnectionParams.setConnectionTimeout(httpParameters,
						timeoutConnection);

				int timeoutSocket = 10000;
				HttpConnectionParams
						.setSoTimeout(httpParameters, timeoutSocket);

				DefaultHttpClient httpClient = new DefaultHttpClient();

				HttpPost httpPost = new HttpPost(URl);
				httpPost.setEntity(new UrlEncodedFormEntity(params));

				HttpResponse httpResponse = httpClient.execute(httpPost);
				HttpEntity httpEntity = httpResponse.getEntity();
				is = httpEntity.getContent();
				BufferedReader reader = new BufferedReader(
						new InputStreamReader(is, "iso-8859-1"), 8);
				StringBuilder sb = new StringBuilder();
				while ((line = reader.readLine()) != null) {
					sb.append(line + "\n");
				}
				is.close();
				result = sb.toString();
				Log.e(" PRINT RESULT", result + "");

			} catch (final ClientProtocolException e) {

				e.printStackTrace();

			} catch (final IllegalStateException e) {

				e.printStackTrace();

			} catch (final UnsupportedEncodingException e) {

				e.printStackTrace();

			} catch (final IOException e) {

				e.printStackTrace();

			}

			return result;
		}

		@Override
		protected void onPreExecute() {
			super.onPreExecute();
		}

		@Override
		protected void onPostExecute(String result) {

			super.onPostExecute(result);


		}

	}


}
