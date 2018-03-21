

<div style="width: 1300px; margin: 0 auto;">
  <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
      <a href="index.php" class="logo m-t-5 pull-left">
        <img src="../include/assets/images/teamire-logo.png" style="width: 237px; height: 80px;">
      </a>


    <div style="height: 68px; width: 1px; background-color: #9aebff;" class="header-slogan pull-left m-t-15 m-l-25"></div>
    <div class="pull-left m-t-10 m-l-10" style="width: 390px;height: 85px;">
      <img src="../include/assets/images/header-slogan.png" width="90%">
    </div>


    <div class="form-inline pull-right"  style="padding: 30px; margin-top: 5px;" id="myTopnav">
      <ul class="nav navbar-nav navbar-right nav-menu-right" id="above-nav">
        <li> <a class="m-l-3 m-r-3" href="../home/?view=projects" style="font-size:15px;">Supply Chain Projects</a></li>
        <li> <a class="m-l-3 m-r-3" href="../home/?view=logins" style="font-size:15px;">Timesheets</a></li>
        <li> <a class="m-l-3 m-r-3" href="../home/?view=downloads" style="font-size:15px;">Downloads</a></li>
        <li> <a class="m-l-3 m-r-3" href="../home/?view=hiringForm" style="font-size:15px;">Request Staff</a></li>
        <li><a class="m-l-3 m-r-3" href="../home/?view=contactUs" style="font-size:15px;">Contact Us</a></li>
      </ul>
    </div>
  </div>
</div>
  <div class="row">
     <nav class="top">
    <label for="drop1" class="toggle1" style="background-color: #022664;color: #fff; float: right; border-bottom: none;" >Top Navigation <i class="fa fa-bars"></i></label>
        <input type="checkbox" id="drop1" />
          <ul class="menu1">
                <li>
                    <label for="drop-1" class="toggle1"><a  href="../home/?view=projects" >Supply Chain Projects</a></label>
                </li>
                <li>
                    <label for="drop-2" class="toggle1"> <a  href="../home/?view=logins" >Timesheets</a></label>
                </li>
                 <li>
                    <label for="drop-2" class="toggle1"> <a  href="../home/?view=downloads" >Downloads</a></label>
                </li>
                 <li>
                    <label for="drop-2" class="toggle1"> <a  href="../home/?view=hiringForm" >Request Staff</a></label>
                </li>
                 <li>
                    <label for="drop-2" class="toggle1"> <a  href="../home/?view=contactUs" >Contact Us</a></label>
                </li>
            </ul>
         </nav>
    </div>
<div class="row" >

        <nav style="padding-left: 2%; width: 1350px; margin: 0 auto;">
        <label for="drop" style="border-bottom: none; background-color: #212121;" class="toggle"><i class="fa fa-bars"></i> Main Menu</label>
        <input type="checkbox" id="drop" />
            <ul class="menu">
                <li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-1" class="toggle">Employers <b class="fa fa-chevron-right m-l-15 text-blue"></b></label>
                    <a href="#">Employers <b class="fa fa-chevron-right m-l-15 text-primary"></b></a>
                    <input type="checkbox" id="drop-1"/>
                    <ul>
                        <li><a   href="../home/?view=hiringForm">Request Talent</a></li>
                        <li><a   href="../home/?view=searchResume">Search Candidates</a></li>
                        <li><a   href="../home/?view=clientForm">Employer Registration</a></li>
                    </ul>

                </li>
                <li>
                <!-- First Tier Drop Down -->
                <label for="drop-2" class="toggle">Job Seekers <b class="fa fa-chevron-right m-l-15 text-blue"></b></label>
                <a href="#">Job Seekers <b class="fa fa-chevron-right m-l-15 text-primary"></b></a>
                <input type="checkbox" id="drop-2"/>
                    <ul>
                         <li><a   href="../home/?view=searchJob">Search Job</a></li>
                         <li><a   href="../home/?view=submitResume">Submit Resume</a></li>

                    </ul>
                </li>
                 <li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-3" class="toggle">Work With Us <b class="fa fa-chevron-right m-l-15 text-blue"></b></label>
                    <a href="#">Work With Us <b class="fa fa-chevron-right m-l-15 text-primary"></b></a>
                    <input type="checkbox" id="drop-3"/>
                    <ul>
                        <li><a   href="../home/?view=services">Our Services</a></li>
                        <li><a   href="../home/?view=aboutUs">About Us</a></li>
                    </ul>
                </li>
            </ul>
      <div class="pull-right m-t-5" style="padding-right: 4%;">
        <span class="text-white pull-left m-r-5" style="margin-top: 2px;">+61 452 364 793 | </span>
        <ul>
        <li><a class="icons" href="https://www.facebook.com/" target="blank_"><img src="../include/assets/images/facebook.png"></a></li>
        <li><a class="icons" href="https://www.twitter.com/" target="blank_"><img src="../include/assets/images/twitter.png"></a></li>
        <li><a class="icons" href="https://www.linkedin.com/" target="blank_"><img src="../include/assets/images/linkedin.png"></a></li>
        <li><a class="icons" href="https://www.google.com/" target="blank_"><img src="../include/assets/images/google.png"></a></li>
        <li><a class="icons" href="https://www.youtube.com/" target="blank_"><img src="../include/assets/images/youtube.png"></a></li>
      </ul>
      </div>

        </nav>
