function liveSneakers() {
    "use strict"
    var contentDiv = document.createElement("div");

    //Call AJAX function to extract StringDatalist object from the sneakers package  converted into a JSON file using th GSON jar file
    ajax("webAPIs/listSneakersAPI.jsp", processSneakerData, contentDiv);
    function processSneakerData(sneakerObj) { // callback function

        if (sneakerObj.dbError.length > 0) { //Ensure errors are checked first
            contentDiv.innerHTML = sneakerObj.dbError;
            return;
        }


        // now sneakerObj has been populated with data from the AJAX call to file sneakers.json
        console.log("sneaker list (in processSneakerData) on next line - open triangle to see data");
        console.log(sneakerObj.sneakersList);

        // Create new object list where all properties are <td> elements
        var newSneakerList = [];
        for (var i = 0; i < sneakerObj.sneakersList.length; i++) {
            newSneakerList[i] = {}; // add new empty object to array

            newSneakerList[i].Sneaker_Id = SortableTableUtils.makeNumber(sneakerObj.sneakersList[i].sneaker_id, false);
            newSneakerList[i].Image = SortableTableUtils.makeImage(sneakerObj.sneakersList[i].image, "6.5rem");
            newSneakerList[i].Sneaker_Name = SortableTableUtils.makeText(sneakerObj.sneakersList[i].sneaker_name, false);
            newSneakerList[i].Brand = SortableTableUtils.makeText(sneakerObj.sneakersList[i].brand, false);
            newSneakerList[i].Stock = SortableTableUtils.makeNumber(sneakerObj.sneakersList[i].stock, false);
            newSneakerList[i].Wholesale_Price = SortableTableUtils.makeNumber(sneakerObj.sneakersList[i].wholesale_price, true);
            newSneakerList[i].Retail_Price = SortableTableUtils.makeNumber(sneakerObj.sneakersList[i].retail_price, true);
            newSneakerList[i].Rating = SortableTableUtils.makeNumText(sneakerObj.sneakersList[i].rating, true);
            newSneakerList[i].User = SortableTableUtils.makeText(sneakerObj.sneakersList[i].web_user_id + "&nbsp;" + sneakerObj.sneakersList[i].user_email);
            newSneakerList[i]._Update = SortableTableUtils.makeLink(
                    "<img src='" + CRUD_icons.update + "'  style='width:1rem' />", // innerHTML of link
                    '#/sneakerUpdate/' + sneakerObj.sneakersList[i].sneaker_id             // href of link
                    );
            newSneakerList[i]._Delete = SortableTableUtils.makeImage(CRUD_icons.delete, '1rem');

            newSneakerList[i]._Delete.firstChild.classList.add("clickableImg");
            const sneakerId = sneakerObj.sneakersList[i].sneaker_id;
            newSneakerList[i]._Delete.onclick = function () {
                deleteSneaker(sneakerId, this);
            };
            // alert(sneakerId);

        }
        var insertOnClick = function () {
            window.location.hash = "#/sneakerInsert";
        };
        // MakeTableBetter expects all properties to be <td> elements.
        var sneakerMakeObject = {};
        sneakerMakeObject.title = "Live Sneakers List";
        sneakerMakeObject.objList = newSneakerList;
        console.log("Live List Below");
        console.log(newSneakerList);
        sneakerMakeObject.sortOrderPropName = "Sneaker_Id";
        sneakerMakeObject.sortIcon = "icons/sortUpDown16.png";
        sneakerMakeObject.insertObj = {icon: "icons/insert.png", onClick: insertOnClick, header:"Insert Sneaker"};

        var sneakerContent = makeClickSortTable(sneakerMakeObject);
        contentDiv.appendChild(sneakerContent);

        // invoke a web API passing in sneakerId to say which record you want to delete. 
// but also remove the row (of the clicked upon icon) from the HTML table -- if Web API sucessful... 
        function deleteSneaker(sneakerId, td) {
            var myModal = modalFw;
            console.log("to delete sneaker " + sneakerId);

            myModal.setBackgroundColor("white"); //reset backfround color;
            myModal.confirm("Are you sure you want to delete sneaker " + sneakerId + "? ", confirmCallback) //ModalFw  reusable Component

            function confirmCallback() {
                ajax("webAPIs/deleteSneakerAPI.jsp?deleteId=" + sneakerId, deleteSneakerFromDB, contentDiv); //Delete from DB 

                function deleteSneakerFromDB(obj) { // AJAX Callback

                    if (obj.errorMsg === "") {

                        myModal.setBackgroundColor("#f2faf0");
                        myModal.alert("Delete Successful", "Sneaker " + sneakerId + " is now deleted");

                        // get the row of the cell that was clicked 
                        var dataRow = td.parentNode;
                        var rowIndex = dataRow.rowIndex - 1; // adjust for oolumn header row?
                        var dataTable = dataRow.parentNode;
                        dataTable.deleteRow(rowIndex);  //delete row
                    } else {
                        myModal.setBackgroundColor("#faf0f0");
                        myModal.alert("Delete Unsuccessful", obj.errorMsg);
                    }

                }
                ;

            }
            ;





        }

    }
    return contentDiv;
}
