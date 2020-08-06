<!--<style>-->
<!---->
<!--    .wrapper {-->
<!--        position: absolute;-->
<!--        top: 50%;-->
<!--        left: 50%;-->
<!--        transform: translate(-50%, -50%);-->
<!--        background: #313142;-->
<!--        width: 800px;-->
<!--        height: 680px;-->
<!--        display: flex;-->
<!--        border-radius: 15px;-->
<!--    }-->
<!---->
<!---->
<!--    .wrapper .wrapper_left {-->
<!--        width: 250px;-->
<!--        background: #393952;-->
<!--        padding: 0 25px;-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--        border-top-left-radius: 15px;-->
<!--        border-bottom-left-radius: 15px;-->
<!--        box-shadow: 10px 0px 13px 0px rgba(41, 41, 57, 0.7);-->
<!--    }-->
<!--    .wrapper .wrapper_left ul li {-->
<!--        background: #313142;-->
<!--        margin-bottom: 25px;-->
<!--        border-radius: 3px;-->
<!--        padding: 12px 25px;-->
<!--        text-transform: uppercase;-->
<!--        font-weight: 500;-->
<!--        position: relative;-->
<!--        overflow: hidden;-->
<!--        width: 200px;-->
<!--        letter-spacing: 2px;-->
<!--        transition: all 0.4s ease;-->
<!--        cursor: pointer;-->
<!--    }-->
<!---->
<!--    .wrapper .wrapper_left ul li p {-->
<!--        color: #abaacd;-->
<!--        position: relative;-->
<!--    }-->
<!---->
<!--    .wrapper .wrapper_left ul li:before {-->
<!--        content: "";-->
<!--        position: absolute;-->
<!--        top: 0;-->
<!--        left: 0;-->
<!--        width: 5px;-->
<!--        height: 100%;-->
<!--        background: #5437b7;-->
<!--        background: linear-gradient(-->
<!--                126deg,-->
<!--                rgba(2, 0, 36, 1) 0%,-->
<!--                rgba(123, 90, 231, 1) 0%,-->
<!--                rgba(88, 54, 206, 1) 100%-->
<!--        );-->
<!--        border-radius: 5px;-->
<!--        border-top-right-radius: 0;-->
<!--        border-bottom-right-radius: 0;-->
<!--        transition: all 0.4s ease;-->
<!--    }-->
<!---->
<!--    .wrapper .wrapper_left ul li.active {-->
<!--        width: 250px;-->
<!--    }-->
<!--    .wrapper .wrapper_left ul li.active p {-->
<!--        color: #fff;-->
<!--    }-->
<!--    .wrapper .wrapper_left ul li.active:before {-->
<!--        width: 100%;-->
<!--        transition: all 0.2s ease;-->
<!--    }-->
<!---->
<!--    .wrapper .wrapper_left ul li:last-child {-->
<!--        margin-bottom: 0;-->
<!--    }-->
<!---->
<!--    .wrapper .wrapper_right {-->
<!--        width: 550px;-->
<!--        padding: 30px 50px;-->
<!--    }-->
<!---->
<!--    .wrapper .wrapper_right .title {-->
<!--        font-size: 24px;-->
<!--        text-align: center;-->
<!--        font-weight: 700;-->
<!--        color: #6b6b93;-->
<!--        margin-bottom: 20px;-->
<!--        text-transform: uppercase;-->
<!--    }-->
<!---->
<!--    .wrapper .wrapper_right .item .item_info {-->
<!--        display: flex;-->
<!--        justify-content: space-around;-->
<!--        align-items: center;-->
<!--    }-->
<!--    .wrapper .wrapper_right .item .item_info .img {-->
<!--        width: 200px;-->
<!--        height: 200px;-->
<!--        background: #fff;-->
<!--        border-radius: 50%;-->
<!--        margin-bottom: 20px;-->
<!--        position: relative;-->
<!--    }-->
<!---->
<!--    .wrapper .wrapper_right .item .item_info .img:before {-->
<!--        content: "";-->
<!--        position: absolute;-->
<!--        top: 50%;-->
<!--        left: 50%;-->
<!--        transform: translate(-50%, -50%);-->
<!--        background: url("https://i.imgur.com/HwNnoFN.png") no-repeat 0 0;-->
<!--        width: 94px;-->
<!--        height: 101px;-->
<!--    }-->
<!---->
<!--    .wrapper .wrapper_right .item.angular .item_info .img:before {-->
<!--        background-position: 0 0;-->
<!--        width: 94px;-->
<!--        height: 101px;-->
<!--    }-->
<!--    .wrapper .wrapper_right .item.nodejs .item_info .img:before {-->
<!--        background-position: 0 -110px;-->
<!--        width: 89px;-->
<!--        height: 101px;-->
<!--    }-->
<!--    .wrapper .wrapper_right .item.reactjs .item_info .img:before {-->
<!--        background-position: 0 -220px;-->
<!--        width: 100px;-->
<!--        height: 100px;-->
<!--    }-->
<!--    .wrapper .wrapper_right .item.vuejs .item_info .img:before {-->
<!--        background-position: 0 -330px;-->
<!--        width: 100px;-->
<!--        height: 101px;-->
<!--    }-->
<!---->
<!--    .wrapper .wrapper_right .item .item_info p {-->
<!--        background: #fff;-->
<!--        width: 150px;-->
<!--        padding: 10px;-->
<!--        border-radius: 5px;-->
<!--        color: #abaacd;-->
<!--        font-weight: 700;-->
<!--        text-transform: uppercase;-->
<!--        text-align: center;-->
<!--    }-->
<!--    .wrapper .wrapper_right .item.angular .item_info p {-->
<!--        color: #dd0330;-->
<!--    }-->
<!--    .wrapper .wrapper_right .item.nodejs .item_info p {-->
<!--        color: #8bc500;-->
<!--    }-->
<!--    .wrapper .wrapper_right .item.reactjs .item_info p {-->
<!--        color: #61dafb;-->
<!--    }-->
<!--    .wrapper .wrapper_right .item.vuejs .item_info p {-->
<!--        color: #41b783;-->
<!--    }-->
<!---->
<!--    .wrapper .wrapper_right .item p {-->
<!--        margin-bottom: 20px;-->
<!--        color: #fff;-->
<!--    }-->
<!---->
<!---->
<!--</style>-->

