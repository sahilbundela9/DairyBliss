package com.example.dairybliss.model;

import java.util.ArrayList;

public class DataModel {
    public boolean status;
    public String message;
    public ArrayList<BannerModel> banner_data;
    public ArrayList<CategoryModel> category_data;
    public ArrayList<CouponModel> coupon_data;
    public ArrayList<ProductModel> product_data;
    public ArrayList<UserModel> user_data;

    public DataModel(boolean status, String message, ArrayList<BannerModel> banner_data, ArrayList<CategoryModel> category_data, ArrayList<CouponModel> coupon_data, ArrayList<ProductModel> product_data, ArrayList<UserModel> user_data) {
        this.status = status;
        this.message = message;
        this.banner_data = banner_data;
        this.category_data = category_data;
        this.coupon_data = coupon_data;
        this.product_data = product_data;
        this.user_data = user_data;
    }

    public boolean isStatus() {
        return status;
    }

    public void setStatus(boolean status) {
        this.status = status;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public ArrayList<BannerModel> getBanner_data() {
        return banner_data;
    }

    public void setBanner_data(ArrayList<BannerModel> banner_data) {
        this.banner_data = banner_data;
    }

    public ArrayList<CategoryModel> getCategory_data() {
        return category_data;
    }

    public void setCategory_data(ArrayList<CategoryModel> category_data) {
        this.category_data = category_data;
    }

    public ArrayList<CouponModel> getCoupon_data() {
        return coupon_data;
    }

    public void setCoupon_data(ArrayList<CouponModel> coupon_data) {
        this.coupon_data = coupon_data;
    }

    public ArrayList<ProductModel> getProduct_data() {
        return product_data;
    }

    public void setProduct_data(ArrayList<ProductModel> product_data) {
        this.product_data = product_data;
    }

    public ArrayList<UserModel> getUser_data() {
        return user_data;
    }

    public void setUser_data(ArrayList<UserModel> user_data) {
        this.user_data = user_data;
    }
}

