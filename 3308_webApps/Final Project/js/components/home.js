function home () {

   
    var content = `
      <div id = "descPic" >
                <div id = "desc" >
                    <p class = "myHeader"  style  = "width : 97%"> Description</p>

                    <p style = "font-size:20px; ">
                    Have your ever attempted buying sneakers to sell, but the costs leave you with little or no profit ?
                    Well, that's not a problem anymore. Browse through our vast collection of sneakers and pick what works best for your business. 
                    Affordable names, great quality, and did I mention you are 50 orders away from FREE SHIPPING for your next 100 orders? 
                    Start investing now and thank us later &#128521;.Click the link  to view our <a style="color: orange;" target="_blank" href="https://www.adidas.com/us/shoes">Wholesale Bundles</a>
                       </p>
                </div>
                <div id = "pic"> 

                    <img src="pics/Homepage Image 1.jpg" id= "homeImg" style=" border-radius:10px;">

                </div>
       </div>

    `;
    
    var ele = document.createElement("div");
    ele.innerHTML = content;
    return ele; 
}