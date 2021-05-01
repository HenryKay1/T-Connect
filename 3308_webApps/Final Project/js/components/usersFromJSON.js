function usersFromJSON() {
    "use strict"
    var contentDiv = document.createElement("div");

    //Call AJAX function to extract json file into object
    ajax("json/users.json", processUserData, contentDiv);
    function processUserData(userList) { // callback function

        // now userList has been populated with data from the AJAX call to file users.json
        console.log("user list (in processUserData) on next line - open triangle to see data");
        console.log(userList);

        // Create new object list where all properties are <td> elements
        var newUserList = [];
        for (var i = 0; i < userList.length; i++) {
            newUserList[i] = {};
            newUserList[i]._Image = SortableTableUtils.makeImage(userList[i].image, "4rem");
            newUserList[i].User_Email = SortableTableUtils.makeText(userList[i].userEmail);
            newUserList[i].Birthday = SortableTableUtils.makeDate(userList[i].birthday);
            newUserList[i].Membership_Fee = SortableTableUtils.makeNumber(userList[i].membershipFee, 2);
            var userRoleId = SortableTableUtils.makeText(userList[i].userRoleId);
            var userRole = SortableTableUtils.makeText(userList[i].userRoleType);
            userRoleId.innerHTML = userRoleId.innerHTML + " " + userRole.innerHTML;
            newUserList[i].Role = userRoleId;
        }

        // MakeTableBetter expects all properties to be <td> elements.
        var userMakeObject = {};
        userMakeObject.title = "Users Table";
        userMakeObject.objList = newUserList;
        userMakeObject.sortOrderPropName = "User_Email";
        userMakeObject.sortIcon = "icons/sortUpDown16.png";

        var userContent = makeClickSortTable(userMakeObject);
        contentDiv.appendChild(userContent);

    }
    return contentDiv;
}
