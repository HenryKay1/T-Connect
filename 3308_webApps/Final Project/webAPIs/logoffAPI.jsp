<%-- 
    Document   : logoffAPI
    Created on : Mar 13, 2021, 12:12:21 PM
    Author     : henry
--%>

<%@page contentType="application/json; charset=UTF-8" pageEncoding="UTF-8"%> 

<%@page language="java" import="model.webUser.*" %> 
<%@page language="java" import="com.google.gson.*" %>


<%

    session.invalidate();
    StringData noUser = new StringData();
    noUser.errorMsg = "User Logged Of";
    Gson gson = new Gson();
    out.print(gson.toJson(noUser).trim());

%> 
