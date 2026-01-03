package com.example.dairybliss.activity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.example.dairybliss.R;
import com.example.dairybliss.adapter.OrderAdapter;
import com.example.dairybliss.api.Coupon_Api;
import com.example.dairybliss.api.Coupon_Api;
import com.example.dairybliss.api.OrderApi;
import com.example.dairybliss.model.CouponModel;
import com.example.dairybliss.model.CouponOutputModel;
import com.example.dairybliss.model.OrderModel;
import com.example.dairybliss.model.OrderOutputModel;
import com.example.dairybliss.utlis.ConstantData;
import com.google.android.material.bottomsheet.BottomSheetDialog;
import com.google.android.material.textfield.TextInputEditText;

import java.util.ArrayList;
import com.razorpay.Checkout;
import com.razorpay.PaymentResultListener;

import org.json.JSONException;
import org.json.JSONObject;

public class CartActivity extends AppCompatActivity implements PaymentResultListener{

    TextView tvCouponOffer;
    RecyclerView CartRecycler;
    TextView tvChangeAddress,tvaddress,tvitem_total,tvtotal;
    LinearLayout main;
    String address="";
    TextInputEditText t1,t2,t3,t4,t5,t6;
    String c_o="cash",c_code="none";
    double c_discount=0.0;
    RadioGroup rdbPayment;


