package com.example.gina.db_app;

/**
 * Created by Gina on 11/17/2017.
 */

public class Student {
    //Private Variables
    int _id;
    int _enroll_id;
    String _name;
    String _phone_number;

    //empty constructor
    public Student(){

    }
    //all paramaters in constructor
    public Student(int _id, String _name, int _enroll_id, String _phone_number){
        this._id= _id;
        this._name=_name;
        this._enroll_id=_enroll_id;
        this._phone_number=_phone_number;
    }
    //three paramater constructor
    public Student(int _enroll_id, String _name, String _phone_number){
        this._enroll_id=_enroll_id;
        this._name=_name;
        this._phone_number=_phone_number;

    }
    //Getters for all fields
    public int get_id(){
        return _id;
    }
    public int get_enroll_id(){
        return _enroll_id;
    }
    public String get_name(){
        return _name;
    }
    public String get_phone_number(){
        return _phone_number;
    }

    //Setters for all fields
    public void set_id(int _id){this._id=_id;}
    public void set_enroll_id(int _enroll_id){this._enroll_id=_enroll_id;}
    public void set_name(String _name){this._name=_name;}
    public void set_phone_number(String _phone_number){this._phone_number=_phone_number;}


}
