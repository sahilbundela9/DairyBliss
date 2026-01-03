package com.example.dairybliss.model;

import java.io.Serializable;

public class ProductModel  implements Serializable {

    public String pid;
    public String ptitle;
    public String pdesc;
    public String pprice;
    public String pdiscount;
    public String pic1;
    public String pic2;
    public String pic3;
    public String pic4;
    public String shelflife;
    public String brandname;
    public String weight1;
    public String category;
    public String popular;

    public ProductModel(String pid, String ptitle, String pdesc, String pprice, String pdiscount, String pic1, String pic2, String pic3, String pic4, String shelflife, String brandname, String weight1, String category, String popular) {
        this.pid = pid;
        this.ptitle = ptitle;
        this.pdesc = pdesc;
        this.pprice = pprice;
        this.pdiscount = pdiscount;
        this.pic1 = pic1;
        this.pic2 = pic2;
        this.pic3 = pic3;
        this.pic4 = pic4;
        this.shelflife = shelflife;
        this.brandname = brandname;
        this.weight1 = weight1;
        this.category = category;
        this.popular = popular;
    }

    public String getPid() {
        return pid;
    }

    public void setPid(String pid) {
        this.pid = pid;
    }

    public String getPtitle() {
        return ptitle;
    }

    public void setPtitle(String ptitle) {
        this.ptitle = ptitle;
    }

    public String getPdesc() {
        return pdesc;
    }

    public void setPdesc(String pdesc) {
        this.pdesc = pdesc;
    }

    public String getPprice() {
        return pprice;
    }

    public void setPprice(String pprice) {
        this.pprice = pprice;
    }

    public String getPdiscount() {
        return pdiscount;
    }

    public void setPdiscount(String pdiscount) {
        this.pdiscount = pdiscount;
    }

    public String getPic1() {
        return pic1;
    }

    public void setPic1(String pic1) {
        this.pic1 = pic1;
    }

    public String getPic2() {
        return pic2;
    }

    public void setPic2(String pic2) {
        this.pic2 = pic2;
    }

    public String getPic3() {
        return pic3;
    }

    public void setPic3(String pic3) {
        this.pic3 = pic3;
    }

    public String getPic4() {
        return pic4;
    }

    public void setPic4(String pic4) {
        this.pic4 = pic4;
    }

    public String getShelflife() {
        return shelflife;
    }

    public void setShelflife(String shelflife) {
        this.shelflife = shelflife;
    }

    public String getBrandname() {
        return brandname;
    }

    public void setBrandname(String brandname) {
        this.brandname = brandname;
    }

    public String getWeight1() {
        return weight1;
    }

    public void setWeight1(String weight1) {
        this.weight1 = weight1;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public String getPopular() {
        return popular;
    }

    public void setPopular(String popular) {
        this.popular = popular;
    }
}
