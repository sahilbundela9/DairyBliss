package com.example.dairybliss.adapter;

import android.content.Context;
import android.graphics.Color;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.cardview.widget.CardView;
import androidx.core.content.ContextCompat;
import androidx.core.content.res.ResourcesCompat;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;

import com.example.dairybliss.R;
import com.example.dairybliss.model.OrderModel;
import com.example.dairybliss.utlis.ConstantData;
import com.transferwise.sequencelayout.SequenceLayout;
import com.transferwise.sequencelayout.SequenceStep;
//import com.shuhart.stepview.StepView;

import java.util.ArrayList;
import java.util.List;



public class OrderHistoryAdapter  extends RecyclerView.Adapter<OrderHistoryAdapter.CartViewHolder> {
    List<OrderModel> orderModels;

    ArrayList<String> steps;
    Context context;

    public OrderHistoryAdapter(List<OrderModel> orderModels,  Context context) {
        this.orderModels = orderModels;
        this.context = context;
        steps=new ArrayList<>();
        steps.add("Order Placed");
        steps.add("Dispatched");
        steps.add("Shipping");
        steps.add("Delivered");
    }

    @NonNull
    @Override
    public CartViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View view = layoutInflater.inflate(R.layout.order_history, parent, false);
        CartViewHolder cartViewHolder = new CartViewHolder(view);
        return cartViewHolder;
    }


    @NonNull
    @Override
    public void onBindViewHolder(@NonNull CartViewHolder holder, int position) {
        OrderModel orderModel = orderModels.get(position);
        Glide.with(context).load(ConstantData.SERVER_ADDRESS_IMG+orderModel.getPic1()).into(holder.orderImage);
        holder.orderName.setText(orderModel.getPname());
        holder.orderSize.setText(orderModel.getQty());
        holder.orderPrice.setText("RS : " + orderModel.getAmount());
        holder.tracker.setVisibility(View.GONE);


//        holder.orderCard.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                holder.tracker.setVisibility(View.VISIBLE);
//            }
//        });
//
//        holder.OpenTracker.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                holder.tracker.setVisibility(View.GONE);
//
//            }
//        });
        holder.OpenTracker.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (holder.tracker.getVisibility() == View.VISIBLE) {
                    holder.tracker.setVisibility(View.GONE);
                } else {
                    holder.tracker.setVisibility(View.VISIBLE);
                }
            }
        });

        holder.step1.setSubtitle("Your Order has Received,Order Will be Dispatch within few Hours");
        holder.step2.setSubtitle("Product is dispatched from Warehouse");
        holder.step3.setSubtitle("Product is being Shipped");
        holder.step4.setSubtitle("Product is Out for delivery");
        holder.step5.setSubtitle("Delievered order");


        if(orderModel.getStatus().equals("1") ){
            holder.step1.setActive(true);
        }else if(orderModel.getStatus().equals("2")){
            holder.step2.setActive(true);
        }else if(orderModel.getStatus().equals("3")){
            holder.step3.setActive(true);
        }else if(orderModel.getStatus().equals("4")){
            holder.step4.setActive(true);
        }else{
            holder.step5.setActive(true);
        }

        if(orderModel.getStatus() .equals("1")){
            holder.tvDelivered.setVisibility(View.VISIBLE);
            holder.tvDelivered.setText("Order Placed");
            holder.tvDelivered.setTextColor(Color.BLUE);
        } else if(orderModel.getStatus() .equals("2")){
            holder.tvDelivered.setVisibility(View.VISIBLE);
            holder.tvDelivered.setText("Dispatched");
            holder.tvDelivered.setTextColor(Color.GREEN);
        } else if(orderModel.getStatus() .equals("3")){
            holder.tvDelivered.setVisibility(View.VISIBLE);
            holder.tvDelivered.setText("Shipping");
            holder.tvDelivered.setTextColor(Color.CYAN);
        } else if(orderModel.getStatus() .equals("4")){
            holder.tvDelivered.setVisibility(View.VISIBLE);
            holder.tvDelivered.setText("Out for Delivery");
            holder.tvDelivered.setTextColor(Color.rgb(255, 165, 0));
        } else {
            holder.tvDelivered.setVisibility(View.VISIBLE);
            holder.tvDelivered.setText("Delivered");
            holder.tvDelivered.setTextColor(Color.RED);
        }


    }

    @Override
    public int getItemCount() {
        return orderModels.size();
    }

    public class CartViewHolder extends RecyclerView.ViewHolder {
        ImageView orderImage;
        SequenceLayout tracker;
        CardView orderCard;
        SequenceStep step1,step2,step3,step4,step5;
        TextView orderName, orderPrice, orderSize, OpenTracker,tvDelivered;


        public CartViewHolder(@NonNull View itemView) {
            super(itemView);
            orderImage = itemView.findViewById(R.id.orderImage);

            orderName = itemView.findViewById(R.id.orderName);
            OpenTracker = itemView.findViewById(R.id.OpenTracker);
            orderPrice = itemView.findViewById(R.id.orderPrice);
            tvDelivered = itemView.findViewById(R.id.tvDelivered);
            orderSize = itemView.findViewById(R.id.orderSize);

            step1=itemView.findViewById(R.id.step1);
            step2=itemView.findViewById(R.id.step2);
            step3=itemView.findViewById(R.id.step3);
            step4=itemView.findViewById(R.id.step4);
            step5=itemView.findViewById(R.id.step5);
            tracker=itemView.findViewById(R.id.tracker);
            orderCard=itemView.findViewById(R.id.orderCard);



        }
    }

    public interface OnClickListener {
        public void onClickPlus(OrderModel orderModel);

        public void onClickMinus(OrderModel orderModel);

        public void removeOrder(OrderModel orderModel);

    }

}