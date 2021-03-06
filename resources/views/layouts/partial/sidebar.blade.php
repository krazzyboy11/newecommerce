<aside class="left-side sidebar-offcanvas">
    <section class="sidebar ">
        <div class="page-sidebar  sidebar-nav">
            {{--<div class="nav_icons">
                <ul class="sidebar_threeicons">
                    <li>
                        <a href="advanced_tables.html">
                            <i class="livicon" data-name="table" title="Advanced tables" data-c="#418BCA" data-hc="#418BCA" data-size="25" data-loop="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="tasks.html">
                            <i class="livicon" data-c="#EF6F6C" title="Tasks" data-hc="#EF6F6C" data-name="list-ul" data-size="25" data-loop="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="gallery.html">
                            <i class="livicon" data-name="image" title="Gallery" data-c="#F89A14" data-hc="#F89A14" data-size="25" data-loop="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="users_list.html">
                            <i class="livicon" data-name="users" title="Users List" data-size="25" data-c="#01bc8c" data-hc="#01bc8c" data-loop="true"></i>
                        </a>
                    </li>
                </ul>
            </div>--}}
            <div class="clearfix"></div>
            <!-- BEGIN SIDEBAR MENU -->
            <ul id="menu" class="page-sidebar-menu">
                <li class="{{Request::is('admin/dashboard*')? 'active': ''}}">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="{{Request::is('admin/category*')? 'active': ''}}">
                    <a href="{{route('category.index')}}">
                        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                        <span class="title">Categories</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu" >
                        <li >
                            <a href="{{route('category.index')}}">
                                <i class="fa fa-angle-double-right"></i> All Categories
                            </a>
                        </li>
                        <li>
                            <a href="{{route('subcategory.index')}}">
                                <i class="fa fa-angle-double-right"></i> All Sub Categories
                            </a>
                        </li>
                        <li>
                            <a href="{{route('childcategory.index')}}">
                                <i class="fa fa-angle-double-right"></i> All Child Categories
                            </a>
                        </li>

                    </ul>
                </li>
                {{--<li>
                    <a href="#">
                        <i class="livicon" data-name="doc-portrait" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                        <span class="title">Forms</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="form_examples.html">
                                <i class="fa fa-angle-double-right"></i> Form Examples
                            </a>
                        </li>
                        <li>
                            <a href="form_editor.html">
                                <i class="fa fa-angle-double-right"></i> Form Editors
                            </a>
                        </li>
                        <li>
                            <a href="form_editor2.html">
                                <i class="fa fa-angle-double-right"></i> Form Editors2
                            </a>
                        </li>
                        <li>
                            <a href="form_validation.html">
                                <i class="fa fa-angle-double-right"></i> Form Validation
                            </a>
                        </li>
                        <li>
                            <a href="formelements.html">
                                <i class="fa fa-angle-double-right"></i> Form Elements
                            </a>
                        </li>
                        <li>
                            <a href="dropdowns.html">
                                <i class="fa fa-angle-double-right"></i> Drop Downs
                            </a>
                        </li>
                        <li>
                            <a href="radio_check.html">
                                <i class="fa fa-angle-double-right"></i> Radio and Checkbox
                            </a>
                        </li>
                        <li>
                            <a href="ratings.html">
                                <i class="fa fa-angle-double-right"></i> Ratings
                            </a>
                        </li>
                        <li>
                            <a href="form_layouts.html">
                                <i class="fa fa-angle-double-right"></i> Form Layouts
                            </a>
                        </li>
                        <li>
                            <a href="formwizard.html">
                                <i class="fa fa-angle-double-right"></i> Form Wizards
                            </a>
                        </li>
                        <li>
                            <a href="accordionformwizard.html">
                                <i class="fa fa-angle-double-right"></i> Accordion Wizards
                            </a>
                        </li>
                        <li>
                            <a href="datepicker.html">
                                <i class="fa fa-angle-double-right"></i> Date Pickers
                            </a>
                        </li>
                        <li>
                            <a href="advanced_datepickers.html">
                                <i class="fa fa-angle-double-right"></i> Advanced Date Pickers
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="brush" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
                        <span class="title">UI Features</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="animatedicons.html">
                                <i class="fa fa-angle-double-right"></i> Animated Icons
                            </a>
                        </li>
                        <li>
                            <a href="buttons.html">
                                <i class="fa fa-angle-double-right"></i> Buttons
                            </a>
                        </li>
                        <li>
                            <a href="advanced_buttons.html">
                                <i class="fa fa-angle-double-right"></i> Advanced Buttons
                            </a>
                        </li>
                        <li>
                            <a href="tabs_accordions.html">
                                <i class="fa fa-angle-double-right"></i> Tabs and Accordions
                            </a>
                        </li>
                        <li>
                            <a href="panels.html">
                                <i class="fa fa-angle-double-right"></i> Panels
                            </a>
                        </li>
                        <li>
                            <a href="icon.html">
                                <i class="fa fa-angle-double-right"></i> Font Icons
                            </a>
                        </li>
                        <li>
                            <a href="color.html">
                                <i class="fa fa-angle-double-right"></i> Color Picker Slider
                            </a>
                        </li>
                        <li>
                            <a href="grid.html">
                                <i class="fa fa-angle-double-right"></i> Grid Layout
                            </a>
                        </li>
                        <li>
                            <a href="carousel.html">
                                <i class="fa fa-angle-double-right"></i> Carousel
                            </a>
                        </li>
                        <li>                                     <a href="advanced_modals.html">                                         <i class="fa fa-angle-double-right"></i> Advanced Modals                                     </a>                                 </li>                                 <li>                                     <a href="tagsinput.html"> <i class="fa fa-angle-double-right"></i> Tags Input </a>                                 </li>                                 <li>                                     <a href="nestable_list.html">                                         <i class="fa fa-angle-double-right"></i> Nestable List                                     </a>                                 </li>
                        <li>
                            <a href="sortable_list.html">
                                <i class="fa fa-angle-double-right"></i> Sortable List
                            </a>
                        </li>
                        <li>
                            <a href="treeview_jstree.html">
                                <i class="fa fa-angle-double-right"></i> Treeview and jsTree
                            </a>
                        </li>
                        <li>
                            <a href="toastr_notification.html">
                                <i class="fa fa-angle-double-right"></i> Toastr Notifications
                            </a>
                        </li>
                        <li>
                            <a href="sweetalert.html">
                                <i class="fa fa-angle-double-right"></i> Sweet Alert
                            </a>
                        </li>
                        <li>
                            <a href="notifications.html">
                                <i class="fa fa-angle-double-right"></i> Notifications
                            </a>
                        </li>
                        <li>
                            <a href="session_timeout.html">
                                <i class="fa fa-angle-double-right"></i> Session Timeout
                            </a>
                        </li>
                        <li>
                            <a href="portlet_draggable.html">
                                <i class="fa fa-angle-double-right"></i> Draggable Portlets
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
                        <span class="title">UI Components</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="general.html">
                                <i class="fa fa-angle-double-right"></i> General Components
                            </a>
                        </li>
                        <li>
                            <a href="pickers.html">
                                <i class="fa fa-angle-double-right"></i> Pickers
                            </a>
                        </li>
                        <li>
                            <a href="x-editable.html">
                                <i class="fa fa-angle-double-right"></i> X-editable
                            </a>
                        </li>
                        <li>
                            <a href="timeline.html">
                                <i class="fa fa-angle-double-right"></i> Timeline
                            </a>
                        </li>
                        <li>
                            <a href="transitions.html">
                                <i class="fa fa-angle-double-right"></i> Transitions
                            </a>
                        </li>
                        <li>
                            <a href="sliders.html">
                                <i class="fa fa-angle-double-right"></i> Sliders
                            </a>
                        </li>
                        <li>
                            <a href="knob.html">
                                <i class="fa fa-angle-double-right"></i> Circles Sliders
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="table" data-c="#418BCA" data-hc="#418BCA" data-size="18" data-loop="true"></i>
                        <span class="title">Data Tables</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="simple_table.html">
                                <i class="fa fa-angle-double-right"></i> Simple tables
                            </a>
                        </li>
                        <li>
                            <a href="advanced_tables.html">
                                <i class="fa fa-angle-double-right"></i> Advanced Data Tables
                            </a>
                        </li>
                        <li>
                            <a href="advanced_tables2.html">
                                <i class="fa fa-angle-double-right"></i> Advanced Data Tables2
                            </a>
                        </li>
                        <li>
                            <a href="editable_table.html"> <i class="fa fa-angle-double-right"></i> Editable Data Tables </a>
                        </li>
                        <li>
                            <a href="responsive_tables.html"> <i class="fa fa-angle-double-right"></i> Responsive Data Tables </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="barchart" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                        <span class="title">Charts</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="charts.html">
                                <i class="fa fa-angle-double-right"></i> Flot Charts
                            </a>
                        </li>
                        <li>
                            <a href="piecharts.html">
                                <i class="fa fa-angle-double-right"></i> Pie Charts
                            </a>
                        </li>
                        <li>
                            <a href="charts_animation.html">
                                <i class="fa fa-angle-double-right"></i> Animated Charts
                            </a>
                        </li>
                        <li>
                            <a href="jscharts.html">
                                <i class="fa fa-angle-double-right"></i> JS Charts
                            </a>
                        </li>
                        <li>
                            <a href="sparklinecharts.html">
                                <i class="fa fa-angle-double-right"></i> Sparkline Charts
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html">
                        <i class="livicon" data-c="#F89A14" data-hc="#F89A14" data-name="calendar" data-size="18" data-loop="true"></i>
                        <span class="badge badge-danger">7</span> Calendar
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="mail" data-size="18" data-c="#5bc0de" data-hc="#5bc0de" data-loop="true"></i>
                        <span class="title">Email</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="Inbox.html">
                                <i class="fa fa-angle-double-right"></i> Inbox
                            </a>
                        </li>
                        <li>
                            <a href="compose.html">
                                <i class="fa fa-angle-double-right"></i> Compose
                            </a>
                        </li>
                        <li>
                            <a href="view_mail.html">
                                <i class="fa fa-angle-double-right"></i> Single Mail
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="tasks.html">
                        <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="list-ul" data-size="18" data-loop="true"></i>
                        <span class="badge badge-danger">10</span> Tasks
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="image" data-c="#418BCA" data-hc="#418BCA" data-size="18" data-loop="true"></i>
                        <span class="title">Gallery</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="gallery.html">
                                <i class="fa fa-angle-double-right"></i> Gallery
                            </a>
                        </li>
                        <li>
                            <a href="masonry_gallery.html">
                                <i class="fa fa-angle-double-right"></i> Masonry Gallery
                            </a>
                        </li>
                        <li>
                            <a href="dropzone.html">
                                <i class="fa fa-angle-double-right"></i> Dropzone
                            </a>
                        </li>
                        <li>
                            <a href="imagecropping.html">
                                <i class="fa fa-angle-double-right"></i> Image Cropping
                            </a>
                        </li>
                        <li>
                            <a href="multiple_upload.html">
                                <i class="fa fa-angle-double-right"></i> Multiple File Upload
                            </a>
                        </li>
                        <li>
                            <a href="imgmagnifier.html">
                                <i class="fa fa-angle-double-right"></i> Image Magnifier
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="users" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                        <span class="title">Users</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="users_list.html">
                                <i class="fa fa-angle-double-right"></i> Users List
                            </a>
                        </li>
                        <li>
                            <a href="adduser.html">
                                <i class="fa fa-angle-double-right"></i> Add New User
                            </a>
                        </li>
                        <li>
                            <a href="view_user.html">
                                <i class="fa fa-angle-double-right"></i> View Profile
                            </a>
                        </li>
                        <li>
                            <a href="deleted_users.html">
                                <i class="fa fa-angle-double-right"></i> Deleted Users
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="map" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                        <span class="title">Maps</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="googlemaps.html">
                                <i class="fa fa-angle-double-right"></i> Google Maps
                            </a>
                        </li>
                        <li>
                            <a href="vectormaps.html">
                                <i class="fa fa-angle-double-right"></i> Vector Maps
                            </a>
                        </li>
                        <li>
                            <a href="advancedmaps.html">
                                <i class="fa fa-angle-double-right"></i> Advanced Maps
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="comment" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
                        <span class="title">Blog</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="blog_list.html"> <i class="fa fa-angle-double-right"></i> Blog Category List </a>
                        </li>
                        <li>
                            <a href="blog_list2.html"> <i class="fa fa-angle-double-right"></i> Blog List </a>
                        </li>
                        <li>
                            <a href="add_newblog.html"> <i class="fa fa-angle-double-right"></i> Add New Blog </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="move" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
                        <span class="title">News</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="news.html">
                                <i class="fa fa-angle-double-right"></i> News
                            </a>
                        </li>
                        <li>
                            <a href="news_details.html">
                                <i class="fa fa-angle-double-right"></i> News Details
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="flag" data-c="#418bca" data-hc="#418bca" data-size="18" data-loop="true"></i>
                        <span class="title">Pages</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="lockscreen.html">
                                <i class="fa fa-angle-double-right"></i> Lockscreen
                            </a>
                        </li>
                        <li>
                            <a href="invoice.html">
                                <i class="fa fa-angle-double-right"></i> Invoice
                            </a>
                        </li>
                        <li>
                            <a href="login.html">
                                <i class="fa fa-angle-double-right"></i> Login
                            </a>
                        </li>
                        <li>
                            <a href="login2.html">
                                <i class="fa fa-angle-double-right"></i> Login 2
                            </a>
                        </li>
                        <li>
                            <a href="login.html#toregister">
                                <i class="fa fa-angle-double-right"></i> Register
                            </a>
                        </li>
                        <li>
                            <a href="register2.html">
                                <i class="fa fa-angle-double-right"></i> Register 2
                            </a>
                        </li>
                        <li>
                            <a href="404.html">
                                <i class="fa fa-angle-double-right"></i> 404 Error
                            </a>
                        </li>
                        <li>
                            <a href="500.html">
                                <i class="fa fa-angle-double-right"></i> 500 Error
                            </a>
                        </li>
                        <li>
                            <a href="blank.html">
                                <i class="fa fa-angle-double-right"></i> Blank Page
                            </a>
                        </li>
                    </ul>
                </li>--}}
                <li class="{{Request::is('admin/brand*')? 'active': ''}}">
                    <a href="{{route('brand.index')}}">
                        <i class="livicon" data-name="responsive" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                        <span class="title">Brand</span>
                    </a>
                </li>
                <li class="{{Request::is('admin/product*')? 'active': ''}}">
                    <a href="{{route('product.index')}}">
                        <i class="livicon" data-name="responsive" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                        <span class="title">Product</span>
                    </a>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </section>
    <!-- /.sidebar -->
</aside>
