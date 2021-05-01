function makeClickSortTable(mainObj) {  //title, objList, sortOrderPropName, sortIcon

    // This function sorts the array of objects in "list" by object property "byProperty". 
    // Think of list as an I/O parameter (gets changed by the fn).
    
    function jsSort(subObjList, byProperty, reverseSort) {



        if (!subObjList || !subObjList[0]) {
            var message = "Cannot sort. Need a subObjList with at least one object";
            console.log(message);
            alert(message);
            return;  // early return -- dont try to sort.
        }

        var obj = subObjList[0];
        if (!obj[byProperty]) {
            var message = "subObjList does not have property " + byProperty + " -- cannot sort by that property.";
            console.log(message);
            alert(message);
            return;  // early return -- dont try to sort.
        }

        if (!obj[byProperty].sortOrder || obj[byProperty].sortOrder === null) {
            var message = "Cannot sort subObjList by property " + byProperty +
                    " because this property never had it's sortOrder set (by a method in SortableTableUtils.js).";
            console.log(message);
            alert(message);
            return;  // early return -- dont try to sort.
        }

        // q and z are just elements in the array and the funcction has to return negative or positive or zero 
        // depending on the comparison of q and z.
        // using JS associative array notation (property name char string used inside square brackets 
        // as it if was an index value). 

        subObjList.sort(function (q, z) {  // in line (and anonymous) def'n of fn to compare list elements. 
            // the function you create is supposed to return positive (if first bigger), 0 if equal, negative otherwise.

            // using JS associative array notation, extract the 'byProperty' property from the two
            // list elements so you can compare them.

        

            var qVal = q[byProperty].sortOrder;
            var zVal = z[byProperty].sortOrder;


            var c = 0;
            if (qVal > zVal) {
                c = 1;
            } else if (qVal < zVal) {
                c = -1;
            }
            console.log("comparing " + qVal + " to " + zVal + " is " + c);

            if (!reverseSort) {
                return c;
            } else {
                return -c;
            }

        });

    } // jsSort

    function isToShow(obj, searchKey) {
        if (!searchKey || searchKey.length === 0) {
            return true; // show the object if searchKey is empty
        }
        var searchKeyUpper = searchKey.toUpperCase();
        for (var prop in obj) {

            var propVal = obj[prop]; // associative array, using property name as if index. 
            // var checkVal = propVal.filterValue;
            var checkVal = propVal.innerHTML;
            /**  if (!propVal || propVal.length === 0) {
             propVal = " ";
             } */
            console.log("checking if " + searchKeyUpper + " is in " + checkVal);
            var checkValUpper = checkVal.toUpperCase();
            if (checkValUpper.includes(searchKeyUpper)) {

                // do not say it's a hit if it's an image tag 
                // that can have a really long URL in its src attribute.
                if (!checkValUpper.includes("<IMG")) {
                    console.log("yes it is inside");
                    return true;
                }
            }
        }
        console.log("no it is not inside");
        return false;
    } // isToShow 

    function addFilteredTableBody(table, objList, filterValue) {

        // remove old tbody element if there is one (else you'll get the new sorted rows 
        // added to end of what's there).
        var oldBody = table.getElementsByTagName("tbody");
        if (oldBody[0]) {
            console.log("ready to remove oldBody");
            table.removeChild(oldBody[0]);
        }

        // Add one row (to HTML table) per element in the array.
        // Each array element has a list of properties that will become 
        // td elements (Table Data, a cell) in the HTML table. 
        var tableBody = document.createElement("tbody");
        table.appendChild(tableBody);

        // To the tbody, add one row (to HTML table) per object in the object list.
        // To each row, add a td element (Table Data, a cell) that holds the object's 
        // property values. 

        for (var i in objList) {
            if (isToShow(objList[i], filterValue) || filterValue === undefined) {
                var tableRow = document.createElement("tr");
                tableBody.appendChild(tableRow);

                // create one table data <td> content matching the property name
                var obj = objList[i];
                for (var prop in obj) {

                    // NOTE: these three lines are taken from MakeTableBasic, 
                    // just putting whatever is in the object's property straight 
                    // into the innerHTML of the Table Data element.

                    // MakeTableBetter expects the object properties to alrady 
                    // be Table Data (td) elements.

                    // var td = document.createElement("td");
                    // td.innerHTML = obj[prop];
                    tableRow.appendChild(obj[prop]);

                }
            }
        }

    } // addFilteredTableBody


    // remove the tbody from 'table' (if there is one). 
    // sort 'list' by 'sortOrderPropName'. 
    // add a new tbody to table, inserting rows from the sorted list.
    function addTableBody(table, list, sortOrderPropName, reverseSort) {  // reverse sort is either true or false

        // remove old tbody element if there is one (else you'll get the new sorted rows 
        // added to end of what's there).
        var oldBody = table.getElementsByTagName("tbody");
        if (oldBody[0]) {
            console.log("ready to remove oldBody");
            table.removeChild(oldBody[0]);
        }

        jsSort(list, sortOrderPropName, reverseSort);

        // Add one row (to HTML table) per element in the array.
        // Each array element has a list of properties that will become 
        // td elements (Table Data, a cell) in the HTML table. 
        var tableBody = document.createElement("tbody");
        table.appendChild(tableBody);

        // To the tbody, add one row (to HTML table) per object in the object list.
        // To each row, add a td element (Table Data, a cell) that holds the object's 
        // property values

        // alert(mainObj.objList[0].User_Email); 
        for (var i in mainObj.objList) {
            var tableRow = document.createElement("tr");
            tableBody.appendChild(tableRow);

            // create one table data <td> content matching the property name
            var obj = mainObj.objList[i];

            for (var prop in obj) {

                // **** THE ONLY CHANGE IS HERE ****
                // obj[prop] should already hold a "td" tag
                tableRow.appendChild(obj[prop]);
                // **** END OF THE CHANGE       ****
            }
        }

    } // addTableBody



    // **** ENTRY POINT ****

    // Create a container to hold the title (heading) and the HTML table
    var container = document.createElement("div");
    container.classList.add("clickSort");

    // Add a heading (for the title) and add that to the container
    var heading = document.createElement("h2");
    heading.innerHTML = mainObj.title;
    container.appendChild(heading);

    // create an area (between title and html table) where the user 
    // can enter their search criteria.
    var searchDiv = document.createElement("div");
    container.appendChild(searchDiv);
    searchDiv.innerHTML = "<b>Filter by: </b>";

    // Create a filter text box for user input and append it
    var searchInput = document.createElement("input");
    searchDiv.appendChild(searchInput);

    // Create a new HTML table tag (DOM object) and add that to the container.
    var newTable = document.createElement("table");
    container.appendChild(newTable);

    // To the HTML table, add a tr element to hold the headings of our table.
    var headerRow = document.createElement("tr");
    newTable.appendChild(headerRow);

    // ADD one column heading per property in the object list.
    var obj = mainObj.objList[0];
    for (var propName in obj) {
        var headingCell = document.createElement("th");
        headingCell.reverseSort = false; //set intitial sort aorder to ascending

        if (propName === mainObj.sortOrderPropName) {
            headingCell.reverseSort = true;  // Made sure i toggled the default sort value for initial sort by colums)
        }

        // underscores in the property name will be replaced by space in the column headings.
        headingText = propName.replace("_", " ");

        //alert(headingText);

        // if a property name starts with underscore then we assume that column should not 
        // be click sortable (may be it is an image column or something). 
        if (propName[0] !== "_") {


            headingText = "<img src='" + mainObj.sortIcon + "'/> " + headingText;
            headingCell.sortPropName = propName;
            headingCell.onclick = function () {


                console.log("WILL SORT ON " + this.sortPropName);
                addTableBody(newTable, mainObj.objList, this.sortPropName, this.reverseSort);
                addFilteredTableBody(newTable, mainObj.objList, searchInput.value);

                this.reverseSort = !this.reverseSort; //  toggle sort order

                // mainObj.ascendingSort = !mainObj.ascendingSort; //  toggle sort order
            };

        }
        headingCell.innerHTML = headingText;
        headerRow.appendChild(headingCell);
    }

    // After sorting objList by sortOrderPropName, create or replace the tbody 
    // populated with data from the sorted objList.
    addTableBody(newTable, mainObj.objList, mainObj.sortOrderPropName);

    searchInput.onkeyup = function () {
        console.log("search filter changed to " + searchInput.value);
        addFilteredTableBody(newTable, mainObj.objList, searchInput.value);

    };

    return container;

}  // makeClickSort