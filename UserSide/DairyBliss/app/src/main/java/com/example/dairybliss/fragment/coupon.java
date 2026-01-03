package com.example.dairybliss.fragment;

import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.dairybliss.R;
import com.example.dairybliss.adapter.CouponAdapter;
import com.example.dairybliss.model.CouponModel;

import java.util.ArrayList;

public class coupon extends Fragment {

    View view;

    ArrayList<CouponModel> coupons;

    RecyclerView rcylCoupon;

    public coupon(ArrayList<CouponModel> coupons) {
        this.coupons = coupons;
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        view = inflater.inflate(R.layout.fragment_coupon, container, false);
        return view;
    }

    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);
        rcylCoupon=view.findViewById(R.id.rcylCoupon);
        rcylCoupon.setLayoutManager(new LinearLayoutManager(getContext()));
        rcylCoupon.setAdapter(new CouponAdapter(coupons));
    }

}