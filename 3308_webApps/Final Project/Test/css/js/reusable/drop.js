/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function drop (clickedEle, hideClass, showClass) {
    //events callback
        window.onclick = function(event){
        //event.target is what the mouse is clicking 
        const clickedElement = event.target;
        const dropdowns = document.getElementsByClassName("dropContent");

        if(clickedElement.classList.contains("dropHeader")){
            // show the current dropdown and hide all other

            // go up one level and get the child element parent
            let parent = clickedElement.parentElement;

            let currentElement = parent.getElementsByClassName("dropContent")[0];

            for(let i = 0; i < dropdowns.length; i++) {
                if (dropdowns[i] === currentElement) {
                    // toggle the clicked element between show/hide
                    if (currentElement.classList.contains("show"))
                        hide(currentElement)
                    else
                        show(currentElement)
                }
                else
                    hide(dropdowns[i]);
            }
            
        }
        else{
            for(let i = 0; i < dropdowns.length; i++) {
                hide(dropdowns[i]);
            }
        }
    }
    // console.log("clickedEle on next line");
    // console.log(clickedEle);
    // getElementsByTagName returns an array of all the elements (from the starting 
    // point which is the parent of the clicked div. Selecting the [1] element should get 
    // us to the drpContent div. 
//    var nextEle = clickedEle.parentElement.getElementsByTagName("div")[1];
//    // console.log("nextEle on next line");
//    // console.log(nextEle);
//    if (nextEle.classList.contains(showClass)) {
//        hide(nextEle);
//    } else {
//        show(nextEle);
//    }
    /* Note: I could have just added and removed class "show" (and not even have a "hide" class) 
     * but I wanted to also animate the dropcontents as they leave the screen...  */
    function hide(ele) {    
        ele.classList.remove(showClass);
        ele.classList.add(hideClass);
    }
    function show(ele) {
        ele.classList.remove(hideClass);
        ele.classList.add(showClass);
    }
} // end function dropdown

