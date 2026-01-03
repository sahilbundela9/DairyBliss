package com.example.dairybliss.adapter;


import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.example.dairybliss.R;
import com.example.dairybliss.model.OrderModel;
import com.example.dairybliss.utlis.ConstantData;

import java.util.List;

public class OrderAdapter extends RecyclerView.Adapter<OrderAdapter.OrderViewHolder> {

    private Context context;
    private List<OrderModel> orderList;
    private OnItemClickListener onItemClickListener;

    public OrderAdapter(Context context, List<OrderModel> orderList, OnItemClickListener onItemClickListener) {
        this.context = context;
        this.orderList = orderList;
        this.onItemClickListener = onItemClickListener;
    }

    @NonNull
    @Override
    public OrderViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(context).inflate(R.layout.raw_order, parent, false);
        return new OrderViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull OrderViewHolder holder, int position) {
        OrderModel order = orderList.get(position);
        holder.txtRename.setText(order.getPname());
        holder.txtPrice.setText(order.getAmount());
        holder.txtQty.setText(order.getQty());
        // You can load the image using Glide or Picasso library
         Glide.with(context).load(ConstantData.SERVER_ADDRESS_IMG+order.getPic1()).into(holder.imgProduct);
        holder.btnPlus.setOnClickListener(v -> {
            int qty = Integer.parseInt(order.getQty()) + 1;
            String amt=order.getAmount();
            order.setQty(String.valueOf(qty));
            holder.txtQty.setText(order.getQty());
            if (onItemClickListener != null) {
                onItemClickListener.onPlusClicked(order);
            }
        });
        holder.btnMinus.setOnClickListener(v -> {
            int qty = Integer.parseInt(order.getQty());
            if (qty > 1) {
                qty -= 1;
                order.setQty(String.valueOf(qty));
                holder.txtQty.setText(order.getQty());
                if (onItemClickListener != null) {
                    onItemClickListener.onMinusClicked(order);
                }
            }
        });
        holder.imgDel.setOnClickListener(v -> {
            if (onItemClickListener != null) {
                onItemClickListener.onDeleteClicked(order);
            }
        });
    }

    @Override
    public int getItemCount() {
        return orderList.size();
    }

    static class OrderViewHolder extends RecyclerView.ViewHolder {

        TextView txtRename, txtPrice, txtQty;
        ImageView imgProduct, imgDel;
        Button btnPlus, btnMinus;

        public OrderViewHolder(@NonNull View itemView) {
            super(itemView);
            txtRename = itemView.findViewById(R.id.TxtPname);
            txtPrice = itemView.findViewById(R.id.TxtPrice);
            txtQty = itemView.findViewById(R.id.Txtqty);
            imgProduct = itemView.findViewById(R.id.Oimg);
            imgDel = itemView.findViewById(R.id.imgdel);
            btnPlus = itemView.findViewById(R.id.btnPlus);
            btnMinus = itemView.findViewById(R.id.btnMinus);
        }
    }

    public interface OnItemClickListener {
        void onPlusClicked(OrderModel order);
        void onMinusClicked(OrderModel order);
        void onDeleteClicked(OrderModel order);
    }
}
