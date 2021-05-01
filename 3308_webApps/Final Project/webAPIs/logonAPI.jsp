<%-- 
    Document   : logonAPI
    Created on : Mar 13, 2021, 12:11:34 PM
    Author     : henry
--%>

<%@page contentType="application/json; charset=UTF-8" pageEncoding="UTF-8"%> 
<%@page language="java" import="dbUtils.*" %>
<%@page language="java" import="model.webUser.*" %> 
<%@page language="java" import="view.WebUserView" %> 
<%@page language="java" import="com.google.gson.*" %>
<%

    StringData sd = new StringData();
    String userEmail = request.getParameter("userEmail");
    String userPassword = request.getParameter("userPassword");
    if ((userEmail == null) || (userPassword == null)) {
        sd.errorMsg = "Cannot search for user: 'userEmail' and 'userPassword' most be supplied";
    } else {
        DbConn dbc = new DbConn();
        sd.errorMsg = dbc.getErr();
        if (sd.errorMsg.length() == 0) {
            System.out.println("*** Ready to call findByUsernamePassword");
            sd = DbMods.findByUsernamePassword(dbc, userEmail, userPassword);
            if ((sd.errorMsg.equals(""))) {
                session.setAttribute("loggedOnUser", sd);
            } else {

                if (session.getAttribute("loggedOnUser") != null) {
                    sd.errorMsg = "User Logged Off due to Invalid Logon Credentials";
                    session.invalidate();
                }

            }
        }
        dbc.close();
    }
    Gson gson = new Gson();
    out.print(gson.toJson(sd));
%>          
