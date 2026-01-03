package com.example.dairybliss;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.example.dairybliss.activity.CartActivity;
import com.example.dairybliss.activity.LoginActivity;
import com.example.dairybliss.adapter.OrderAdapter;
import com.example.dairybliss.adapter.OrderHistoryAdapter;
import com.example.dairybliss.api.OrderApi;
import com.example.dairybliss.model.OrderModel;
import com.example.dairybliss.model.OrderOutputModel;
import com.example.dairybliss.utlis.ConstantData;

public class OrderhistoryActivity extends AppCompatActivity {

    RecyclerView rcy_orderhistory;
    OrderHistoryAdapter orderAdapter;
    @SuppressLint("MissingInflatedId")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_orderhistory);
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });

        rcy_orderhistory=findViewById(R.id.rcy_orderhistory);
        SharedPreferences sp=getSharedPreferences(ConstantData.SP_NAME,MODE_PRIVATE);

        String uid=sp.getString(ConstantData.KEY_USER_ID,"0");
        if(uid.equals("0")){
            Intent intent=new Intent(this, LoginActivity.class);
            startActivity(intent);
            finish();
        }else {
            new OrderApi().order_his(this,uid);

        }
    }

    public void setCart(OrderOutputModel model){

        rcy_orderhistory.setLayoutManager(new LinearLayoutManager(OrderhistoryActivity.this));
         orderAdapter=new OrderHistoryAdapter(model.getOrder(),this);
         rcy_orderhistory.setAdapter(orderAdapter);
    }

}