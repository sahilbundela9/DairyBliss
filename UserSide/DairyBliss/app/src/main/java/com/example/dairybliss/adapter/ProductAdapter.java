package com.example.dairybliss.adapter;

import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.example.dairybliss.R;
import com.example.dairybliss.activity.Product_Detail_Activity;
import com.example.dairybliss.model.ProductModel;
import com.example.dairybliss.utlis.ConstantData;

import java.util.List;

public class ProductAdapter extends RecyclerView.Adapter<ProductAdapter.ProductViewHolder> {

    private List<ProductModel> productList;
    boolean all;

    public ProductAdapter(List<ProductModel> productList,boolean all) {
        this.productList = productList;
        this.all = all;
    }

    @NonNull
    @Override
    public ProductViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.raw_product, parent, false);
        return new ProductViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ProductViewHolder holder, int position) {
        ProductModel product = productList.get(position);

        holder.txtPname.setText(product.getPtitle());
        holder.txtPrice.setText(product.getPprice());
        Glide.with(holder.Pimg.getContext())
                .load(ConstantData.SERVER_ADDRESS_IMG + product.getPic1())
                .into(holder.Pimg);

        holder.Pimg.setOnClickListener(v -> {
            Intent intent=new Intent(holder.Pimg.getContext(), Product_Detail_Activity.class);
            intent.putExtra("model",product);
            holder.Pimg.getContext().startActivity(intent);

        });
    }

    @Override
    public int getItemCount() {
        if (all) {
            return productList.size();
        } else {
            return 6;
        }
    }

    public static class ProductViewHolder extends RecyclerView.ViewHolder {
        ImageView Pimg;
        TextView txtPname, txtPrice;

        public ProductViewHolder(@NonNull View itemView) {
            super(itemView);

            Pimg = itemView.findViewById(R.id.Pimg);
            txtPname = itemView.findViewById(R.id.txtPname);
            txtPrice = itemView.findViewById(R.id.txtPrice);
        }
    }
}
