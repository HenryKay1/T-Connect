/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function blog(){
    var content = `
        <h2>My Blog</h2>
        <h2>Database</h2>
            <ul>
                <li>This database shall include the avatars.</li>
                <li>Wan</li>
                <li>Aang</li>
                <li>Korra</li>
            </ul>
        <h2>Describes your web design/development experience. </h2>
        <p>So far, it has been pretty simple. It wasn't too hard to understand the idea,
            and I found it educational and fun to design my own web site. 
            The web site Sally had provided us was very helpful with learning the foundations of HTML.
        </p>
            
        <h2>Describe what you found easy, hard/confusing, and valuable about this HW</h2>
        <p>
            What I found hard/confusing at first was understanding the HTML structure and the code. 
            Overtime, it got easier 
            with the materials that was provided for us. This is valuable for students like me because web development is a big 
            thing and as a computer science major, i think it is important for us to learn this.
        </p>
        <h4>Homework 1</h4>
        <p>
            I don't think the assignments are hard, so far so good. 
            I have learned a good amount with only a week into this class.
            One thing I will say is that the PDF for the lab activity and Homework are somewhat difficult to understand.
            I would read it at least two to three times to get a decent understanding of it.<br/>
        </p>
        <h4>Homework 2</h4>
        <p>
            This assignment was definitely harder than the previous. With adding JavaScript into the webpage, it changed the diffculty.)
            As someone who didnt have prior experience with JavaScript, it was a bit harder to get used to, and there was 
            methods that I was not aware of like getElementByIds and such. Overall, It was a good learning experiences. With the TA 
            tutoring, it definitely did help with the learning.
        </p
        
        
    `;
    
    var ele = document.createElement("div");
    ele.innerHTML = content;
    return ele;    
    
}