</div>
<style>
body {

    line-height: 32px;

    margin: 0;
    padding: 0;

    }

#container {
    margin: 0 auto;
    max-width: 890px;
}



.toggle,
[id^=drop] {
    display: none;
}

/* Giving a background-color to the nav container. */
nav {
    margin:0;
    padding: 0;
    background-color: #022664;
}

#logo {
    display: block;
    padding: 0 30px;
    float: left;
    font-size:20px;
    line-height: 60px;
}

/* Since we'll have the "ul li" "float:left"
 * we need to add a clear after the container. */

nav:after {
    content:"";
    display:table;
    clear:both;
}

/* Removing padding, margin and "list-style" from the "ul",
 * and adding "position:reltive" */
nav ul {
    float: left ;
    padding:0;
    margin:0;
    list-style: none;
    position: relative;
    }

/* Positioning the navigation items inline */
nav ul li {
    margin: 0px;
    display:inline-block;
    float: left;
    background-color: #022664;
    }

/* Styling the links */
nav a {
    display:block;
    padding: 10px 25px;
    color:#fff;
    font-weight: 600;
    text-decoration:none;
    font-size: 17px;
}


nav ul li ul li:hover { background-color: #021844;

}

/* Background color change on Hover */
nav a:hover {
    background-color: #021844;
    color: #fff;
}

/* Hide Dropdowns by Default
 * and giving it a position of absolute */
nav ul ul {
    display: none;
    position: absolute;
    /* has to be the same number as the "line-height" of "nav a" */
    top: 50px;
}

/* Display Dropdowns on Hover */
nav ul li:hover > ul {
    display:block;
      z-index: 100;

}

/* Fisrt Tier Dropdown */
nav ul ul li {
    width:250px;
    float:none;
    display:list-item;
    position: relative;
    background-color: #232d33;
    color: #fff;
    border-bottom: 2px solid #545e65;
}
nav ul ul li a{

    color: #fff;
}

/* Second, Third and more Tiers
 * We move the 2nd and 3rd etc tier dropdowns to the left
 * by the amount of the width of the first tier.
*/
nav ul ul ul li {
    position: relative;
    top:-60px;
    /* has to be the same number as the "width" of "nav ul ul li" */
    left:170px;
}


/* Change ' +' in order to change the Dropdown symbol */
li > a:after { content:  ''; }
li > a:only-child:after { content: ''; }


/* Media Queries
--------------------------------------------- */

@media all and (max-width : 768px) {

    #logo {
        display: block;
        padding: 0;
        width: 100%;
        text-align: center;
        float: none;
    }

    nav {
        margin: 0;
    }

    /* Hide the navigation menu by default */
    /* Also hide the  */
    .toggle + a,
    .menu {
        display: none;
    }

    /* Stylinf the toggle lable */
    .toggle {
        display: block;
        background-color: #2e2e2e;
        padding:14px 20px;
        color: #ffffff;
        font-size:17px;
        text-decoration:none;
        border:none;
        margin-bottom: 0;
        border-bottom: 2px solid #212121;
        font-family: "Century Gothic", sans-serif; }

    .toggle:hover {
        background-color: #131313;
        color: #ffffff;
    }

    /* Display Dropdown when clicked on Parent Lable */
    [id^=drop]:checked + ul {
        display: block;
    }


    /* Change menu item's width to 100% */
    nav ul li {
        display: block;
        width: 100%;
        }

    nav ul ul .toggle,
    nav ul ul a {
        padding: 0 40px;
    }

    nav ul ul ul a {
        padding: 0 80px;
    }

    nav a:hover,
    nav ul ul ul a {
        background-color: #113b83;
        color: #ffffff;
    }

    nav ul li ul li .toggle,
    nav ul ul a,
  nav ul ul ul a{
        padding:14px 20px;
        color:#fff;
        font-size:17px;
    }


    nav ul li ul li .toggle,
    nav ul ul a {
        background-color: #1a4795;
    }

    /* Hide Dropdowns by Default */
    nav ul ul {
        float: none;
        position:static;
        color: #fff;
        /* has to be the same number as the "line-height" of "nav a" */
    }

    /* Hide menus on hover */
    nav ul ul li:hover > ul,
    nav ul li:hover > ul {
        display: none;
            color: #fff;
    }

    /* Fisrt Tier Dropdown */
    nav ul ul li {
        display: block;
        width: 100%;
    }

    nav ul ul ul li {
        position: static;
        /* has to be the same number as the "width" of "nav ul ul li" */

    }

}


