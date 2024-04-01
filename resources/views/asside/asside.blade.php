   <!-- Left Sidebar - style you can find in sidebar.scss  -->
   <aside class="left-sidebar" data-sidebarbg="skin5">
       <!-- Sidebar scroll-->
       <div class="scroll-sidebar">
           <!-- Sidebar navigation-->
           <nav class="sidebar-nav">
               <ul id="sidebarnav" class="pt-4">
                   <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('album.home')}}"
                           aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                               class="hide-menu">Home</span></a>
                   </li>



                   <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                           href="javascript:void(0)" aria-expanded="false"><i
                               class="mdi mdi-move-resize-variant"></i><span class="hide-menu">My Album </span></a>
                       <ul aria-expanded="false" class="collapse  first-level">

                           <li class="sidebar-item"><a href="{{ route('album.getAll') }}" class="sidebar-link"><i
                                       class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Show Albums
                                   </span></a></li>

                           <li class="sidebar-item"><a href="{{ route('album.getAdd') }}" class="sidebar-link"><i
                                       class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Add Album
                                   </span></a></li>

                       </ul>
                   </li>

                   <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                           href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span
                               class="hide-menu">Images </span></a>
                       <ul aria-expanded="false" class="collapse  first-level">

                           <li class="sidebar-item"><a href="{{route('images.add')}}" class="sidebar-link"><i
                                       class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Add
                                       Images </span></a></li>
                       </ul>
                   </li>




               </ul>
           </nav>
           <!-- End Sidebar navigation -->
       </div>
       <!-- End Sidebar scroll-->
   </aside>
