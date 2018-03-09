<div class="container" >
  <a href="index.php" class="logo m-t-5  m-l-15 pull-left">
    <img src="../include/assets/images/teamire-logo.png">
  </a>
  <br>

    <div class="form-inline pull-right" id="above-nav" style="padding: 20px;">
      <ul class="nav navbar-nav navbar-right nav-menu-right">
        <li> <a class="m-l-5 m-r-15" href="../home/?view=projects">Special Projects</a></li>
        <li> <a class="m-l-5 m-r-15" href="../home/?view=logins">Timesheets</a></li>
        <li><a class="m-l-5 m-r-15" href="../home/?view=contactUs">Contact Us</a></li>
        <li> <a class="m-l-5 m-r-15" href="../home/?view=hiringForm">Request Staff</a></li>
        <li> <a class="m-l-5 m-r-15" href="../home/?view=downloads">Downloads</a></li>
      </ul>
    </div>
  </div>
        <nav style="padding-left: 2%;">
        <label for="drop" class="toggle">Menu</label>
        <input type="checkbox" id="drop" />
            <ul class="menu">

                <li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-1" class="toggle">Employers <b class="fa fa-chevron-right m-l-15 text-darkgrey"></b></label>
                <a href="#">Employers <b class="fa fa-chevron-right m-l-15 text-darkgrey"></b></a>
                    <input type="checkbox" id="drop-1"/>
                    <ul>
                        <li><a href="../home/?view=hiringForm">Request Talent</a></li>
                    <li><a href="../home/?view=searchResume">Search Candidates</a></li>
                        <li><a href="../home/?view=clientForm">Employer Registration</a></li>
                    </ul>

                </li>
                <li>

                <!-- First Tier Drop Down -->
                <label for="drop-2" class="toggle">Job Seekers <b class="fa fa-chevron-right m-l-15 text-darkgrey"></b></label>
                <a href="#">Job Seekers <b class="fa fa-chevron-right m-l-15 text-darkgrey"></b></a>
                <input type="checkbox" id="drop-2"/>
                <ul>
                     <li><a href="../home/?view=searchJob">Search Job</a></li>
                <li><a href="../home/?view=submitResume">Submit Resume</a></li>

                </ul>
                </li>
                     <li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-3" class="toggle">Work With Us <b class="fa fa-chevron-right m-l-15 text-darkgrey"></b></label>
                <a href="#">Work With Us <b class="fa fa-chevron-right m-l-15 text-darkgrey"></b></a>
                    <input type="checkbox" id="drop-3"/>
                    <ul>
                        <li><a href="../home/?view=services">Our Services</a></li>
              <li><a href="../home/?view=aboutUs">About Us</a></li>
                    </ul>

                </li>

            </ul>
        </nav>



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
    background-color: #eee;
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
    background-color: #eee;
    }

/* Styling the links */
nav a {
    display:block;
    padding:14px 20px;
    color:#3399cc;
    font-weight: 500;
    text-decoration:none;
    font-size: 17px;
}


nav ul li ul li:hover { background: #4489e4;

}

/* Background color change on Hover */
nav a:hover {
    background-color: #4489e4;
    color: #fff;
}

/* Hide Dropdowns by Default
 * and giving it a position of absolute */
nav ul ul {
    display: none;
    position: absolute;
    /* has to be the same number as the "line-height" of "nav a" */
    top: 60px;
}

/* Display Dropdowns on Hover */
nav ul li:hover > ul {
    display:block;
      z-index: 100;

}

/* Fisrt Tier Dropdown */
nav ul ul li {
    width:170px;
    float:none;
    display:list-item;
    position: relative;
    background-color: #36424a;
    color: #fff;
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
        background-color: #eee;
        padding:14px 20px;
        color:#3399cc;
        font-size:17px;
        text-decoration:none;
        border:none;
    }

    .toggle:hover {
        background-color: #000000;
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
        background-color: #000000;
        color: #fff;
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
        background-color: #212121;
        color: #fff;
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

@media all and (max-width : 330px) {

    nav ul li {
        display:block;
        width: 94%;
    }

}
@media all and (max-width : 330px) {

    #above-nav {
        display:block;
        width: 94%;
    }

}
</style>
