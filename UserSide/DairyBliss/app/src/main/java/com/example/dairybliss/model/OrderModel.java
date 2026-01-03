package com.example.dairybliss.model;

public class OrderModel

{

    public String id;
    public String pid;
    public String uid;
    public String pname;
    public String pic1;
    public String amount;
    public String tot_amount;
    public String c_discount;
    public String date;
    public String time;
    public String status;
    public String c_o;
    public String c_code;
    public String address;
    public String qty;

    public OrderModel() {
    }

    public OrderModel(String id, String pid, String uid, String pname, String pic1, String amount, String tot_amount, String c_discount, String date, String time, String status, String c_o, String c_code, String address, String qty) {
        this.id = id;
        this.pid = pid;
        this.uid = uid;
        this.pname = pname;
        this.pic1 = pic1;
        this.amount = amount;
        this.tot_amount = tot_amount;
        this.c_discount = c_discount;
        this.date = date;
        this.time = time;
        this.status = status;
        this.c_o = c_o;
        this.c_code = c_code;
        this.address = address;
        this.qty = qty;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getPid() {
        return pid;
    }

    public void setPid(String pid) {
        this.pid = pid;
    }

    public String getUid() {
        return uid;
    }

    public void setUid(String uid) {
        this.uid = uid;
    }

    public String getPname() {
        return pname;
    }

    public void setPname(String pname) {
        this.pname = pname;
    }

    public String getPic1() {
        return pic1;
    }

    public void setPic1(String pic1) {
        this.pic1 = pic1;
    }

    public String getAmount() {
        return amount;
    }

    public void setAmount(String amount) {
        this.amount = amount;
    }

    public String getTot_amount() {
        return tot_amount;
    }

    public void setTot_amount(String tot_amount) {
        this.tot_amount = tot_amount;
    }

    public String getC_discount() {
        return c_discount;
    }

    public void setC_discount(String c_discount) {
        this.c_discount = c_discount;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public String getTime() {
        return time;
    }

    public void setTime(String time) {
        this.time = time;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public String getC_o() {
        return c_o;
    }

    public void setC_o(String c_o) {
        this.c_o = c_o;
    }

    public String getC_code() {
        return c_code;
    }

    public void setC_code(String c_code) {
        this.c_code = c_code;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getQty() {
        return qty;
    }

    public void setQty(String qty) {
        this.qty = qty;
    }
}
