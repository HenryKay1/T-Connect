

function routeFw(routingObj) {
   
    if (!routingObj.routingTable[routingObj.currentHash]) {
        var ele = document.createElement("div");
        ele.innerHTML = "<h4>Error: path '" + path + "' was never added to the route array</h4>";
        inject(ele, routingObj.contentId);
    } else {
        var newDOM = routingObj.routingTable[routingObj.currentHash](); // routes[path] is a function that returns a DOM element
        inject(newDOM, routingObj.contentId); // pass the DOM element to the inject function. 
    }

    function inject(content, elementId) {
        document.getElementById(elementId).innerHTML = "";
        document.getElementById(elementId).appendChild(content);
    }
}




