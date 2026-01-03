package com.example.dairybliss.model;

public class BannerModel {

    public String id;
    public String pic;
    public String status;

    public BannerModel(String id, String pic, String status) {
        this.id = id;
        this.pic = pic;
        this.status = status;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getPic() {
        return pic;
    }

    public void setPic(String pic) {
        this.pic = pic;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }
}
