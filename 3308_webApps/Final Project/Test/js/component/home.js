/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function home(){
    var content = `
    
    <h1>Avatar The Last Airbender</h1>
            <p>
                This web site is for those have watched or even interested in the series <strong>"Avatar, The Last AirBender"</strong>, 
                and <strong>"Avatar, The Legend of Korra"</strong>. I was inspired by this theme for my web site because I was watching
                Avatar as I was starting this homework and I think it is a fun concept to work with for me and the viewers. 
                This series is very popular among people and I think people will find this web site entertaining.
            </p>
                <div>
                    <a style="color: teal;" target="_blank"
                       href="https://www.youtube.com/watch?v=L2zlzzi3o4U">Short summary of the first series of the Avatar
                    </a>
                
                </div>
          
            <p style="text-align:center;">
                <img src="pics/avatar.jpg" style="width:50%; border-radius:10px;">
            </p>
            <h5>
                When We Hit Our Lowest Point, We Are Open To The Greatest Change...
            </h5>      
    `;
    var ele = document.createElement("div");
    ele.innerHTML = content;
    return ele; 
    
}
