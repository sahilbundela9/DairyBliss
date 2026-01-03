package com.example.dairybliss.activity;

import android.os.Bundle;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.example.dairybliss.R;
import com.example.dairybliss.adapter.ProductAdapter;
import com.example.dairybliss.model.ProductModel;

import java.util.ArrayList;

public class ProductActivity extends AppCompatActivity {


    RecyclerView rcylProduct;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_product);
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });

        rcylProduct=findViewById(R.id.rcylProduct);
        ArrayList<ProductModel> productModels= (ArrayList<ProductModel>) getIntent().getSerializableExtra("product");

        ProductAdapter adapter=new ProductAdapter(productModels,true);
        rcylProduct.setLayoutManager(new GridLayoutManager(this,2));
        rcylProduct.setAdapter(adapter);

    }
}