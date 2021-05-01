function blog() {

// ` this is a "back tick". Use it to define multi-line strings in JavaScript.
var content = 
            `
            <div   id = "blogContent" >
                
                <h1>Database/Creator's Information</h1>
                

                <h2> Web Experience </h2>
                <p> 
                    I have a decent background with web design and web development. The most sophisticated work I did
                    was a website where students can logon to, save their current course information,ask questions
                    to other students in their class, answer questions, and react to other student posts, in a nutshell.
                    I was able to learn a lot about web design  and development considering where I was before the project.
                    However, I plan on learning more from web apps and this project.
                </p>

                <h2> Database Proposal </h2>
                <p> 

                    Our database is designed to store user and sneaker, then keep track of sales transactions involving between users and the sneakers.User information  is added when
                    they sign up for the service and sneaker information  is  added at our discretion.( hypothetically when we produce the sneakers, or buy from somewhere else).Now, a 
                    user ( Salesperson) triggers a transaction when they purchase a sneaker. Then that information is stored in our the User_Role table.
                    Below list below consists of detailed information of out 3 tables respectively.

                </p>


                <ul  class = "edited" style = "font-size:17px; "> <b >User Table</b>
                    <li>User Id (Primary Key)</li> 
                    <li>Email</li>
                    <li>Password</li>
                    <li>Membership Fee</li>
                    <li>Birthday</li>
                    
                </ul>

                <ul  class = "edited"   style = "font-size:17px;" ><b>Product Table</b>

                    <li>Sneaker Id (Primary Key)</li> 
                    <li>Brand</li> 
                    <li>Name</li> 
                    <li>Stock</li> (Quantity) 
                    <li>WholeSale Price</li> 
                    <li>Retail Price</li> 
                    <li>User Id</li> (Foreign Key to tag User,which is the Saleperson)

                </ul>

                <ul  class = "edited"  style = "font-size:17px;" ><b>User_Role Table</b>

                    <li>User_Role_Id (Primary Key)</li> 
                    <li>User Id (Foreign Key)</li> 
                    <li>Sneaker Id (Foreign Key)</li> 
                    <li>Description</li> 
                    <li>Date/Time</li>
                    <li>Tracking Number</li>



                </ul>

                <h2> Homepage Homework Feedback</h3>
                <p> 

                    Homework 1(HW01) was quite helpful.I learned that when dealing with nested "div" elements, the flex attribute and its variants could be 
                    very useful.Especially in my sales case, where I would have be displaying different sneakers on the product page, 
                    which are most likely going to be nested "div" elements.
                </p>
               <h2> Javascript UI Homework Feedback </h2>
                <p> 
                    This homework(HW02) was a good learning experience for me.It took a while to understand the profesors drop js code becasue I never implemented
                    nav dropdowns that way. However, after the struggle I finally learned a new and probably  better way implement navbar dropdowns.
                    Similarly, learning about reusable routing  very informative. I normally use links, which open other html pages, hence copying and pasting shared HTML between pages.
                    Now, I could just use routing anf javascript functions to change the unshared HTML content, which to me is a better approch if possible.
                </p>
    
                <h2> Javascript Objects </h2>
                <p> 
                    I didn't quite see the great importance  of Provider Style Coding, Dependency Injection and the Single Responsibility Principle. However
                    I got to see how convenient and useful those aspects are. On top of that the use or objects even makes code more organized. Furthermore
                    it brings the code closer to the real world lets the coder think outside the box efficiently. The stressful part of this homework was trying 
                    to make my stylesheet according to the professor DOM arrangement but I could't acheive my desires, so I had to refactor the DOM arrangement.Moving
                    foward DOM objects are the way to go, now I just need to focus  on security concerns.
                </p>
    
                <h2>Database</h2>
                <p> 
                    On a scale of one to 10, I'll give myself a 5.9/10, when it comes to basic querries and functionality. I know there's alot more to databases than
                    generic statements like select, join, insert statements etc As far as my experience, I worked on an app, managing the backend in accordance with the frontend functionality.
                    So I at least have a decent idea. Using mySQL workbench was way more convenient compared to a shell program.However, the hardest part of this homework
                    was implementing the foreign keys after inserting data.Nevertheless, I learned how to manage foreign keys stright from mySQL's UI.
                    Click  <a target= "_blank" href = "Files/Kombem_database.pdf">here</a> to open a file with  a detailed  view of the database properties.
                </p>
    
                <h2>Click Sorting and Fitering  HTML Tables from json file</h2>
                <p> 
                    This was so far the toughtest for me. Professor SK, some other student and I had to do some tracing to make sure us students  were treating DOM elements
                    appropriately and not like non-DOM variables. Also, the reverse function took some thought and time to implement. However, I'm happy it was that way because I learned
                    how to better handle situations without using session variables, that is, using objects because they have that related memory and even better, DOM objects
                </p>
                <h2>Tutorial Proposal</h2>
                <p> 
                    It was a little harder for me to come up with the point of view code because I had to build it from scratch. My referaal page was only there to hightlight some
                    online store(fsahionova) that implments what I was trying to accomplish, and I couldn't copy and paste their code because the complete code  is not public. Anyways, I'm greatful because 
                    now I have a better understanding of how to implement the lower level code for the main tutorial. Before this class,I had no regard for creating high level re-usable 
                    components,so coming up with this point of view code is what I'd do before this class. However, looking at it now, I see that making re-usable code with the help of objects oriented programming
                    is powerful and way more efficient in terms of time spent and debugging.</br>
                    Click  <a target= "_blank" href = "tutorial/download/proposal.pdf">here</a> to open tutotial proposal.</br>
                    Click  <a target= "_blank" href = "tutorial/download/poc.html">here</a> to open tutotial proof of concept.
                </p>
                <h2>Client/Server Side Coding</h2>
                <p> 
                    I took a sotware design course before web apps, where we learned how to code in php. I used php,javasript,html,and css to write client and server code 
                    for our final project. This week I learned it was possible to integrate java into web applications via JSP(server-side language). Specifically rewriting java objects as JSON files using 
                    the GSON library and JSP server side coding. 
                    </br></br>
                    For this assignment, we had to generate errors to get a better understanding of out client/server code.Click <a href="Files/WebAPI_db_errors.pdf" target = "_blank">here</a> to see my document about java DB access errors 
                    </br></br>
                    Here are links to the JSP pages the provide the JSON files for our  javascript ajax function 
                    <ul>
                        <li>Click <a  href="webAPIs/listUsersAPI.jsp" target = "_blank">here</a> for the Web API that lists users from my DB</li>
                        <li>Click <a  href="webAPIs/listSneakersAPI.jsp" target = "_blank">here</a> for the Web API that lists sneakers from my sneaker table</li>
                    </ul>
                      
                </p>
    
                <h2>Logon</h2>
                <p> 
                    This week was interesting. Integrating all jsp,sql,html,javascript, and css code was a great learning experience.The hardest part of this project was understanding how all of these
                    languages work together, and learning about that was a privilege. Morover, we really made use of the out, request and session, JSP Iplicit object which was quite  resourceful. 
                    Our JSP pages output JSON objects, thank to the GSON library and below are a couple of direct JSP pages for this Accounts Homework:
                    
                    <ul>
                        <li>Click <a  href="webAPIs/listUsersAPI.jsp" target = "_blank">here</a> to open the JSP page containing the list of all user information</li>
                        <li>Click <a  href="webAPIs/logonAPI.jsp?userEmail=mazmans@gmail.com&userPassword=preacher" target = "_blank">here</a> to the open the Logon JSP page with working Logon Information</li>
                        <li>Click <a  href="webAPIs/getProfileAPI.jsp" target = "_blank">here</a> to open the Profile JSP page with current(logged in) user information</li>
                        <li>Click <a  href="webAPIs/logoffAPI.jsp" target = "_blank">here</a> to open the Logoff JSP page to  log the current user off</li>
                       
                    </ul>
                      
                </p>
                <h2>Tutorial</h2>
                <p> 
                    This week's homework, is so far the most satisfying,organized and reusable project I built from scratch. One thing I learned to uphold is making it work on paper before
                    diving into coding. If not, one might reach a dead end, which requires costly refactoring. Morover, before I started the project, I thought some of the requirements
                    were unecessary, but after all, I noticed those requirements, such: as no ids in the make function, and an index page are absolutely necessary. No ids leave the components general
                    ,and I only had a better picture of the power of the component, from building the index page(demos). I also got to see some things I could have implemented better(like a boolean data type
                    for the sort order paramenter instead of an array of 2 specific strings. Overall, I walk out of this project having a better idea of how to implement code.
                  
                      
                </p>
                <h2>Update</h2>
                <p> 
                    This week's homoework was very resourcesful because, we got to put the full stack together and connect all the dots. It was critical to understand how the APIs, java code, database and javascript
                    work together.One thing I found redudndant about this homework was tracking each file, logically linking to to the corresponding file, then  making sure my live sneaker table is using the appropriate 
                    data types. However, I can't even complaing because I believe this somewhat related to how it is done in industry, and I'm at the verge of getting in so I better get familiar with it. 
                  
                      
                </p>
    
                <h2>Delete</h2>
                <p> 
                    This week's homework wasn't a hassle to implement. Only thing arguably worth mentioning is the we actually had to build the APIs, and JS functionality ourselvee. I mean we had to implement JS and API functionality for
                    our tutorials but not on other homeworks. This however was helpful becasue the less sample code one gets the better the experience gained if  one's able to pull it off. I also had fun with the modals,added a couple attributes
                    and methods Professors but  to and intend to build a  reusable modal with animations in the future.
                    
                      
                </p>

            </div>
    `;
        var ele = document.createElement("div");
        ele.innerHTML = content;
        
        return ele;
        }