#above-nav ul {
    list-style: none;
}
#above-nav li {
    display: inline-block;
    padding-right: -20px;

}
#above-nav a:hover, a:focus, a:active {

    text-decoration: none;
    background-color: transparent;


}
#above-nav a {
    color: #fff;
    text-decoration: none;
    transition: color 0.1s, background-color 0.1s;

}
#above-nav a {
    position: relative;
    display: block;
    padding: 2px 0;
    margin: 0 12px;
    line-height: 16px;
    color: #eeeeee;
    font-family: "Futura BT W01 Book",OpenSansRegular,"Open Sans Regular",sans-serif;
}
#above-nav a::before {
    content: '';
    display: block;
    position: absolute;
    bottom: 0px;
    left: 0;
    height: 3px;
    width: 100%;

    transform-origin: right top;
    transform: scale(0, 0);
    border-bottom: 0.5px solid #fff;
}
#above-nav a:active::before {
    background-color: #337ab7;
}
#above-nav a:hover::before, a:focus::before {
    transform-origin: left top;
    transform: scale(1, 1);

}



.toggle1,
[id^=drop1] {
    display: none;
}

/* Giving a background-color to the nav container. */
.top {
    margin:0;
    padding: 0;
    background-color: #022664;
}



/* Since we'll have the "ul li" "float:left"
 * we need to add a clear after the container. */

.top:after {
    content:"";
    display:table;
    clear:both;
}

/* Removing padding, margin and "list-style" from the "ul",
 * and adding "position:reltive" */
.top ul {
    float: left ;
    padding:0;
    margin:0;
    list-style: none;
    position: relative;
    }

/* Positioning the navigation items inline */
.top ul li {
    margin: 0px;
    display:inline-block;
    float: left;
    background-color: #022664;
    }

/* Styling the links */
.top a {
    display:block;
    padding: 10px 25px;
    color:#fff;
    font-weight: 600;
    text-decoration:none;
    font-size: 17px;
}


.top ul li ul li:hover { background-color: #021844;

}

/* Background color change on Hover */
.top a:hover {
    background-color: #021844;
    color: #fff;
}

/* Hide Dropdowns by Default
 * and giving it a position of absolute */
.top ul ul {
    display: none;
    position: absolute;
    /* has to be the same number as the "line-height" of "nav a" */
    top: 50px;
}

/* Display Dropdowns on Hover */
.top ul li:hover > ul {
    display:block;
      z-index: 100;

}

/* Fisrt Tier Dropdown */
.top ul ul li {
    width:250px;
    float:none;
    display:list-item;
    position: relative;
    background-color: #232d33;
    color: #fff;
    border-bottom: 2px solid #545e65;
}
.top ul ul li a{

    color: #fff;
}

/* Second, Third and more Tiers
 * We move the 2nd and 3rd etc tier dropdowns to the left
 * by the amount of the width of the first tier.
*/
.top ul ul ul li {
    position: relative;
    top:-60px;
    /* has to be the same number as the "width" of "nav ul ul li" */
    left:170px;
}


/* Change ' +' in order to change the Dropdown symbol */
.top  li > a:after { content:  ''; }
.top  li > a:only-child:after { content: ''; }


/* Media Queries
--------------------------------------------- */

@media all and (max-width : 768px) {
    #above-nav{
        display: none;
    }
    #logo {
        display: block;
        padding: 0;
        width: 100%;
        text-align: center;
        float: none;
    }

    .top {
        margin: 0;
    }

    /* Hide the navigation menu by default */
    /* Also hide the  */
    .toggle1 + a,
    .menu1 {
        display: none;
    }

    /* Stylinf the toggle lable */
    .toggle1 {
        display: block;
        background-color: #212121;
        padding:10px 20px;
        color:#3399cc;
        font-size:17px;
        text-decoration:none;
        border:none;
        margin-bottom: 0;
        border-bottom: 2px solid #545e65;
        font-family: "Century Gothic", sans-serif;  }

    .toggle1:hover {
        background-color: #131313;
    }

    /* Display Dropdown when clicked on Parent Lable */
    [id^=drop1]:checked + ul {
        display: block;
    }


    /* Change menu item's width to 100% */
    .top ul li {
        display: block;
        width: 100%;
        }

    .top ul ul .toggle1,
    .top ul ul a {
        padding: 0 20px;
    }

    .top ul ul ul a {
        padding: 0 80px;
    }

    .top a:hover,
    .top ul ul ul a {
        background-color: #131313;
        color: #fff;
    }

    .top ul li ul li .toggle1,
    .top ul ul a,
    .top ul ul ul a{
        padding:14px 20px;
        color:#fff;
        font-size:17px;
    }


    .top ul li ul li .toggle1,
    .top ul ul a {
        background-color: #212121;
        color: #fff;
       height: 20px;
    }

    /* Hide Dropdowns by Default */
    .top ul ul {
        float: none;
        position:static;
        color: #fff;
        /* has to be the same number as the "line-height" of "nav a" */
    }

    /* Hide menus on hover */
    .top ul ul li:hover > ul,
    .top ul li:hover > ul {
        display: none;
        color: #fff;
    }

    /* Fisrt Tier Dropdown */
    .top ul ul li {
        display: block;
        width: 100%;
    }

    .top ul ul ul li {
        position: static;
        /* has to be the same number as the "width" of "nav ul ul li" */

    }

}


</style>
