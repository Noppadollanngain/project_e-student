            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Document<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.documentlist1')}}">รายใหม่</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.documentlist2')}}">รายใหม่เลื่อนชั้นปี</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.documentlist3')}}">รายเก่า</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.documentlist4')}}">รายเก่าเกินหลักสูตร</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-th-list fa-fw"></i> Admin Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.showadmin')}}">Show Admin</a>
                                </li>
                                @if (Auth::user()->possition==1)
                                    <li>
                                        <a href="{{route('admin.addadmin')}}">Add Admin</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{route('possition')}}">Possition Admin</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
