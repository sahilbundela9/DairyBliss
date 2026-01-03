package com.example.dairybliss.activity;

import android.app.Activity;
import android.content.Intent;
import android.graphics.Paint;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.core.content.ContextCompat;

import com.example.dairybliss.R;
import com.example.dairybliss.api.Login_Register_Api;

public class LoginActivity extends Activity {

    TextView tvRegi;
    EditText etEmail,etPassword;
    Button btnLogin;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        Window window = this.getWindow();
        window.clearFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);
        window.setStatusBarColor(ContextCompat.getColor(this,R.color.color_secondary));

        etEmail=findViewById(R.id.etEmail);
        etPassword=findViewById(R.id.etPassword);
        btnLogin=findViewById(R.id.btnLogin);
        tvRegi=findViewById(R.id.tvRegi);
        tvRegi.setPaintFlags(tvRegi.getPaintFlags() | Paint.UNDERLINE_TEXT_FLAG);

        tvRegi.setOnClickListener(v -> {
            String name=tvRegi.getText().toString().trim();
            Intent I1= new Intent(this, RegistrationActivity.class);
            startActivity(I1);
        });

        btnLogin.setOnClickListener(v -> {
            String email=etEmail.getText().toString();
            String pass=etPassword.getText().toString();
            if (TextUtils.isEmpty(email)){
                etEmail.setError("Required *");
                Toast.makeText(this, "Please Enter Email", Toast.LENGTH_SHORT).show();
            } else if (TextUtils.isEmpty(pass)) {
                etPassword.setError("Required *");
                Toast.makeText(this, "Please Enter Password", Toast.LENGTH_SHORT).show();
            }
            else {
               new Login_Register_Api().Login(LoginActivity.this,pass,email);
            }

        });
    }
}