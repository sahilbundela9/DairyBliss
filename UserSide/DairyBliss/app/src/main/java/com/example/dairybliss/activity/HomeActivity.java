package com.example.dairybliss.activity;

import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageView;

import androidx.activity.EdgeToEdge;
import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentTransaction;

import com.example.dairybliss.R;
import com.example.dairybliss.api.Data_Api;
import com.example.dairybliss.fragment.CartFragment;
import com.example.dairybliss.fragment.HomeFragment;
import com.example.dairybliss.fragment.ProfileFragment;
import com.example.dairybliss.fragment.SearchFragment;
import com.example.dairybliss.fragment.category;
import com.example.dairybliss.fragment.coupon;
import com.example.dairybliss.model.BannerModel;
import com.example.dairybliss.model.CategoryModel;
import com.example.dairybliss.model.CouponModel;
import com.example.dairybliss.model.DataModel;
import com.example.dairybliss.model.ProductModel;
import com.google.android.material.bottomnavigation.BottomNavigationView;

import java.util.ArrayList;

public class HomeActivity extends AppCompatActivity {

    BottomNavigationView bnbHome;
    ImageView img;
    EditText tvSearch;
    boolean isVisible = false;

    ArrayList<BannerModel> banner_data;
    ArrayList<CategoryModel> category_data;
    ArrayList<CouponModel> coupon_data;
    ArrayList<ProductModel> product_data;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_home);
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });

        bnbHome=findViewById(R.id.bnbHome);
//        img=findViewById(R.id.img);


        new Data_Api().getData(this);

//        tvSearch.setVisibility(View.INVISIBLE);
//
//        img.setOnClickListener(v -> {
//            if (isVisible) {
//                isVisible = !isVisible;
//                tvSearch.setVisibility(View.INVISIBLE);
//            } else {
//                isVisible = !isVisible;
//                tvSearch.setVisibility(View.VISIBLE);
//            }
//        });

        bnbHome.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {

                if(item.getItemId()==R.id.menu_home){
                    openFragment(new HomeFragment(banner_data,category_data,product_data,coupon_data));
                } else if (item.getItemId()==R.id.menu_cart) {
                    Intent intent=new Intent(HomeActivity.this, CartActivity.class);
                    startActivity(intent);
                } else if (item.getItemId()==R.id.menu_category) {
                    openFragment(new category(category_data,product_data));
                } else if (item.getItemId()==R.id.menu_coupon) {
                    openFragment(new coupon(coupon_data));
                } else {
                    openFragment(new ProfileFragment());
                }
                return true;
            }
        });
    }

    public void openFragment(Fragment fragment){
        FragmentManager fm=getSupportFragmentManager();
        FragmentTransaction ft=fm.beginTransaction();

        ft.add(R.id.frame,fragment,null);
        ft.commit();
    }

    public void replaceFragment(Fragment fragment){
        FragmentManager fm=getSupportFragmentManager();
        FragmentTransaction ft=fm.beginTransaction();

        ft.replace(R.id.frame,fragment,null);
        ft.commit();
    }

    public void getData(DataModel model){
        banner_data=model.getBanner_data();
        category_data=model.getCategory_data();
        coupon_data=model.getCoupon_data();
        product_data = model.getProduct_data();
        coupon_data=model.getCoupon_data();
        openFragment(new HomeFragment(banner_data,category_data,product_data,coupon_data));
    }


    @Override
    public void onBackPressed() {
        Fragment currentFragment = getSupportFragmentManager().findFragmentById(R.id.frame);

        if (currentFragment instanceof HomeFragment) {
            // Show exit dialog
            new AlertDialog.Builder(this)
                    .setTitle("Exit App")
                    .setMessage("Are you sure you want to exit?")
                    .setPositiveButton("Yes", (dialog, which) -> {
                        finish(); // or super.onBackPressed() if you prefer
                        super.onBackPressed();
                    })
                    .setNegativeButton("No", null)
                    .show();

        } else {
            // Switch to HomeFragment with necessary data
            replaceFragment(new HomeFragment(banner_data, category_data, product_data, coupon_data));
        }
    }


}