    RadioButton rbtnCOD,rbtnOnline;
    Button btnSaveAddress,btnCheckout;
    TextView tvallcoupon;
    String uid="0";
    Button applyoffer;
    TextInputEditText etCode;
    ArrayList<CouponModel> couponModels;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_cart);
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });

        couponModels= (ArrayList<CouponModel>) getIntent().getSerializableExtra("coupon");
        CartRecycler=findViewById(R.id.rcylCart);
        applyoffer=findViewById(R.id.applyoffer);
        etCode=findViewById(R.id.etCode);
        tvCouponOffer=findViewById(R.id.tvCouponOffer);


        applyoffer.setOnClickListener(v->{
            String code=etCode.getText().toString();
            if(code.trim().length()==0){
                Toast.makeText(this, "Please enter coupon code", Toast.LENGTH_SHORT).show();
            }else{
                new Coupon_Api().applyCoupon(CartActivity.this,code);
            }
        });

        SharedPreferences sp=getSharedPreferences(ConstantData.SP_NAME,MODE_PRIVATE);
        uid=sp.getString(ConstantData.KEY_USER_ID,"0");
        if(uid.equals("0")){
            Intent intent=new Intent(CartActivity.this,LoginActivity.class);
            startActivity(intent);
        }else{
            OrderModel model=new OrderModel();
            model.setUid(uid);
            model.setStatus("0");
            new OrderApi().getOrder(this,model);
        }



        tvtotal=findViewById(R.id.tvtotal);
        rbtnCOD=findViewById(R.id.rbtnCOD);
        rbtnOnline=findViewById(R.id.rbtnOnline);
        tvChangeAddress=findViewById(R.id.tvChangeAddress);
        tvaddress=findViewById(R.id.address);
        tvitem_total=findViewById(R.id.tvitem_total);

        final BottomSheetDialog bottomSheetTeachersDialog = new BottomSheetDialog(CartActivity.this);

        View layout = LayoutInflater.from(CartActivity.this).inflate(R.layout.address,null);

        // passing our layout file to our bottom sheet dialog.
        bottomSheetTeachersDialog.setContentView(layout);
        t1=layout.findViewById(R.id.t1);
        t2=layout.findViewById(R.id.t2);
        t3=layout.findViewById(R.id.t3);
        t4=layout.findViewById(R.id.t4);
        t5=layout.findViewById(R.id.t5);
        t6=layout.findViewById(R.id.t6);
        btnSaveAddress=layout.findViewById(R.id.btnSaveAddress);

        bottomSheetTeachersDialog.setCancelable(false);

        bottomSheetTeachersDialog.setCanceledOnTouchOutside(true);
        btnSaveAddress.setOnClickListener(v -> {
            if (t1.getText().toString().trim().length()==0){
                Toast.makeText(this, "Please Enter HouseNo.", Toast.LENGTH_SHORT).show();
            } else if (t2.getText().toString().trim().length()==0) {
                Toast.makeText(this, "Please Enter Address.", Toast.LENGTH_SHORT).show();
            } else if (t3.getText().toString().trim().length()==0) {
                Toast.makeText(this, "Please Enter City.", Toast.LENGTH_SHORT).show();
            } else if (t4.getText().toString().trim().length()==0) {
                Toast.makeText(this, "Please Enter State.", Toast.LENGTH_SHORT).show();
            } else if (t5.getText().toString().trim().length()==0) {
                Toast.makeText(this, "Please Enter Pincode.", Toast.LENGTH_SHORT).show();
            } else if (t6.getText().toString().trim().length()!=6) {
                Toast.makeText(this, "Please Enter Valid Pincode.", Toast.LENGTH_SHORT).show();
            }else {
                address = t1.getText().toString() + "," + t2.getText().toString() + "," + t3.getText().toString()
                        + "," + t4.getText().toString() + "," + t5.getText().toString() + "," + t6.getText().toString();
                tvaddress.setText(address);
                bottomSheetTeachersDialog.dismiss();
            }

        });

        tvChangeAddress.setOnClickListener(v->{

            bottomSheetTeachersDialog.show();

        });

        rdbPayment=findViewById(R.id.rdbPayment);


        btnCheckout=findViewById(R.id.btnCheckout);

        btnCheckout.setOnClickListener(v -> {
            if(rdbPayment.getCheckedRadioButtonId()==R.id.rbtnCOD){
                c_o="cash";
            }else{
                c_o="online";
            }
            if(address.trim().length()==0){
                Toast.makeText(this, "Please Enter Address", Toast.LENGTH_SHORT).show();
            }else{

                if(c_o.equals("cash")){
                    new OrderApi().confirm_order(CartActivity.this,uid,address,c_code,c_o,c_discount+"");
                }else{
                    openRazorPay();
                }
            }

        });

    }

    public void setcoupon(CouponOutputModel model){

        c_code=model.getCoupon_data().getC_code();
        c_discount=Double.parseDouble(model.getCoupon_data().getC_discount());
        tot=tot-c_discount;
        String formattedTotal = String.format("%.2f", tot);

        tvtotal.setText(formattedTotal+"");
        tvCouponOffer.setText(c_discount+"");
    }
    public void openRazorPay(){
        Checkout checkout = new Checkout();

        // set your id as below
        checkout.setKeyID("rzp_test_Qi8mCCOIlysMtE");

        // set image
        checkout.setImage(R.mipmap.ic_launcher);

        // initialize json object
        JSONObject object = new JSONObject();
        try {
            // to put name
            object.put("name", "DAIRYBLISS");

            // put description
            object.put("description", "Test payment");

            // to set theme color
            object.put("theme.color", "#7954CA");

            // put the currency
            object.put("currency", "INR");

            // put amount
            object.put("amount", Math.round(tot*100));

            // put mobile number
            object.put("prefill.contact", "9998520104");

            // put email
            object.put("prefill.email", "kushkhakhiwala123@gmail.com");

            // open razorpay to checkout activity
            checkout.open(CartActivity.this, object);
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }
    double amt=0,tot=0;

    public void setCart(OrderOutputModel model){
        amt=0;tot=0;
        for (int i=0;i<model.getOrder().size();i++){
            amt+=Double.parseDouble(String.valueOf(model.getOrder().get(i).getTot_amount()));
        }
        tot=amt + (amt*0.05);

        tvitem_total.setText(amt+"");
        String formattedTotal = String.format("%.2f", tot);

        tvtotal.setText(formattedTotal+"");

        CartRecycler.setLayoutManager(new LinearLayoutManager(CartActivity.this));
        OrderAdapter orderAdapter=new OrderAdapter(CartActivity.this, model.getOrder(), new OrderAdapter.OnItemClickListener() {
            @Override
            public void onPlusClicked(OrderModel order) {

                new OrderApi().update_order(CartActivity.this,uid,order.getId(),order.getQty(),order.getAmount());
            }

            @Override
            public void onMinusClicked(OrderModel order) {


                new OrderApi().update_order(CartActivity.this,uid,order.getId(),order.getQty(),order.getAmount());

            }

            @Override
            public void onDeleteClicked(OrderModel order) {
                new OrderApi().remove_order(CartActivity.this,uid,order.getId());

            }
        });
        CartRecycler.setAdapter(orderAdapter);
    }

    double coupon=0;
    boolean isApply=false;
    public void setCoupon(CouponOutputModel c){
        coupon=Double.parseDouble(c.getCoupon_data().getC_discount());
        tvCouponOffer.setText(String.valueOf(coupon));
        tot=tot-coupon;
        String formattedTotal = String.format("%.2f", tot);

        tvtotal.setText(formattedTotal+"");
        isApply = true;
    }

    @Override
    public void onPaymentSuccess(String s) {
        new OrderApi().confirm_order(CartActivity.this,uid,address,c_code,c_o,c_discount+"");

    }

    @Override
    public void onPaymentError(int i, String s) {
        Toast.makeText(this, "Payment Error", Toast.LENGTH_SHORT).show();
    }




}