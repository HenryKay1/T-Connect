<%-- 
    Document   : getProfileAPI
    Created on : Mar 13, 2021, 12:12:06 PM
    Author     : henry
--%>

<%@page contentType="application/json; charset=UTF-8" pageEncoding="UTF-8"%> 

<%@page language="java" import="model.webUser.*" %> 
<%@page language="java" import="com.google.gson.*" %>


<%
   
if ( session.getAttribute("loggedOnUser") != null  ) {
    StringData loggedOnWebUser = (StringData) session.getAttribute("loggedOnUser");
    
   
    Gson gson = new Gson();
    out.print(gson.toJson(loggedOnWebUser).trim());
    
    
}
else{
    StringData noUser = new StringData();
    noUser.errorMsg = "No User Logged On";
    Gson gson = new Gson();
    out.print(gson.toJson(noUser).trim());

}
    

%> 