<div id="topic" class="topic">
<div class="container container-lg text-left py-5 py-4-sm">
    <div class="row wrapper">
        <!--Left-->
        <div class="col-md-3 wrapper_left">
            <ul>
                <li data-li="angular" class="active">
                    <p>Angular</p>
                </li>
                <li data-li="nodejs">
                    <p>Node.js</p>
                </li>
                <li data-li="reactjs">
                    <p>React.js</p>
                </li>
                <li data-li="vuejs">
                    <p>Vue.js</p>
                </li>
            </ul>
        </div>
        <!--Content-->
        <div class="col-md-9 wrapper_right">
            <div class="title">
                Top Javascript Frameworks
            </div>
            <div class="container">

                <div class="item angular">
                    <div class="item_info">
                        <div class="img"></div>
                        <p>Angular</p>
                    </div>
                    <p>Angular 2 is an open source JavaScript framework to build web applications in HTML and JavaScript. This tutorial looks at the various aspects of Angular 2 framework which includes the basics of the framework, the setup of Angular and how to work
                        with the various aspects of the framework. Other topics discussed in the tutorial are advanced chapters such as interfaces, nested components and services within Angular. Topics such as routing, modules, and arrays</p>
                    <p>The user should be familiar with the basics of web development and JavaScript. Since the Angular framework is built on the JavaScript framework, it becomes easier for the user to understand Angular if they know JavaScript.</p>
                </div>

                <div class="item nodejs" style="display: none;">
                    <div class="item_info">
                        <div class="img"></div>
                        <p>node.js</p>
                    </div>
                    <p>Node.js is a platform built on Chrome's JavaScript runtime for easily building fast and scalable network applications. Node.js uses an event-driven, non-blocking I/O model that makes it lightweight and efficient, perfect for data-intensive real-time
                        applications that run across distributed devices.</p>
                    <p>Node.js is an open source, cross-platform runtime environment for developing server-side and networking applications. Node.js applications are written in JavaScript, and can be run within the Node.js runtime on OS X, Microsoft Windows, and Linux.</p>
                    <p>Node.js also provides a rich library of various JavaScript modules which simplifies the development of web applications using Node.js to a great extent.</p>
                </div>

                <div class="item reactjs" style="display: none;">
                    <div class="item_info">
                        <div class="img"></div>
                        <p>React.js</p>
                    </div>
                    <p>React makes it painless to create interactive UIs. Design simple views for each state in your application, and React will efficiently update and render just the right components when your data changes.</p>
                    <p>Build encapsulated components that manage their own state, then compose them to make complex UIs.</p>
                    <p>Since component logic is written in JavaScript instead of templates, you can easily pass rich data through your app and keep state out of the DOM.</p>
                </div>

                <div class="item vuejs" style="display: none;">
                    <div class="item_info">
                        <div class="img"></div>
                        <p>vue.js</p>
                    </div>
                    <p>Vue is a progressive framework for building user interfaces. Unlike other monolithic frameworks, Vue is designed from the ground up to be incrementally adoptable. The core library is focused on the view layer only, and is easy to pick up and integrate
                        with other libraries or existing projects. On the other hand, Vue is also perfectly capable of powering sophisticated Single-Page Applications when used in combination with modern tooling and supporting libraries.</p>
                    <p>If you’d like to learn more about Vue before diving in, we created a video walking through the core principles and a sample project.</p>
                </div>


            </div>

        </div>

    </div>
</div>
</div>
<script>
    var li_elements = document.querySelectorAll(".wrapper_left ul li");
    var item_elements = document.querySelectorAll(".item");
    for (var i = 0; i < li_elements.length; i++) {
        li_elements[i].addEventListener("click", function() {
            li_elements.forEach(function(li) {
                li.classList.remove("active");
            });
            this.classList.add("active");
            var li_value = this.getAttribute("data-li");
            item_elements.forEach(function(item) {
                item.style.display = "none";
            });
            if (li_value == "angular") {
                document.querySelector("." + li_value).style.display = "block";
            } else if (li_value == "nodejs") {
                document.querySelector("." + li_value).style.display = "block";
            } else if (li_value == "reactjs") {
                document.querySelector("." + li_value).style.display = "block";
            } else if (li_value == "vuejs") {
                document.querySelector("." + li_value).style.display = "block";
            } else {
                console.log("");
            }
        });
    }

</script>


