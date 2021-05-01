/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var account = {};

(function(){ // This is an IIFE immediately invoking function execution (for encasulating private function)
    
        
        function buildProfile(userObj) { // NOW PRIVATE, can be called by any of the account functions…
            var msg = "";
            if (userObj.errorMsg.length > 0) {
            msg += "<strong class = 'errorMsg'>Error: " + userObj.errorMsg + "</strong>";
            } else {
            msg += "<strong>Welcome Web User " + userObj.webUserId + "</strong>";
            msg += "<br/> Birthday: " + userObj.birthday;
            msg += "<br/> MembershipFee: " + userObj.membershipFee;
            msg += "<br/> User Role: " + userObj.userRoleId + " " + userObj.userRoleType;
            msg += "<p> <img src ='" + userObj.image + "'> </p>";
            }
            return msg;
         };
         
        account.logon = function(){
            var mainDiv = document.createElement("div");
            mainDiv.classList.add("find");

            var userEmailSpan = document.createElement('span');
            userEmailSpan.innerHTML = "Email Addresss";
            mainDiv.appendChild(userEmailSpan);

            var userEmailInput = document.createElement("input");
            mainDiv.appendChild(userEmailInput);

            var userPasswordSpan = document.createElement('span');
            userPasswordSpan.innerHTML = "Password";
            mainDiv.appendChild(userPasswordSpan);

            var userPasswordInput = document.createElement("input");
            userPasswordInput.setAttribute("type", "password");
            mainDiv.appendChild(userPasswordInput);
            
            var submitButton = document.createElement("button");
            submitButton.innerHTML = "Submit";
            mainDiv.appendChild(submitButton);
            
            var msgDiv = document.createElement("div"); //for errors and other alert messages
            mainDiv.appendChild(msgDiv);
            
            submitButton.onclick = function () {

                // You have to encodeURI user input before putting into a URL for an AJAX call.
                // Otherwise, your URL may be refused (for security reasons) by the web server.
               // var url = "webAPIs/getUserByIdAPI.jsp?userId=" + encodeURI(mFeeInput.value);
                var url = "webAPIs/logonAPI.jsp?userEmail=" + encodeURI(userEmailInput.value)+"&userPassword="+ encodeURI(userPasswordInput.value);
                console.log("onclick function will make AJAX call with url: " + url);
                
                ajax(url, processLogon, msgDiv);

                function processLogon(obj) {
                    
                    msgDiv.innerHTML = buildProfile(obj);
                }
                };  // onclick function
            
            return mainDiv;

        };
        
        account.getProfile = function(){
            
            var mainDiv = document.createElement("div");
            mainDiv.classList.add("find");
            
            var msgDiv = document.createElement("div"); //for errors and other alert messages
            mainDiv.appendChild(msgDiv);
            
            var url = "webAPIs/getProfileAPI.jsp";
            ajax(url,processLogon,msgDiv);
            
            function processLogon(obj) {
                    
                    msgDiv.innerHTML = buildProfile(obj);
             };
                
            return mainDiv;

        };
        account.logoff = function(){
            
            var mainDiv = document.createElement("div");
            mainDiv.classList.add("find");
            
            var msgDiv = document.createElement("div"); //for errors and other alert messages
            mainDiv.appendChild(msgDiv);
            
            var url = "webAPIs/logoffAPI.jsp";
            ajax(url,processLogon,msgDiv);
            
            function processLogon(obj) {
               
                    
                    msgDiv.innerHTML = "<strong>User Logged off</strong>";
             };
                
            return mainDiv;

        };
}());