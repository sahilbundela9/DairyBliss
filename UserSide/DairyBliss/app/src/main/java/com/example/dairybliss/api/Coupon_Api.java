package com.example.dairybliss.api;

import android.app.ProgressDialog;
import android.content.Context;
import android.util.Log;
import android.widget.Toast;

import androidx.annotation.Nullable;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.dairybliss.activity.CartActivity;
import com.example.dairybliss.model.CouponOutputModel;
import com.example.dairybliss.utlis.ConstantData;
import com.google.gson.Gson;

import java.util.HashMap;
import java.util.Map;

public class Coupon_Api {
    public void applyCoupon(Context context,String code){
        ProgressDialog dialog=new ProgressDialog(context);
        dialog.setMessage("loading...");
        dialog.show();
        RequestQueue queue=Volley.newRequestQueue(context);
        StringRequest request=new StringRequest(
                Request.Method.POST,
                ConstantData.APPLY_COUPON_METHOD,
                response -> {
                    CouponOutputModel c=new Gson().fromJson(response, CouponOutputModel.class);
                    if(c.isStatus()){
                        dialog.dismiss();
                        ((CartActivity)context).setCoupon((c));
                    }else{
                        Toast.makeText(context, "Invalid Coupon Code", Toast.LENGTH_SHORT).show();
                    }
                },
                error -> {
                    dialog.dismiss();
                    Toast.makeText(context, "SERVER ERROR"+error, Toast.LENGTH_SHORT).show();
                    Log.e("APPLY COUPON ERROR",error.toString());
                }
        ){
            @Nullable
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String,String> map=new HashMap<>();
                map.put("code",code);
                return map;
            }
        };
        queue.add(request);
    }
    public void apply_coupon(Context context,String code){
//        CustomProgressDialog dialog=new CustomProgressDialog(context);
//        dialog.dismiss();
        String url= ConstantData.APPLY_COUPON_METHOD;
        RequestQueue requestQueue= Volley.newRequestQueue(context);
        StringRequest stringRequest=new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                //dialog.dismiss();
                CouponOutputModel p= new Gson().fromJson(response,CouponOutputModel.class);
                if(p.status){
                    Toast.makeText(context, p.getMessage(), Toast.LENGTH_SHORT).show();

                    ((CartActivity)context).setcoupon(p);

                }else{
                    Toast.makeText(context, p.getMessage(), Toast.LENGTH_SHORT).show();
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError volleyError) {
                //dialog.dismiss();
                Toast.makeText(context, "error:"+volleyError.toString(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Nullable
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String,String> map=new HashMap<>();
                map.put("code",code);
                return map;
            }
        };
        requestQueue.add(stringRequest);

    }
}