


function dropdownFw(clickedEle, hideClass, showClass, contentClass) {

    var nextEle = clickedEle.parentElement.getElementsByTagName("div")[1];
    var dropConArray = document.getElementsByClassName(contentClass);

    window.onclick = function () {

        hideAllContent(dropConArray);

    };


    if (nextEle.classList.contains(showClass)) {
        hide(nextEle);
    } else {


        hideAllContent(dropConArray);
        show(nextEle);


    }


    function hide(ele) {
        ele.classList.remove(showClass);
        ele.classList.add(hideClass);
    }

    function show(ele) {

        ele.classList.remove(hideClass);
        ele.classList.add(showClass);
    }
    function hideAllContent(classList) {

        for (var i = 0; i < classList.length; i++) {


            hide(classList[i]);


        }
    }


    event.stopPropagation(); // Lets handlers operate individually
}


// end function dropdown



