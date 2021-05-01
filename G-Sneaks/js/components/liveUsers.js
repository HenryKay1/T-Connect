function liveUsers() {
    "use strict"
    var contentDiv = document.createElement("div");

    //Call AJAX function to extract StringDatalist object from the users package  converted into a JSON file using th GSON jar file
    ajax("webAPIs/listUsersAPI.jsp", processUserData, contentDiv);
    function processUserData(userObj) { // callback function

        if (userObj.dbError.length > 0) { //Ensure errors are checked first
            contentDiv.innerHTML = userObj.dbError;
            return;
        }
        
     


        // now userObj has been populated with data from the AJAX call to file users.json
        console.log("user list (in processUserData) on next line - open triangle to see data");
        console.log(userObj.webUserList);

        // Create new object list where all properties are <td> elements
        var newUserList = [];
        for (var i = 0; i < userObj.webUserList.length; i++) {
            newUserList[i] = {}; // add new empty object to array

            newUserList[i].User_Id = SortableTableUtils.makeNumber(userObj.webUserList[i].webUserId, false);
            newUserList[i].Image = SortableTableUtils.makeImage(userObj.webUserList[i].image, "6.5rem");
            newUserList[i].User_Credentials = SortableTableUtils.makeText(userObj.webUserList[i].userEmail + "<br/>PW (to test Logon): " + userObj.webUserList[i].userPassword);
            newUserList[i].Birthday = SortableTableUtils.makeDate(userObj.webUserList[i].birthday);
            newUserList[i].Membership_Fee = SortableTableUtils.makeNumber(userObj.webUserList[i].membershipFee, true);
            newUserList[i].Role = SortableTableUtils.makeText(userObj.webUserList[i].userRoleId + "&nbsp;" + userObj.webUserList[i].userRoleType);
            newUserList[i]._Update = SortableTableUtils.makeLink(
                    "<img src='" + CRUD_icons.update + "'  style='width:1rem' />", // innerHTML of link
                    '#/userUpdate/' + userObj.webUserList[i].webUserId             // href of link
                    );
            newUserList[i]._Delete = SortableTableUtils.makeImage(CRUD_icons.delete, '1rem');
            
            newUserList[i]._Delete.firstChild.classList.add("clickableImg");
            const userId = userObj.webUserList[i].webUserId;
            newUserList[i]._Delete.onclick = function () {
                deleteUser(userId, this);
            };



        }

        var insertOnClick = function(){
           window.location.hash = "#/userInsert";  
        };
        // MakeTableBetter expects all properties to be <td> elements.
        var userMakeObject = {};
        userMakeObject.title = "Live Users List";
        userMakeObject.objList = newUserList;
        console.log("Live List Below");
        console.log(newUserList);
        userMakeObject.sortOrderPropName = "User_Id";
        userMakeObject.sortIcon = "icons/sortUpDown16.png";
        userMakeObject.insertObj = {icon:"icons/insert.png",onClick: insertOnClick,header:"Insert User"};
        console.log(userMakeObject);

        var userContent = makeClickSortTable(userMakeObject);
        contentDiv.appendChild(userContent);

    }
    // invoke a web API passing in userId to say which record you want to delete. 
// but also remove the row (of the clicked upon icon) from the HTML table -- if Web API sucessful... 
    function deleteUser(userId, td) {
        var myModal = modalFw;
        console.log("to delete user " + userId);
        
       
        myModal.setBackgroundColor("white"); //reset backfround color;
        myModal.confirm("Are you sure you want to delete user " + userId + "? ", confirmCallback); //ModalFw  reusable Component

        function confirmCallback() {
            ajax("webAPIs/deleteUserAPI.jsp?deleteId=" + userId, deleteUserFromDB, contentDiv); //Delete from DB 

            function deleteUserFromDB(obj) { // AJAX Callback

                if (obj.errorMsg === "") {
                    myModal.setBackgroundColor("#f2faf0");
                    myModal.alert("Delete Successful","User "+userId+" is now deleted");
                    // get the row of the cell that was clicked 
                    var dataRow = td.parentNode;
                    var rowIndex = dataRow.rowIndex - 1; // adjust for oolumn header row?
                    var dataTable = dataRow.parentNode;
                    dataTable.deleteRow(rowIndex);  //delete row
                } else {
                    myModal.setBackgroundColor("#faf0f0");
                    myModal.alert("Delete Unsuccessful",obj.errorMsg);
                }

            };

        };





    }
    return contentDiv;
}
