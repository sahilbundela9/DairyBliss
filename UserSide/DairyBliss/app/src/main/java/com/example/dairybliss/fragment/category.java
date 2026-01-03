package com.example.dairybliss.fragment;

import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.dairybliss.R;
import com.example.dairybliss.adapter.CategoryAdapter;
import com.example.dairybliss.model.CategoryModel;
import com.example.dairybliss.model.ProductModel;

import java.util.ArrayList;

public class category extends Fragment {

    ArrayList<CategoryModel>categoryModels;
    ArrayList<ProductModel> productModels;

    public category(ArrayList<CategoryModel> categoryModels,ArrayList<ProductModel> productModels) {
        this.categoryModels = categoryModels;
        this.productModels=productModels;
    }

    RecyclerView rcylCat;
View view;
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        view= inflater.inflate(R.layout.fragment_category, container, false);
        return view;
    }

    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);
        rcylCat=view.findViewById(R.id.rcylCat);
        rcylCat.setLayoutManager(new GridLayoutManager(getContext(),3));

        CategoryAdapter adapter=new CategoryAdapter(categoryModels,productModels);
        rcylCat.setAdapter(adapter);



    }
}