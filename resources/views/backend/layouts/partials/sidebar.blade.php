 <!-- sidebar menu area start -->

 @php
     $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard')}}">
                Admin Dashboard
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    
                    <!--- Admin management ----->

                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    <!--- Admin management ----->

                    <!--- Setup section --->
                     @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Manage Setup
                        </span></a>
                        <!---- Session management start ----->
                        <ul class="collapse {{ Route::is('admin.session.create') || Route::is('admin.session.index') || Route::is('admin.session.edit') || Route::is('admin.session.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.session.index')  || Route::is('admin.session.edit') ? 'active' : '' }}"><a href="{{ route('admin.student.session.index') }}">Student Session</a></li>
                            @endif
                        </ul>
                        <!---- Session management end -------->

                        <!---- Class management start ----->
                        <ul class="collapse {{ Route::is('admin.classes.create') || Route::is('admin.classes.index') || Route::is('admin.classes.edit') || Route::is('admin.classes.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.classes.index')  || Route::is('admin.classes.edit') ? 'active' : '' }}"><a href="{{ route('admin.student.classes.index') }}">Student Classes</a></li>
                            @endif
                        </ul>
                        <!---- Class management end ----->


    <!---- Class Section management start ----->
    <ul class="collapse {{ Route::is('admin.section.create') || Route::is('admin.section.index') || Route::is('admin.section.edit') || Route::is('admin.section.show') ? 'in' : '' }}">
        
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.section.index')  || Route::is('admin.section.edit') ? 'active' : '' }}"><a href="{{ route('admin.student.section.index') }}">Student Section</a></li>
        @endif
    </ul>
    <!---- Class Section management end ----->

    <!---- Class Group management start ----->
    <ul class="collapse {{ Route::is('admin.group.create') || Route::is('admin.group.index') || Route::is('admin.group.edit') || Route::is('admin.group.show') ? 'in' : '' }}">
        
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.group.index')  || Route::is('admin.group.edit') ? 'active' : '' }}"><a href="{{ route('admin.student.group.index') }}">Student Group</a></li>
        @endif
    </ul>
    <!---- Class Group management end ----->

    <!---- Class Shift management start ----->
    <ul class="collapse {{ Route::is('admin.shift.create') || Route::is('admin.shift.index') || Route::is('admin.shift.edit') || Route::is('admin.shift.show') ? 'in' : '' }}">
        
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.shift.index')  || Route::is('admin.shift.edit') ? 'active' : '' }}"><a href="{{ route('admin.student.shift.index') }}">Student Shift</a></li>
        @endif
    </ul>
    <!---- Class Shift management end ----->

    <!---- Student fee_category management start ----->
    <ul class="collapse {{ Route::is('admin.fee_category.create') || Route::is('admin.fee_category.index') || Route::is('admin.fee_category.edit') || Route::is('admin.fee_category.show') ? 'in' : '' }}">
        
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.fee_category.index')  || Route::is('admin.fee_category.edit') ? 'active' : '' }}"><a href="{{ route('admin.student.fee_category.index') }}">Student Fee Category</a></li>
        @endif
    </ul>
    <!---- Student fee_category management end ----->


    <!---- Student fee_category_amount management start ----->
    <ul class="collapse {{ Route::is('admin.fee_amount.create') || Route::is('admin.fee_amount.index') || Route::is('admin.fee_amount.edit') || Route::is('admin.fee_amount.show') ? 'in' : '' }}">
        
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.fee_amount.index')  || Route::is('admin.fee_amount.edit') ? 'active' : '' }}"><a href="{{ route('admin.student.fee_amount.index') }}">Fee Category Amount</a></li>
        @endif
    </ul>
    <!---- Student fee_category_amount management end ----->

    <!---- Student Exam Type management start ----->
    <ul class="collapse {{ Route::is('admin.exam_type.create') || Route::is('admin.exam_type.index') || Route::is('admin.exam_type.edit') || Route::is('admin.exam_type.show') ? 'in' : '' }}">
        
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.exam_type.index')  || Route::is('admin.exam_type.edit') ? 'active' : '' }}"><a href="{{ route('admin.exam_type.index') }}">Exam Type</a></li>
        @endif
    </ul>
    <!---- Student Exam Type management end ----->

    <!---- Student Exam Type management start ----->
    <ul class="collapse {{ Route::is('admin.subject.create') || Route::is('admin.subject.index') || Route::is('admin.subject.edit') || Route::is('admin.subject.show') ? 'in' : '' }}">
        
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.subject.index')  || Route::is('admin.subject.edit') ? 'active' : '' }}"><a href="{{ route('admin.subject.index') }}">Subject</a></li>
        @endif
    </ul>
    <!---- Student Exam Type management end ----->

    <!---- Assign Subject management start ----->
    <ul class="collapse {{ Route::is('admin.assign_subject.create') || Route::is('admin.assign_subject.index') || Route::is('admin.assign_subject.edit') || Route::is('admin.assign_subject.show') ? 'in' : '' }}">
        
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.assign_subject.index')  || Route::is('admin.assign_subject.edit') ? 'active' : '' }}"><a href="{{ route('admin.assign_subject.index') }}">Assign Subject</a></li>
        @endif
    </ul>
    <!---- Assign Subject management end -----> 

    <!---- Designation management start ----->
    <ul class="collapse {{ Route::is('admin.designation.create') || Route::is('admin.designation.index') || Route::is('admin.designation.edit') || Route::is('admin.designation.show') ? 'in' : '' }}">
        
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.designation.index')  || Route::is('admin.designation.edit') ? 'active' : '' }}"><a href="{{ route('admin.designation.index') }}">Designation</a></li>
        @endif
    </ul>
    <!---- Designation management end ----->
