package com.example.dairybliss.api;


import android.app.ProgressDialog;
import android.content.Context;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.dairybliss.activity.HomeActivity;
import com.example.dairybliss.model.DataModel;
import com.example.dairybliss.utlis.ConstantData;
import com.google.gson.Gson;

public class Data_Api
{
    public void getData(Context context)
    {
        ProgressDialog dialog= new ProgressDialog(context);
        dialog.setTitle("Please Wait........");
        dialog.setCancelable(false);
        dialog.show();

        RequestQueue queue= Volley.newRequestQueue(context);

        StringRequest request = new StringRequest(

                Request.Method.GET,
                ConstantData.DATA_METHOD,
                response -> {
                    dialog.dismiss();

                    DataModel data = new Gson().fromJson(response,DataModel.class);

                    if(data.isStatus())
                    {
                        Toast.makeText(context, "Data Get Success....", Toast.LENGTH_SHORT).show();
                        ((HomeActivity)context).getData(data);
                    }
                },
                error -> {
                    dialog.dismiss();
                    Toast.makeText(context, "SERVER ERROR...."+error.toString(), Toast.LENGTH_SHORT).show();
                    Log.e("SERVER ERROR",error.toString());
                }


        );
        queue.add(request);
    }
}
