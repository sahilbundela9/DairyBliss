package com.example.dairybliss.activity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

import com.denzcoskun.imageslider.ImageSlider;
import com.denzcoskun.imageslider.constants.ScaleTypes;
import com.denzcoskun.imageslider.models.SlideModel;
import com.example.dairybliss.R;
import com.example.dairybliss.api.OrderApi;
import com.example.dairybliss.model.OrderModel;
import com.example.dairybliss.model.ProductModel;
import com.example.dairybliss.utlis.ConstantData;

import java.util.ArrayList;

public class Product_Detail_Activity extends AppCompatActivity {

    TextView pTitle,tvPdesc,tvPprice,tvPdis,tvPslife,tvPbrand,tvPweight,tvPcategory,tvPpopular;
    ImageSlider pImg;
    Button btnAddtoCart;
    ImageView arBack;
    @SuppressLint("WrongViewCast")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_product_detail);
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });
        pTitle=findViewById(R.id.tvPtitle);
        tvPdesc=findViewById(R.id.tvPdesc);
        tvPprice=findViewById(R.id.tvPprice);
        tvPdis=findViewById(R.id.tvPdis);
        tvPslife=findViewById(R.id.tvPslife);
        tvPbrand=findViewById(R.id.tvPbrand);
        tvPweight=findViewById(R.id.tvPweight);
        tvPcategory=findViewById(R.id.tvPcategory);
        tvPpopular=findViewById(R.id.tvPpopular);
        pImg=findViewById(R.id.pImg);
        btnAddtoCart=findViewById(R.id.btnAddtoCart);
        arBack=findViewById(R.id.arBack);

        ProductModel productModel= (ProductModel) getIntent().getSerializableExtra("model");
        pTitle.setText(productModel.getPtitle());
        tvPdesc.setText(productModel.getPdesc());
        tvPprice.setText(productModel.getPprice());
        tvPdis.setText(productModel.getPdiscount());
        tvPslife.setText(productModel.getShelflife());
        tvPbrand.setText(productModel.getBrandname());
        tvPweight.setText(productModel.getWeight1());
        tvPcategory.setText(productModel.getCategory());
        tvPpopular.setText(productModel.getPopular());

        ArrayList<SlideModel> slideModels=new ArrayList<>();
        slideModels.add(new SlideModel(ConstantData.SERVER_ADDRESS_IMG+productModel.getPic1(), ScaleTypes.FIT));
        slideModels.add(new SlideModel(ConstantData.SERVER_ADDRESS_IMG+productModel.getPic2(), ScaleTypes.FIT));

        arBack.setOnClickListener(v -> finish());

        if(!productModel.getPic3().equals("")){
            slideModels.add(new SlideModel(ConstantData.SERVER_ADDRESS_IMG+productModel.getPic3(), ScaleTypes.FIT));

        }
        if(!productModel.getPic4().equals("")){

            slideModels.add(new SlideModel(ConstantData.SERVER_ADDRESS_IMG + productModel.getPic4(), ScaleTypes.FIT));
        }
        pImg.setImageList(slideModels);


        btnAddtoCart.setOnClickListener(v -> {
            SharedPreferences sp=getSharedPreferences(ConstantData.SP_NAME,MODE_PRIVATE);
            String uid=sp.getString(ConstantData.KEY_USER_ID,"0");
            if(uid.equals("0")){
                Intent intent=new Intent(Product_Detail_Activity.this, LoginActivity.class);
                startActivity(intent);
            }else{

                OrderModel model=new OrderModel("",productModel.getPid(),uid, productModel.getPtitle(),
                        productModel.getPic1(),productModel.getPprice()
                ,productModel.getPprice(),"",
                        "","","0","cash","","address","1");

                new OrderApi().addOrder(Product_Detail_Activity.this,model);
            }

        });



    }
}