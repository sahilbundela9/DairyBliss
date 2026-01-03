package com.example.dairybliss.activity;

import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Log;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.content.ContextCompat;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

import com.example.dairybliss.R;
import com.example.dairybliss.api.Login_Register_Api;
import com.example.dairybliss.utlis.ConstantData;

import java.io.IOException;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

import okhttp3.MediaType;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

public class OtpActivity extends AppCompatActivity {

    Button btnverify;
    EditText otp1, otp2, otp3, otp4;
    String username, password, email, mobileno, verificationId;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_otp);
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });

        Window window = this.getWindow();
        window.clearFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);
        window.setStatusBarColor(ContextCompat.getColor(this,R.color.color_secondary));


        username = getIntent().getStringExtra("username");
        password = getIntent().getStringExtra("password");
        email = getIntent().getStringExtra("email");
        mobileno = getIntent().getStringExtra("mobileno");
        verificationId = getIntent().getStringExtra("verificationId");  // Ensure this is received

        btnverify=findViewById(R.id.btnverify);
        otp1 =findViewById(R.id.otp1);
        otp2 =findViewById(R.id.otp2);
        otp3 =findViewById(R.id.otp3);
        otp4 =findViewById(R.id.otp4);

        etSwitcher();

        btnverify.setOnClickListener(v -> {
            if(isOtpValid()){
                String codde=getOtp();
                verifyOTP(codde);
            }
        });


    }

    private boolean isOtpValid() {
        return !(otp1.getText().toString().trim().isEmpty() ||
                otp2.getText().toString().trim().isEmpty() ||
                otp3.getText().toString().trim().isEmpty() ||
                otp4.getText().toString().trim().isEmpty());
    }

    private String getOtp() {
        return otp1.getText().toString() +
                otp2.getText().toString() +
                otp3.getText().toString() +
                otp4.getText().toString();
    }

    public void verifyOTP(String code) {
        if (verificationId == null || verificationId.isEmpty()) {
            Toast.makeText(this, "Verification ID missing!", Toast.LENGTH_SHORT).show();
            return;
        }

        ExecutorService executor = Executors.newSingleThreadExecutor();
        executor.execute(() -> {
            OkHttpClient client = new OkHttpClient.Builder().build();
            MediaType mediaType = MediaType.parse("text/plain");
            RequestBody body = RequestBody.create(mediaType, "");

            Request request = new Request.Builder()
                    .url("https://cpaas.messagecentral.com/verification/v3/validateOtp?countryCode=91&mobileNumber=" +
                            mobileno + "&verificationId=" + verificationId + "&customerId="+ ConstantData.CUSTOMER_ID +"&code=" + code)
                    .method("GET", null)  // GET requests shouldn't have a body
                    .addHeader("authToken",ConstantData.AUTH_TOKEN )
                    .build();

            try {
                Response response = client.newCall(request).execute();
                if (response.isSuccessful()) {
                    runOnUiThread(() -> {
                        Toast.makeText(OtpActivity.this, "Verification successful", Toast.LENGTH_SHORT).show();
                        //pending register api
                        new Login_Register_Api().register(OtpActivity.this,username,password,email,mobileno);

                    });
                } else {
                    runOnUiThread(() -> Toast.makeText(OtpActivity.this, "Invalid OTP. Try again!", Toast.LENGTH_SHORT).show());
                }
            } catch (IOException e) {
                Log.e("ERROR", e.getLocalizedMessage());
                runOnUiThread(() -> Toast.makeText(OtpActivity.this, "Network error! Try again.", Toast.LENGTH_SHORT).show());
            }
        });
    }

    public void etSwitcher() {
        otp1.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {

            }

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {

            }

            @Override
            public void afterTextChanged(Editable s) {
                otp2.requestFocus();
            }
        });

        otp2.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {

            }

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {

            }

            @Override
            public void afterTextChanged(Editable s) {
                otp3.requestFocus();
            }
        });

        otp3.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {

            }

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {

            }

            @Override
            public void afterTextChanged(Editable s) {
                otp4.requestFocus();
            }
        });
    }
}