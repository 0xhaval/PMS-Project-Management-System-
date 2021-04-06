<style>
    .sidebar-wrapper{
        background-color: #b3453f;
        color: white
    }
    ul li a{
        color: white
    }

    .sidebar-wrapper .menu .sidebar-link > span{
        color: white;
        font-size: 16px
    }

    .sidebar-wrapper .menu .submenu li a{
        color: white;
        font-size: 14px;
    }

    .sidebar-wrapper .menu .sidebar-title{
        color: white
    }
</style>
<div class="sidebar-menu" >
    <ul class="menu">


            <li class='sidebar-title'>Main Menu</li>



            <li class="sidebar-item">
                <a href="{{ route('admin.home') }}" class='sidebar-link'>
                    <i data-feather="home" width="20"></i>
                    <span>Dashboard</span>
                </a>

            </li>


            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="users" width="20"></i>
                    <span>Groups</span>
                </a>

                <ul class="submenu ">

                    <li>
                        <a href="{{ route('admin.group.index') }}">Show All</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.group.create') }}">Add a new</a>
                    </li>

                </ul>

            </li>


            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="user" width="20"></i>
                    <span>Users</span>
                </a>

                <ul class="submenu ">

                    <li>
                        <a href="{{ route('admin.user.index') }}">Show All</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.user.create') }}">Add a new</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.student.info') }}">Student info</a>
                    </li>

                </ul>

            </li>



            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="file" width="20"></i>
                    <span>Project Types</span>
                </a>

                <ul class="submenu ">

                    <li>
                        <a href="{{ route('admin.projectType.index') }}">Show All</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.projectType.create') }}">Add a new</a>
                    </li>

                </ul>

            </li>


            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="file" width="20"></i>
                    <span>Projects</span>
                </a>

                <ul class="submenu ">

                    <li>
                        <a href="{{ route('admin.project.index') }}">Show All</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.project.create') }}">Add a new</a>
                    </li>

                </ul>

            </li>

            <li class="sidebar-item ">
                <a href="{{ route('admin.project.result') }}" class='sidebar-link'>
                    <i data-feather="award" width="20"></i>
                    <span>Choice Result</span>
                </a>

            </li>

            <li class="sidebar-item ">
                <a href="{{ route('admin.project.final.show') }}" class='sidebar-link'>
                    <i data-feather="award" width="20"></i>
                    <span>Final Result</span>
                </a>

            </li>




    </ul>
</div>
