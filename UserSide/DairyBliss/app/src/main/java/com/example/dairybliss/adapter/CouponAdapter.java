package com.example.dairybliss.adapter;

import static androidx.core.content.ContextCompat.getSystemService;

import android.content.ClipData;
import android.content.ClipboardManager;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.cardview.widget.CardView;
import androidx.core.content.ContextCompat;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.example.dairybliss.R;
import com.example.dairybliss.model.CouponModel;
import com.example.dairybliss.utlis.ConstantData;

import java.util.List;

public class CouponAdapter extends RecyclerView.Adapter<CouponAdapter.CouponViewHolder> {

    private List<CouponModel> couponList;

    public CouponAdapter(List<CouponModel> couponList) {
        this.couponList = couponList;
    }

    @NonNull
    @Override
    public CouponViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.raw_cupen, parent, false);
        return new CouponViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull CouponViewHolder holder, int position) {
        CouponModel coupon = couponList.get(position);

        holder.txtCcode.setText(coupon.getC_code());
        holder.txtCdiscount.setText(coupon.getC_discount());
        holder.txtCmaxamt.setText(coupon.getC_maxamt());
        Glide.with(holder.Cimg.getContext())
                .load(ConstantData.SERVER_ADDRESS_IMG+coupon.getC_pic())
                .into(holder.Cimg);


        holder.cardCopy.setOnClickListener(v -> {
            String textToCopy = coupon.getC_code();

            ClipboardManager clipboard = ContextCompat.getSystemService(holder.cardCopy.getContext(), ClipboardManager.class);
            //ClipboardManager clipboard = (ClipboardManager) getSystemService(holder.cardCopy.getContext().CLIPBOARD_SERVICE);
            ClipData clip = ClipData.newPlainText("label", textToCopy);
            clipboard.setPrimaryClip(clip);
            Toast.makeText(holder.cardCopy.getContext(), "Coupon copied to clipboard", Toast.LENGTH_SHORT).show();

    });
    }

    @Override
    public int getItemCount() {
        return couponList.size();
    }

    public static class CouponViewHolder extends RecyclerView.ViewHolder {
        ImageView Cimg;
        TextView txtCcode, txtCdiscount, txtCmaxamt;
        CardView cardCopy;

        public CouponViewHolder(@NonNull View itemView) {
            super(itemView);

            Cimg = itemView.findViewById(R.id.Cimg);
            txtCcode = itemView.findViewById(R.id.Cupen_code);
            txtCdiscount = itemView.findViewById(R.id.Cupen_discount);
            txtCmaxamt = itemView.findViewById(R.id.Cupen_Mamt);
            cardCopy = itemView.findViewById(R.id.cardCopy);
        }
    }
}