</li>


<!---- Student Registration management start ----->
 <li>
    <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
        Student Management
    </span></a>
    <ul class="collapse {{ Route::is('admin.student_reg.create') || Route::is('admin.student_reg.index') || Route::is('admin.student_reg.edit') || Route::is('admin.student_reg.show') ? 'in' : '' }}">
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.student_reg.index')  || Route::is('admin.student_reg.edit') ? 'active' : '' }}"><a href="{{ route('admin.student_reg.index') }}">All Student</a></li>
        @endif
        @if ($usr->can('admin.create'))
            <li class="{{ Route::is('admin.student_reg.create')  ? 'active' : '' }}"><a href="{{ route('admin.student_reg.create') }}">Student Registration</a></li>
        @endif

         @if ($usr->can('admin.view'))
            <li class="{{Route::is('student.reg.fee.view') ? 'active' : '' }}"><a href="{{ route('student.reg.fee.view') }}">Registration Fee</a></li>
        @endif 

        @if ($usr->can('admin.view'))
            <li class="{{Route::is('student.monthly.fee.view') ? 'active' : '' }}"><a href="{{ route('student.monthly.fee.view') }}">Monthly Fee</a></li>
        @endif 

        @if ($usr->can('admin.view'))
            <li class="{{Route::is('student.exam.fee.view') ? 'active' : '' }}"><a href="{{ route('student.exam.fee.view') }}">Exam Fee</a></li>
        @endif 

        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.roll.generate.index')  || Route::is('admin.roll.generate.edit') ? 'active' : '' }}"><a href="{{ route('admin.roll.generate.index') }}">Roll Generate</a></li>
        @endif
    </ul> 
</li>
<!---- Student Registration management end ----->

<!---- Employee Registration management start ----->
 <li>
    <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
        Employee Management
    </span></a>
    <ul class="collapse {{ Route::is('admin.employee_reg.create') || Route::is('admin.employee_reg.index') || Route::is('admin.employee_reg.edit') || Route::is('admin.employee_reg.show') ? 'in' : '' }}">
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.employee_reg.index')  || Route::is('admin.employee_reg.edit') ? 'active' : '' }}"><a href="{{ route('admin.employee_reg.index') }}">All Employee</a></li>
        @endif
        @if ($usr->can('admin.create'))
            <li class="{{ Route::is('admin.employee_reg.create')  ? 'active' : '' }}"><a href="{{ route('admin.employee_reg.create') }}">Employee Registration</a></li>
        @endif
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.employee_salary.index')  || Route::is('admin.employee_salary.edit') ? 'active' : '' }}"><a href="{{ route('admin.employee_salary.index') }}">Employee Salary</a></li>
        @endif
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('admin.employee_leave.index')  || Route::is('admin.employee_leave.edit') ? 'active' : '' }}"><a href="{{ route('admin.employee_leave.index') }}">Employee Leave</a></li>
        @endif
    </ul> 
</li>
<!---- Employee Registration management end ----->

<!---- RahimStore management start ----->
 <li>
    <a style="color: red" href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
        Rahim Store Mgnt
    </span></a>
    <ul class="collapse {{ Route::is('setup.rahim_store.add') || Route::is('setup.rahim_store.index') || Route::is('setup.rahim_store.edit') || Route::is('setup.rahim_store.view') ? 'in' : '' }}">
        @if ($usr->can('admin.view'))
            <li class="{{ Route::is('setup.rahim_store.view')  || Route::is('setup.rahim_store.edit') ? 'active' : '' }}"><a href="{{ route('setup.rahim_store.view') }}">All Product</a></li>
        @endif
    </ul> 
</li>
<!---- Employee Registration management end ----->
@endif
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->