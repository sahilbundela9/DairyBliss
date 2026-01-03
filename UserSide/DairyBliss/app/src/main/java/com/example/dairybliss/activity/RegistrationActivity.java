package com.example.dairybliss.activity;

import android.app.Activity;
import android.content.Intent;
import android.graphics.Paint;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.core.content.ContextCompat;

import com.example.dairybliss.R;
import com.example.dairybliss.utlis.ConstantData;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

import okhttp3.MediaType;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

public class RegistrationActivity extends Activity {

    EditText etEmail,etMobno,etPassword,etCpassword,etUser;
    String email,password,monileno,username;
    Button btnRegi;
    TextView tvSign;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registration);

        Window window = this.getWindow();
        window.clearFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);
        window.setStatusBarColor(ContextCompat.getColor(this,R.color.color_secondary));


        etEmail=findViewById(R.id.etEmail);
        etUser=findViewById(R.id.etUser);
        etMobno=findViewById(R.id.etMobno);
        etPassword=findViewById(R.id.etPassword);
        etCpassword=findViewById(R.id.etCpassword);
        btnRegi=findViewById(R.id.btnRegi);
        tvSign=findViewById(R.id.tvSign);

        tvSign.setPaintFlags(tvSign.getPaintFlags() | Paint.UNDERLINE_TEXT_FLAG);

        tvSign.setOnClickListener(v -> {
            String name=tvSign.getText().toString().trim();
            Intent I1= new Intent(this, LoginActivity.class);
            startActivity(I1);
        });

        btnRegi.setOnClickListener(v -> {
            email=etEmail.getText().toString();
             monileno=etMobno.getText().toString();
             password=etPassword.getText().toString();
             username=etUser.getText().toString();
            String cpass=etCpassword.getText().toString();
            if (TextUtils.isEmpty(email)){
                etEmail.setError("Required *");
                Toast.makeText(this, "Please Enter Email", Toast.LENGTH_SHORT).show();
            } else if (TextUtils.isEmpty(monileno)) {
                etEmail.setError("Required *");
                Toast.makeText(this, "Please Enter Mobile No", Toast.LENGTH_SHORT).show();
            }
            else if (TextUtils.isEmpty(password)) {
                etPassword.setError("Required *");
                Toast.makeText(this, "Please Enter Password", Toast.LENGTH_SHORT).show();
            }
            else if (TextUtils.isEmpty(cpass)) {
                etCpassword.setError("Required *");
                Toast.makeText(this, "Please Enter Confirm Password", Toast.LENGTH_SHORT).show();
            } else if (monileno.length()!=10) {
                Toast.makeText(this, "Please Enter Valid Mobile No", Toast.LENGTH_SHORT).show();

            } else {
                generateOTP(monileno);
            }
        });
    }

    public void generateOTP(String mobileno) {
        ExecutorService executor = Executors.newSingleThreadExecutor(); // Run in background thread
        executor.execute(() -> {
            OkHttpClient client = new OkHttpClient.Builder().build();
            MediaType mediaType = MediaType.parse("text/plain");
            RequestBody body = RequestBody.create(mediaType, "");

            Request request = new Request.Builder()
                    .url("https://cpaas.messagecentral.com/verification/v3/send?countryCode=91&customerId="+ConstantData.CUSTOMER_ID+"&flowType=SMS&mobileNumber=" + mobileno)
                    .method("POST", body)
                    .addHeader("authToken", ConstantData.AUTH_TOKEN)
                    .build();

            try {
                Response response = client.newCall(request).execute();
                if (response.isSuccessful() && response.body() != null) {
                    String responseBody = response.body().string();

                    JSONObject jsonResponse = new JSONObject(responseBody);

                    // Extract verificationId from the response
                    JSONObject data = jsonResponse.getJSONObject("data");
                    String verificationId = data.getString("verificationId");

                    // Send data to OTPActivity
                    runOnUiThread(() -> {
                        Intent intent = new Intent(RegistrationActivity.this, OtpActivity.class);
                        intent.putExtra("mobileno", mobileno);
                        intent.putExtra("username", username);
                        intent.putExtra("password", password);
                        intent.putExtra("email", email);
                        intent.putExtra("verificationId", verificationId); // Pass verificationId
                        startActivity(intent);
                    });
                } else {
                    runOnUiThread(() -> Toast.makeText(RegistrationActivity.this, "OTP request failed", Toast.LENGTH_SHORT).show());
                }
            } catch (IOException | JSONException e) {
                Log.e("ERROR", e.getLocalizedMessage());
                runOnUiThread(() -> Toast.makeText(RegistrationActivity.this, "Network error! Try again.", Toast.LENGTH_SHORT).show());
            }
        });
    }
}