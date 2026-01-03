package com.example.dairybliss.api;

import android.content.Context;
import android.content.Intent;
import android.widget.Toast;

import androidx.annotation.Nullable;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.dairybliss.OrderhistoryActivity;
import com.example.dairybliss.activity.CartActivity;
import com.example.dairybliss.activity.HomeActivity;
import com.example.dairybliss.activity.LoginActivity;
import com.example.dairybliss.activity.ThankYouActivity;
import com.example.dairybliss.model.OrderModel;
import com.example.dairybliss.model.OrderOutputModel;
import com.example.dairybliss.model.PersonOutputModel;
import com.example.dairybliss.utlis.ConstantData;
import com.google.gson.Gson;

import java.util.HashMap;
import java.util.Map;

public class OrderApi {
    public void update_order(Context context, String uid,String id,String qty,String amount){

        RequestQueue requestQueue= Volley.newRequestQueue(context);
        StringRequest stringRequest=new StringRequest(Request.Method.POST, ConstantData.UPDATE_QTY_METHOD, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
//                Toast.makeText(context, response
//                        , Toast.LENGTH_SHORT).show();
                OrderOutputModel p= new Gson().fromJson(response,OrderOutputModel.class);
                if(p.isStatus()) {
                    if(context instanceof CartActivity){
                        Toast.makeText(context, p.getMessage(), Toast.LENGTH_SHORT).show();
                        ((CartActivity)context).setCart(p);

                    }

                }else{
                    Toast.makeText(context, p.getMessage(), Toast.LENGTH_SHORT).show();
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError volleyError) {
//                customProgressDialog.dismiss();
                Toast.makeText(context, "error:"+volleyError.getLocalizedMessage(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Nullable
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String,String> map=new HashMap<>();
                map.put("uid",uid);
                map.put("id",id);
                map.put("qty",qty);
                map.put("amount",amount);
                return map;
            }
        };
        requestQueue.add(stringRequest);
    }


    public void remove_order(Context context, String uid,String id){

        RequestQueue requestQueue= Volley.newRequestQueue(context);
        StringRequest stringRequest=new StringRequest(Request.Method.POST, ConstantData.REMOVE, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                OrderOutputModel p= new Gson().fromJson(response,OrderOutputModel.class);
                if(p.isStatus()){
                    if(context instanceof CartActivity){
                        Toast.makeText(context, p.getMessage(), Toast.LENGTH_SHORT).show();
                        ((CartActivity)context).setCart(p);

                    }

                }else{
                    Toast.makeText(context, p.getMessage(), Toast.LENGTH_SHORT).show();
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError volleyError) {
                Toast.makeText(context, "error:"+volleyError.getLocalizedMessage(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Nullable
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String,String> map=new HashMap<>();
                map.put("uid",uid);
                map.put("id",id);
                return map;
            }
        };
        requestQueue.add(stringRequest);
    }

    public void addOrder(Context context, OrderModel model)
    {
        String URL= ConstantData.ORDER_METHOD;

        RequestQueue requestQueue= Volley.newRequestQueue(context);

        StringRequest stringRequest=new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    Gson gson=new Gson();
                    OrderOutputModel p= gson.fromJson(response, OrderOutputModel.class);
                    if (p.isStatus()){
//                        ((CartActivity)context).setCart(p);
                        Intent intent=new Intent(context, CartActivity.class);
                        context.startActivity(intent);
                    }
                } catch (Exception e) {
                    Toast.makeText(context, "ERROR:"+e.toString(), Toast.LENGTH_SHORT).show();

                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(context, "SERVER ERROR", Toast.LENGTH_SHORT).show();
            }
        }){
            @Nullable
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String,String> map=new HashMap<>();
               map.put("uid",model.getUid());
               map.put("pid",model.getPid());
               map.put("pname",model.getPname());
               map.put("pic1",model.getPic1());
               map.put("amount",model.getAmount());
               map.put("tot_amount",model.getTot_amount());
               map.put("c_discount",model.getC_discount());
               map.put("date",model.getDate());
               map.put("time",model.getTime());
               map.put("status",model.getStatus());
               map.put("c_o",model.getC_o());
               map.put("c_code",model.getC_code());
               map.put("address",model.getAddress());
               map.put("qty",model.getQty());

                return map;

            }
        };

        requestQueue.add(stringRequest);
    }

    public void getOrder(Context context, OrderModel model)
    {
        String URL= ConstantData.ORDER_GET_METHOD;

        RequestQueue requestQueue= Volley.newRequestQueue(context);

        StringRequest stringRequest=new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    Gson gson=new Gson();
                    OrderOutputModel p= gson.fromJson(response, OrderOutputModel.class);
                    if (p.isStatus()){
                        ((CartActivity)context).setCart(p);

                    }
                } catch (Exception e) {
                    Toast.makeText(context, "ERROR:"+e.toString(), Toast.LENGTH_SHORT).show();

                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(context, "SERVER ERROR", Toast.LENGTH_SHORT).show();
            }
        }){
            @Nullable
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String,String> map=new HashMap<>();
                map.put("uid",model.getUid());

                return map;

            }
        };

        requestQueue.add(stringRequest);
    }

    public void confirm_order(Context context, String uid,String address,String c_code,String c_o,String c_discount){

       // CustomProgressDialog customProgressDialog=new CustomProgressDialog(context);
       // customProgressDialog.show();


        RequestQueue requestQueue= Volley.newRequestQueue(context);
        StringRequest stringRequest=new StringRequest(Request.Method.POST, ConstantData.CONFIRM_ORDER_METHOD, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                //customProgressDialog.dismiss();
                OrderOutputModel p= new Gson().fromJson(response,OrderOutputModel.class);
                if(p.isStatus()){
                    Intent intent=new Intent(context, ThankYouActivity.class);
                    context.startActivity(intent);
                    ((CartActivity)context).finish();

                }else{
                    Toast.makeText(context, p.getMessage(), Toast.LENGTH_SHORT).show();
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError volleyError) {
                //customProgressDialog.dismiss();
                Toast.makeText(context, "error:"+volleyError.getLocalizedMessage(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Nullable
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String,String> map=new HashMap<>();
                map.put("uid",uid);
                map.put("address",address);
                map.put("c_o",c_o);
                map.put("c_code",c_code);
                map.put("c_discount",c_discount);
                return map;
            }
        };
        requestQueue.add(stringRequest);
    }

    public void order_his(Context context, String uid){

        // CustomProgressDialog customProgressDialog=new CustomProgressDialog(context);
        // customProgressDialog.show();


        RequestQueue requestQueue= Volley.newRequestQueue(context);
        StringRequest stringRequest=new StringRequest(Request.Method.POST, ConstantData.ORDER_HIS, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                //customProgressDialog.dismiss();
                OrderOutputModel p= new Gson().fromJson(response,OrderOutputModel.class);
                if(p.isStatus()){
                    ((OrderhistoryActivity)context).setCart(p);


                }else{
                    Toast.makeText(context, p.getMessage(), Toast.LENGTH_SHORT).show();
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError volleyError) {
                //customProgressDialog.dismiss();
                Toast.makeText(context, "error:"+volleyError.getLocalizedMessage(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Nullable
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String,String> map=new HashMap<>();
                map.put("uid",uid);
                return map;
            }
        };
        requestQueue.add(stringRequest);
    }

}
