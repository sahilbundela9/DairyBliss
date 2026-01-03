package com.example.dairybliss.fragment;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
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
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.TextView;

import com.denzcoskun.imageslider.ImageSlider;
import com.denzcoskun.imageslider.constants.ScaleTypes;
import com.denzcoskun.imageslider.models.SlideModel;
import com.example.dairybliss.OrderhistoryActivity;
import com.example.dairybliss.R;
import com.example.dairybliss.activity.HomeActivity;
import com.example.dairybliss.activity.ProductActivity;
import com.example.dairybliss.adapter.CategoryAdapter;
import com.example.dairybliss.adapter.CouponAdapter;
import com.example.dairybliss.adapter.ProductAdapter;
import com.example.dairybliss.adapter.SearchAdapter;
import com.example.dairybliss.model.BannerModel;
import com.example.dairybliss.model.CategoryModel;
import com.example.dairybliss.model.CouponModel;
import com.example.dairybliss.model.ProductModel;
import com.example.dairybliss.utlis.ConstantData;

import java.util.ArrayList;

public class HomeFragment extends Fragment {
    View view;

    ImageSlider image_slider;
    RecyclerView rcylCat,rcylproduct;
    TextView tvUser;
    AutoCompleteTextView etSearch;

    ArrayList<BannerModel> banner_data;
    ArrayList<CategoryModel> category_data;
    ArrayList<ProductModel> product_data;
    ArrayList<CouponModel> coupon_data;
    TextView viewCategory,viewProduct;

    public HomeFragment(ArrayList<BannerModel> banner_data, ArrayList<CategoryModel> category_data,ArrayList<ProductModel> product_data,ArrayList<CouponModel> coupon_data) {
        this.banner_data = banner_data;
        this.category_data = category_data;
        this.product_data = product_data;
        this.coupon_data=coupon_data;
    }

    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        view= inflater.inflate(R.layout.fragment_home, container, false);
        return view;
    }

    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);
        image_slider=view.findViewById(R.id.image_slider);
        rcylCat=view.findViewById(R.id.rcylCat);
        rcylproduct=view.findViewById(R.id.rcylproduct);
        tvUser=view.findViewById(R.id.tvUser);
        viewProduct=view.findViewById(R.id.viewProduct);
        viewCategory=view.findViewById(R.id.viewCategory);
        etSearch=view.findViewById(R.id.etSearch);


        viewCategory.setOnClickListener(v -> {
            ((HomeActivity)getActivity()).openFragment(new category(category_data,product_data));
        });

        viewProduct.setOnClickListener(v -> {
            Intent intent=new Intent(getContext(), ProductActivity.class);
            intent.putExtra("product",product_data);
            startActivity(intent);
        });




        SharedPreferences sharedPreferences=getContext().getSharedPreferences(ConstantData.SP_NAME, Context.MODE_PRIVATE);
        String user=sharedPreferences.getString(ConstantData.KEY_USERNAME,"Guest");

        tvUser.setText("Welcome Back,"+user);

        rcylCat.setLayoutManager(new LinearLayoutManager(getContext(),LinearLayoutManager.HORIZONTAL,false));
        setBanner();

        SearchAdapter searchAdapter=new SearchAdapter(getContext(),product_data);
        etSearch.setThreshold(1);
        etSearch.setAdapter(searchAdapter);
    }

    public void setBanner(){
        ArrayList<SlideModel> imgList=new ArrayList<>();

        for(int i=0;i< banner_data.size();i++){
            imgList.add(
                    new SlideModel(
                            ConstantData.SERVER_ADDRESS_IMG+banner_data.get(i).getPic(),
                            null,
                            ScaleTypes.FIT
                    )
            );
        }
        image_slider.setImageList(imgList);
        rcylCat.setLayoutManager(new LinearLayoutManager(getContext(),LinearLayoutManager.HORIZONTAL,
                false));
        CategoryAdapter adapter=new CategoryAdapter(category_data,product_data);
        rcylCat.setAdapter(adapter);

        rcylproduct.setNestedScrollingEnabled(false);

        rcylproduct.setLayoutManager(new GridLayoutManager(getContext(),2));
        rcylproduct.setAdapter(new ProductAdapter(product_data,false));

//        rcylCoupon.setLayoutManager(new LinearLayoutManager(getContext(),LinearLayoutManager.HORIZONTAL,false));
//        rcylCoupon.setAdapter(new CouponAdapter(coupon_data));

    }
}
