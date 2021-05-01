function sneakersFromJSON() {
    "use strict"
    var contentDiv = document.createElement("div");

    //Call AJAX function to extract json file into object
    ajax("json/sneakers.json", processUserData, contentDiv);
    function processUserData(sneakerList) { // callback function

        // now userList has been populated with data from the AJAX call to file users.json
        console.log("sneaker list (in processUserData) on next line - open triangle to see data");
        console.log(sneakerList);

        // Create new object list where all properties are <td> elements
        var newSneakerList = [];
        for (var i = 0; i < sneakerList.length; i++) {
            newSneakerList[i] = {};
            newSneakerList[i]._Image = SortableTableUtils.makeImage(sneakerList[i].image, "8rem");
            newSneakerList[i].User_Email = SortableTableUtils.makeText(sneakerList[i].userEmail);
            newSneakerList[i].Sneaker_Name = SortableTableUtils.makeText(sneakerList[i].sneakerName);
            newSneakerList[i].Brand = SortableTableUtils.makeText(sneakerList[i].brand);
            newSneakerList[i].Retail_Price = SortableTableUtils.makeNumber(sneakerList[i].retailPrice, 2);
            newSneakerList[i].Wholesale_Price = SortableTableUtils.makeNumber(sneakerList[i].wholesalePrice, 2);
            newSneakerList[i].Star_Rating = SortableTableUtils.makeNumText(sneakerList[i].rating);

        }

        // MakeTableBetter expects all properties to be <td> elements.
        var sneakerMakeObject = {};
        sneakerMakeObject.title = "Sneakers Table";
        sneakerMakeObject.objList = newSneakerList;
        sneakerMakeObject.sortOrderPropName = "User_Email";
        sneakerMakeObject.sortIcon = "icons/sortUpDown16.png";

        var sneakerContent = makeClickSortTable(sneakerMakeObject);
        contentDiv.appendChild(sneakerContent);

    }
    return contentDiv;
}
