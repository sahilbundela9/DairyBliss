package com.example.dairybliss.fragment;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;

import com.example.dairybliss.OrderhistoryActivity;
import com.example.dairybliss.R;
import com.example.dairybliss.activity.AboutActivity;
import com.example.dairybliss.activity.ContactusActivity;
import com.example.dairybliss.activity.LoginActivity;
import com.example.dairybliss.activity.PricavyPolicyActivity;
import com.example.dairybliss.activity.TermActivity;
import com.example.dairybliss.utlis.ConstantData;

public class ProfileFragment extends Fragment {

    View view;
    TextView tvUserName,tvEmail,btnYourorder,txtadboutus,txtcontactus,txtprivatpolicy,txttemrsandcondi;
    Button btnLogout;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        view = inflater.inflate(R.layout.fragment_profile, container, false);
        return view;
    }

    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);

        tvEmail = view.findViewById(R.id.tvEmail);
        tvUserName = view.findViewById(R.id.tvUserName);
        btnLogout = view.findViewById(R.id.btnLogout);
        btnYourorder=view.findViewById(R.id.btnYourorder);
        txtadboutus=view.findViewById(R.id.txtadboutus);
        txtcontactus=view.findViewById(R.id.txtcontactus);
        txtprivatpolicy=view.findViewById(R.id.txtprivatpolicy);
        txttemrsandcondi=view.findViewById(R.id.txttemrsandcondi);


        SharedPreferences sp = getContext().getSharedPreferences(ConstantData.SP_NAME, Context.MODE_PRIVATE);

        tvUserName.setText(sp.getString(ConstantData.KEY_USERNAME,"Guest"));
        tvEmail.setText(sp.getString(ConstantData.KEY_EMAIL,"guest@gmail.com"));

        btnLogout.setOnClickListener(v -> {
            SharedPreferences.Editor ed = sp.edit();
            ed.clear();
            ed.commit();

            startActivity(new Intent(getActivity(), LoginActivity.class));
            getActivity().finish();
        });
        btnYourorder.setOnClickListener(v -> {
            Intent intent=new Intent(getContext(), OrderhistoryActivity.class);
            startActivity(intent);
        });
        txtadboutus.setOnClickListener(v -> {
            Intent intent=new Intent(getContext(), AboutActivity.class);
            startActivity(intent);
        });
        txtcontactus.setOnClickListener(v -> {
            Intent intent=new Intent(getContext(), ContactusActivity.class);
            startActivity(intent);
        });
        txtprivatpolicy.setOnClickListener(v -> {
            Intent intent=new Intent(getContext(), PricavyPolicyActivity.class);
            startActivity(intent);
        });
        txttemrsandcondi.setOnClickListener(v -> {
            Intent intent=new Intent(getContext(), TermActivity.class);
            startActivity(intent);
        });
    }
}