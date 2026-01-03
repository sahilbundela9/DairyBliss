package com.example.dairybliss.adapter;

import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.example.dairybliss.R;
import com.example.dairybliss.activity.ProductActivity;
import com.example.dairybliss.model.CategoryModel;
import com.example.dairybliss.model.ProductModel;
import com.example.dairybliss.utlis.ConstantData;

import java.util.ArrayList;

import de.hdodenhof.circleimageview.CircleImageView;

public class CategoryAdapter extends RecyclerView.Adapter<CategoryAdapter.CViewHolder> {
    ArrayList<CategoryModel>categoryModels;
    ArrayList<ProductModel> productModels;

    public CategoryAdapter(ArrayList<CategoryModel> categoryModels, ArrayList<ProductModel> productModels) {
        this.categoryModels = categoryModels;
        this.productModels = productModels;
    }

    @NonNull
    @Override
    public CViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.row_category, parent, false);
        return new CViewHolder(view);

    }

    @Override
    public void onBindViewHolder(@NonNull CViewHolder holder, int position) {
        CategoryModel category = categoryModels.get(position);

        ArrayList<ProductModel> p=new ArrayList<>();
        holder.imgcat.setOnClickListener(v ->{
                    for (int i=0;i<productModels.size();i++){
                        if(category.getCat_name().equals(productModels.get(i).getCategory())){
                            p.add(productModels.get(i));
                        }
                    }

                    Intent intent=new Intent(holder.imgcat.getContext(), ProductActivity.class);
                    intent.putExtra("product",p);
            holder.imgcat.getContext().startActivity(intent);

                }
        );
        holder.tvCatname.setText(categoryModels.get(position).getCat_name());
        Glide.with(holder.imgcat.getContext()).load(ConstantData.SERVER_ADDRESS_IMG+categoryModels.get(position).getCat_pic()).into(holder.imgcat);
    }



    @Override
    public int getItemCount() {
        return categoryModels.size();
    }

    public class CViewHolder extends RecyclerView.ViewHolder{
        CircleImageView imgcat;
        TextView tvCatname;
        public CViewHolder(@NonNull View itemView) {
            super(itemView);
            imgcat=itemView.findViewById(R.id.imgcat);
            tvCatname=itemView.findViewById(R.id.tvCatname);

        }
    }
}
