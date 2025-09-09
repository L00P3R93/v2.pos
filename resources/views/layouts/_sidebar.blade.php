<!-- Sidebar -->
<div class="sidebar d-none" id="sidebar">
    <!-- Logo -->
    <div class="sidebar-logo">
        <a href="#" class="logo logo-normal">
            <img src="{{ asset('assets/img/logo.svg') }}" alt="Img">
        </a>
        <a href="#" class="logo logo-white">
            <img src="{{ asset('assets/img/logo-white.svg') }}" alt="Img">
        </a>
        <a href="#" class="logo-small">
            <img src="{{ asset('assets/img/logo-small.png') }}" alt="Img">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
            <i data-feather="chevrons-left" class="feather-16"></i>
        </a>
    </div>
    <!-- /Logo -->
    <div class="modern-profile p-3 pb-0">
        <div class="text-center rounded bg-light p-3 mb-4 user-profile">
            <div class="avatar avatar-lg online mb-3">
                <img src="{{ asset('assets/img/customer/customer15.jpg') }}" alt="Img" class="img-fluid rounded-circle">
            </div>
            <h6 class="fs-14 fw-bold mb-1">Adrian Herman</h6>
            <p class="fs-12 mb-0">System Admin</p>
        </div>
        <div class="sidebar-nav mb-3">
            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent" role="tablist">
                <li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="#">Chats</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="#">Inbox</a></li>
            </ul>
        </div>
    </div>
    <div class="sidebar-header p-3 pb-0 pt-2">
        <div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
            <div class="avatar avatar-md onlin">
                <img src="{{ asset('assets/img/customer/customer15.jpg') }}" alt="Img" class="img-fluid rounded-circle">
            </div>
            <div class="text-start sidebar-profile-info ms-2">
                <h6 class="fs-14 fw-bold mb-1">Adrian Herman</h6>
                <p class="fs-12">System Admin</p>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between menu-item mb-3">
            <div>
                <a href="#" class="btn btn-sm btn-icon bg-light">
                    <i class="ti ti-layout-grid-remove"></i>
                </a>
            </div>
            <div>
                <a href="#" class="btn btn-sm btn-icon bg-light">
                    <i class="ti ti-brand-hipchat"></i>
                </a>
            </div>
            <div>
                <a href="#" class="btn btn-sm btn-icon bg-light position-relative">
                    <i class="ti ti-message"></i>
                </a>
            </div>
            <div class="notification-item">
                <a href="#" class="btn btn-sm btn-icon bg-light position-relative">
                    <i class="ti ti-bell"></i>
                    <span class="notification-status-dot"></span>
                </a>
            </div>
            <div class="me-0">
                <a href="#" class="btn btn-sm btn-icon bg-light">
                    <i class="ti ti-settings"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Main</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop active"><i class="ti ti-layout-grid fs-16 me-2"></i><span>Dashboard</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#" class="active">Admin Dashboard</a></li>
                                <li><a href="#">Admin Dashboard 2</a></li>
                                <li><a href="#">Sales Dashboard</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-user-edit fs-16 me-2"></i><span>Super Admin</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Companies</a></li>
                                <li><a href="#">Subscriptions</a></li>
                                <li><a href="#">Packages</a></li>
                                <li><a href="#">Domain</a></li>
                                <li><a href="#">Purchase Transaction</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-brand-apple-arcade fs-16 me-2"></i><span>Application</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Chat</a></li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Call<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Video Call</a></li>
                                        <li><a href="#">Audio Call</a></li>
                                        <li><a href="#">Call History</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Calendar</a></li>
                                <li><a href="#">Contacts</a></li>
                                <li><a href="#">Email</a></li>
                                <li><a href="#">To Do</a></li>
                                <li><a href="#">Notes</a></li>
                                <li><a href="#">File Manager</a></li>
                                <li><a href="#">Projects</a></li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Ecommerce<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Products</a></li>
                                        <li><a href="#">Orders</a></li>
                                        <li><a href="#">Customers</a></li>
                                        <li><a href="#">Cart</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Wishlist</a></li>
                                        <li><a href="#">Reviews</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Social Feed</a></li>
                                <li><a href="#">Search List</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-layout-sidebar-right-collapse fs-16 me-2"></i><span>Layouts</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Horizontal</a></li>
                                <li><a href="#">Detached</a></li>
                                <li><a href="#">Two Column</a></li>
                                <li><a href="#">Hovered</a></li>
                                <li><a href="#">Boxed</a></li>
                                <li><a href="#">RTL</a></li>
                                <li><a href="#">Dark</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Inventory</h6>
                    <ul>
                        <li><a href="#"><i data-feather="box"></i><span>Products</span></a></li>
                        <li><a href="#"><i class="ti ti-table-plus fs-16 me-2"></i><span>Create Product</span></a></li>
                        <li><a href="#"><i class="ti ti-progress-alert fs-16 me-2"></i><span>Expired Products</span></a></li>
                        <li><a href="#"><i class="ti ti-trending-up-2 fs-16 me-2"></i><span>Low Stocks</span></a></li>
                        <li><a href="#"><i class="ti ti-list-details fs-16 me-2"></i><span>Category</span></a></li>
                        <li><a href="#"><i class="ti ti-carousel-vertical fs-16 me-2"></i><span>Sub Category</span></a></li>
                        <li><a href="#"><i class="ti ti-triangles fs-16 me-2"></i><span>Brands</span></a></li>
                        <li><a href="#"><i class="ti ti-brand-unity fs-16 me-2"></i><span>Units</span></a></li>
                        <li><a href="#"><i class="ti ti-checklist fs-16 me-2"></i><span>Variant Attributes</span></a></li>
                        <li><a href="#"><i class="ti ti-certificate fs-16 me-2"></i><span>Warranties</span></a></li>
                        <li><a href="#"><i class="ti ti-barcode fs-16 me-2"></i><span>Print Barcode</span></a></li>
                        <li><a href="#"><i class="ti ti-qrcode fs-16 me-2"></i><span>Print QR Code</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Stock</h6>
                    <ul>
                        <li><a href="#"><i class="ti ti-stack-3 fs-16 me-2"></i><span>Manage Stock</span></a></li>
                        <li><a href="#"><i class="ti ti-stairs-up fs-16 me-2"></i><span>Stock Adjustment</span></a></li>
                        <li><a href="#"><i class="ti ti-stack-pop fs-16 me-2"></i><span>Stock Transfer</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Sales</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-layout-grid fs-16 me-2"></i><span>Sales</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Online Orders</a></li>
                                <li><a href="#">POS Orders</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="ti ti-file-invoice fs-16 me-2"></i><span>Invoices</span></a></li>
                        <li><a href="#"><i class="ti ti-receipt-refund fs-16 me-2"></i><span>Sales Return</span></a></li>
                        <li><a href="#"><i class="ti ti-files fs-16 me-2"></i><span>Quotation</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-device-laptop fs-16 me-2"></i><span>POS</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">POS 1</a></li>
                                <li><a href="#">POS 2</a></li>
                                <li><a href="#">POS 3</a></li>
                                <li><a href="#">POS 4</a></li>
                                <li><a href="#">POS 5</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Promo</h6>
                    <ul>
                        <li><a href="#"><i class="ti ti-ticket fs-16 me-2"></i><span>Coupons</span></a></li>
                        <li><a href="#"><i class="ti ti-cards fs-16 me-2"></i><span>Gift Cards</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-file-percent fs-16 me-2"></i><span>Discount</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Discount Plan</a></li>
                                <li><a href="#">Discount</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Purchases</h6>
                    <ul>
                        <li><a href="#"><i class="ti ti-shopping-bag fs-16 me-2"></i><span>Purchases</span></a></li>
                        <li><a href="#"><i class="ti ti-file-unknown fs-16 me-2"></i><span>Purchase Order</span></a></li>
                        <li><a href="#"><i class="ti ti-file-upload fs-16 me-2"></i><span>Purchase Return</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Finance & Accounts</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-file-stack fs-16 me-2"></i><span>Expenses</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Expenses</a></li>
                                <li><a href="#">Expense Category</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-file-pencil fs-16 me-2"></i><span>Income</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Income</a></li>
                                <li><a href="#">Income Category</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="ti ti-building-bank fs-16 me-2"></i><span>Bank Accounts</span></a></li>
                        <li><a href="#"><i class="ti ti-moneybag fs-16 me-2"></i><span>Money Transfer</span></a></li>
                        <li><a href="#"><i class="ti ti-report-money fs-16 me-2"></i><span>Balance Sheet</span></a></li>
                        <li><a href="#"><i class="ti ti-alert-circle fs-16 me-2"></i><span>Trial Balance</span></a></li>
                        <li><a href="#"><i class="ti ti-zoom-money fs-16 me-2"></i><span>Cash Flow</span></a></li>
                        <li><a href="#"><i class="ti ti-file-infinity fs-16 me-2"></i><span>Account Statement</span></a></li>

                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Peoples</h6>
                    <ul>
                        <li><a href="#"><i class="ti ti-users-group fs-16 me-2"></i><span>Customers</span></a></li>
                        <li><a href="#"><i class="ti ti-user-up fs-16 me-2"></i><span>Billers</span></a></li>
                        <li><a href="#"><i class="ti ti-user-dollar fs-16 me-2"></i><span>Suppliers</span></a></li>
                        <li><a href="#"><i class="ti ti-home-bolt fs-16 me-2"></i><span>Stores</span></a></li>
                        <li><a href="#"><i class="ti ti-archive fs-16 me-2"></i><span>Warehouses</span></a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">HRM</h6>
                    <ul>
                        <li><a href="#"><i class="ti ti-user fs-16 me-2"></i><span>Employees</span></a></li>
                        <li><a href="#"><i class="ti ti-compass fs-16 me-2"></i><span>Departments</span></a></li>
                        <li><a href="#"><i class="ti ti-git-merge fs-16 me-2"></i><span>Designation</span></a></li>
                        <li><a href="#"><i class="ti ti-arrows-shuffle fs-16 me-2"></i><span>Shifts</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-user-cog fs-16 me-2"></i><span>Attendence</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Employee</a></li>
                                <li><a href="#">Admin</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-calendar fs-16 me-2"></i><span>Leaves</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Admin Leaves</a></li>
                                <li><a href="#">Employee Leaves</a></li>
                                <li><a href="#">Leave Types</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="ti ti-calendar-share fs-16 me-2"></i><span>Holidays</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="ti ti-file-dollar fs-16 me-2"></i><span>Payroll</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Employee Salary</a></li>
                                <li><a href="#">Payslip</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Reports</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-chart-bar fs-16 me-2"></i><span>Sales Report</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Sales Report</a></li>
                                <li><a href="#">Best Seller</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="ti ti-chart-pie-2 fs-16 me-2"></i><span>Purchase report</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-triangle-inverted fs-16 me-2"></i><span>Inventory Report</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Inventory Report</a></li>
                                <li><a href="#">Stock History</a></li>
                                <li><a href="#">Sold Stock</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="ti ti-businessplan fs-16 me-2"></i><span>Invoice Report</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-user-star fs-16 me-2"></i><span>Supplier Report</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Supplier Report</a></li>
                                <li><a href="#">Supplier Due Report</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-report fs-16 me-2"></i><span>Customer Report</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Customer Report</a></li>
                                <li><a href="#">Customer Due Report</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-report-analytics fs-16 me-2"></i><span>Product Report</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Product Report</a></li>
                                <li><a href="#">Product Expiry Report</a></li>
                                <li><a href="#">Product Quantity Alert</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="ti ti-file-vector fs-16 me-2"></i><span>Expense Report</span></a></li>
                        <li><a href="#"><i class="ti ti-chart-ppf fs-16 me-2"></i><span>Income Report</span></a></li>
                        <li><a href="#"><i class="ti ti-chart-dots-2 fs-16 me-2"></i><span>Tax Report</span></a></li>
                        <li><a href="#"><i class="ti ti-chart-donut fs-16 me-2"></i><span>Profit & Loss</span></a></li>
                        <li><a href="#"><i class="ti ti-report-search fs-16 me-2"></i><span>Annual Report</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Content (CMS)</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-page-break fs-16 me-2"></i><span>Pages</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Pages</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-wallpaper fs-16 me-2"></i><span>Blog</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">All Blog</a></li>
                                <li><a href="#">Blog Tags</a></li>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Blog Comments</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-map-pin fs-16 me-2"></i><span>Location</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Countries</a></li>
                                <li><a href="#">States</a></li>
                                <li><a href="#">Cities</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="ti ti-star fs-16 me-2"></i><span>Testimonials</span></a></li>
                        <li><a href="#"><i class="ti ti-help-circle fs-16 me-2"></i><span>FAQ</span></a></li>

                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">User Management</h6>
                    <ul>
                        <li><a href="#"><i class="ti ti-shield-up fs-16 me-2"></i><span>Users</span></a></li>
                        <li><a href="#"><i class="ti ti-jump-rope fs-16 me-2"></i><span>Roles & Permissions</span></a></li>
                        <li><a href="#"><i class="ti ti-trash-x fs-16 me-2"></i><span>Delete Account Request</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Pages</h6>
                    <ul>
                        <li><a href="#"><i class="ti ti-user-circle fs-16 me-2"></i><span>Profile</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-shield fs-16 me-2"></i><span>Authentication</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Cover</a></li>
                                        <li><a href="#">Illustration</a></li>
                                        <li><a href="#">Basic</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Cover</a></li>
                                        <li><a href="#">Illustration</a></li>
                                        <li><a href="#">Basic</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot Password<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Cover</a></li>
                                        <li><a href="#">Illustration</a></li>
                                        <li><a href="#">Basic</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Reset Password<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Cover</a></li>
                                        <li><a href="#">Illustration</a></li>
                                        <li><a href="#">Basic</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Email Verification<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Cover</a></li>
                                        <li><a href="#">Illustration</a></li>
                                        <li><a href="#">Basic</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step Verification<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Cover</a></li>
                                        <li><a href="#">Illustration</a></li>
                                        <li><a href="#">Basic</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Lock Screen</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-file-x fs-16 me-2"></i><span>Error Pages</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">404 Error </a></li>
                                <li><a href="#">500 Error </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="ti ti-file fs-16 me-2"></i><span>Blank Page</span> </a>
                        </li>
                        <li>
                            <a href="#"><i class="ti ti-currency-dollar fs-16 me-2"></i><span>Pricing</span> </a>
                        </li>
                        <li>
                            <a href="#"><i class="ti ti-send fs-16 me-2"></i><span>Coming Soon</span> </a>
                        </li>
                        <li>
                            <a href="#"><i class="ti ti-alert-triangle fs-16 me-2"></i><span>Under Maintenance</span> </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Settings</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-settings fs-16 me-2"></i><span>General Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Security</a></li>
                                <li><a href="#">Notifications</a></li>
                                <li><a href="#">Connected Apps</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-world fs-16 me-2"></i><span>Website Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">System Settings</a></li>
                                <li><a href="#">Company Settings </a></li>
                                <li><a href="#">Localization</a></li>
                                <li><a href="#">Prefixes</a></li>
                                <li><a href="#">Preference</a></li>
                                <li><a href="#">Appearance</a></li>
                                <li><a href="#">Social Authentication</a></li>
                                <li><a href="#">Language</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-device-mobile fs-16 me-2"></i>
                                <span>App Settings</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Invoice<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Invoice Settings</a></li>
                                        <li><a href="#">Invoice Template</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Printer</a></li>
                                <li><a href="#">POS</a></li>
                                <li><a href="#">Custom Fields</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-device-desktop fs-16 me-2"></i>
                                <span>System Settings</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Email<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Email Settings</a></li>
                                        <li><a href="#">Email Template</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">SMS<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">SMS Settings</a></li>
                                        <li><a href="#">SMS Template</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">OTP</a></li>
                                <li><a href="#">GDPR Cookies</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-settings-dollar fs-16 me-2"></i>
                                <span>Financial Settings</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="#">Payment Gateway</a></li>
                                <li><a href="#">Bank Accounts</a></li>
                                <li><a href="#">Tax Rates</a></li>
                                <li><a href="#">Currencies</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-settings-2 fs-16 me-2"></i>
                                <span>Other Settings</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="#">Storage</a></li>
                                <li><a href="#">Ban IP Address</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="ti ti-logout fs-16 me-2"></i><span>Logout</span> </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">UI Interface</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-vector-bezier fs-16 me-2"></i><span>Base UI</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="#">Alerts</a></li>
                                <li><a href="#">Accordion</a></li>
                                <li><a href="#">Avatar</a></li>
                                <li><a href="#">Badges</a></li>
                                <li><a href="#">Border</a></li>
                                <li><a href="#">Buttons</a></li>
                                <li><a href="#">Button Group</a></li>
                                <li><a href="#">Breadcrumb</a></li>
                                <li><a href="#">Card</a></li>
                                <li><a href="#">Carousel</a></li>
                                <li><a href="#">Colors</a></li>
                                <li><a href="#">Dropdowns</a></li>
                                <li><a href="#">Grid</a></li>
                                <li><a href="#">Images</a></li>
                                <li><a href="#">Lightbox</a></li>
                                <li><a href="#">Media</a></li>
                                <li><a href="#">Modals</a></li>
                                <li><a href="#">Offcanvas</a></li>
                                <li><a href="#">Pagination</a></li>
                                <li><a href="#">Popovers</a></li>
                                <li><a href="#">Progress</a></li>
                                <li><a href="#">Placeholders</a></li>
                                <li><a href="#">Range Slider</a></li>
                                <li><a href="#">Spinner</a></li>
                                <li><a href="#">Sweet Alerts</a></li>
                                <li><a href="#">Tabs</a></li>
                                <li><a href="#">Toasts</a></li>
                                <li><a href="#">Tooltips</a></li>
                                <li><a href="#">Typography</a></li>
                                <li><a href="#">Video</a></li>
                                <li><a href="#">Sortable</a></li>
                                <li><a href="#">Swiperjs</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i data-feather="layers"></i><span>Advanced UI</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="#">Ribbon</a></li>
                                <li><a href="#">Clipboard</a></li>
                                <li><a href="#">Drag & Drop</a></li>
                                <li><a href="#">Range Slider</a></li>
                                <li><a href="#">Rating</a></li>
                                <li><a href="#">Text Editor</a></li>
                                <li><a href="#">Counter</a></li>
                                <li><a href="#">Scrollbar</a></li>
                                <li><a href="#">Sticky Note</a></li>
                                <li><a href="#">Timeline</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-chart-infographic fs-16 me-2"></i>
                                <span>Charts</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="#">Apex Charts</a></li>
                                <li><a href="#">Chart C3</a></li>
                                <li><a href="#">Chart Js</a></li>
                                <li><a href="#">Morris Charts</a></li>
                                <li><a href="#">Flot Charts</a></li>
                                <li><a href="#">Peity Charts</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-icons fs-16 me-2"></i>
                                <span>Icons</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="#">Fontawesome Icons</a></li>
                                <li><a href="#">Feather Icons</a></li>
                                <li><a href="#">Ionic Icons</a></li>
                                <li><a href="#">Material Icons</a></li>
                                <li><a href="#">Pe7 Icons</a></li>
                                <li><a href="#">Simpleline Icons</a></li>
                                <li><a href="#">Themify Icons</a></li>
                                <li><a href="#">Weather Icons</a></li>
                                <li><a href="#">Typicon Icons</a></li>
                                <li><a href="#">Flag Icons</a></li>
                                <li><a href="#">Tabler Icons</a></li>
                                <li><a href="#">Bootstrap Icons</a></li>
                                <li><a href="#">Remix Icons</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-input-search fs-16 me-2"></i><span>Forms</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li class="submenu submenu-two">
                                    <a href="javascript:void(0);">Form Elements<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Basic Inputs</a></li>
                                        <li><a href="#">Checkbox & Radios</a></li>
                                        <li><a href="#">Input Groups</a></li>
                                        <li><a href="#">Grid & Gutters</a></li>
                                        <li><a href="#">Form Select</a></li>
                                        <li><a href="#">Input Masks</a></li>
                                        <li><a href="#">File Uploads</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two">
                                    <a href="javascript:void(0);">Layouts<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Horizontal Form</a></li>
                                        <li><a href="#">Vertical Form</a></li>
                                        <li><a href="#">Floating Labels</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Form Validation</a></li>
                                <li><a href="#">Select2</a></li>
                                <li><a href="#">Form Wizard</a></li>
                                <li><a href="#">Form Picker</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-table fs-16 me-2"></i><span>Tables</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Basic Tables </a></li>
                                <li><a href="#">Data Table </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-map-pin-pin fs-16 me-2"></i><span>Maps</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Vector</a></li>
                                <li><a href="#">Leaflet</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Help</h6>
                    <ul>
                        <li><a href="javascript:void(0);"><i class="ti ti-file-text fs-16 me-2"></i><span>Documentation</span></a></li>
                        <li><a href="javascript:void(0);"><i class="ti ti-exchange fs-16 me-2"></i><span>Changelog </span><span class="badge bg-primary badge-xs text-white fs-10 ms-2">v2.0.9</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-menu-2 fs-16 me-2"></i><span>Multi Level</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="javascript:void(0);">Level 1.1</a></li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Level 1.2<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="javascript:void(0);">Level 2.1</a></li>
                                        <li class="submenu submenu-two submenu-three"><a href="javascript:void(0);">Level 2.2<span class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                            <ul>
                                                <li><a href="javascript:void(0);">Level 3.1</a></li>
                                                <li><a href="javascript:void(0);">Level 3.2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->

<!-- Horizontal Sidebar -->
<div class="sidebar sidebar-horizontal d-none" id="horizontal-menu">
    <div id="sidebar-menu-3" class="sidebar-menu">
        <div class="main-menu">
            <ul class="nav-menu">
                <li class="submenu">
                    <a href="#"><i class="ti ti-layout-grid fs-16 me-2"></i><span> Main Menu</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="active subdrop"><span>Dashboard</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#" class="active">Admin Dashboard</a></li>
                                <li><a href="#">Admin Dashboard 2</a></li>
                                <li><a href="#">Sales Dashboard</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Super Admin</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Companies</a></li>
                                <li><a href="#">Subscriptions</a></li>
                                <li><a href="#">Packages</a></li>
                                <li><a href="#">Domain</a></li>
                                <li><a href="#">Purchase Transaction</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Application</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Chat</a></li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Call<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Video Call</a></li>
                                        <li><a href="#">Audio Call</a></li>
                                        <li><a href="#">Call History</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Calendar</a></li>
                                <li><a href="#">Contacts</a></li>
                                <li><a href="#">Email</a></li>
                                <li><a href="#">To Do</a></li>
                                <li><a href="#">Notes</a></li>
                                <li><a href="#">File Manager</a></li>
                                <li><a href="#">Projects</a></li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Ecommerce<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Products</a></li>
                                        <li><a href="#">Orders</a></li>
                                        <li><a href="#">Customers</a></li>
                                        <li><a href="#">Cart</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Wishlist</a></li>
                                        <li><a href="#">Reviews</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Social Feed</a></li>
                                <li><a href="#">Search List</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="ti ti-layout-sidebar-right-collapse fs-16 me-2"></i><span>Layouts</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">Horizontal</a></li>
                        <li><a href="#">Detached</a></li>
                        <li><a href="#">Two Column</a></li>
                        <li><a href="#">Hovered</a></li>
                        <li><a href="#">Boxed</a></li>
                        <li><a href="#">RTL</a></li>
                        <li><a href="#">Dark</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="ti ti-brand-unity fs-16 me-2"></i><span> Inventory
                                        </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#"><span>Products</span></a></li>
                        <li><a href="#"><span>Create Product</span></a></li>
                        <li><a href="#"><span>Expired Products</span></a></li>
                        <li><a href="#"><span>Low Stocks</span></a></li>
                        <li><a href="#"><span>Category</span></a></li>
                        <li><a href="#"><span>Sub Category</span></a></li>
                        <li><a href="#"><span>Brands</span></a></li>
                        <li><a href="#"><span>Units</span></a></li>
                        <li><a href="#"><span>Variant Attributes</span></a></li>
                        <li><a href="#"><span>Warranties</span></a></li>
                        <li><a href="#"><span>Print Barcode</span></a></li>
                        <li><a href="#"><span>Print QR Code</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="ti ti-layout-grid fs-16 me-2"></i><span>Sales &amp; Purchase</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Stock</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#"><span>Manage Stock</span></a></li>
                                <li><a href="#"><span>Stock Adjustment</span></a></li>
                                <li><a href="#"><span>Stock Transfer</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Sales</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Sales</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="#">Online Orders</a></li>
                                        <li><a href="#">POS Orders</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><span>Invoices</span></a></li>
                                <li><a href="#"><span>Sales Return</span></a></li>
                                <li><a href="#"><span>Quotation</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>POS</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="#">POS 1</a></li>
                                        <li><a href="#">POS 2</a></li>
                                        <li><a href="#">POS 3</a></li>
                                        <li><a href="#">POS 4</a></li>
                                        <li><a href="#">POS 5</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Promo</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#"><span>Coupons</span></a></li>
                                <li><a href="#"><span>Gift Cards</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Discount</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="#">Discount Plan</a></li>
                                        <li><a href="#">Discount</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Purchase</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#"><span>Purchases</span></a></li>
                                <li><a href="#"><span>Purchase Order</span></a></li>
                                <li><a href="#"><span>Purchase Return</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Expenses</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Expenses</a></li>
                                <li><a href="#">Expense Category</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Income</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Income</a></li>
                                <li><a href="#">Income Category</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span>Bank Accounts</span></a></li>
                        <li><a href="#"><span>Money Transfer</span></a></li>
                        <li><a href="#"><span>Balance Sheet</span></a></li>
                        <li><a href="#"><span>Trial Balance</span></a></li>
                        <li><a href="#"><span>Cash Flow</span></a></li>
                        <li><a href="#"><span>Account Statement</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="ti ti-users-group fs-16 me-2"></i><span>UI Interface</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Base UI</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Alerts</a></li>
                                <li><a href="#">Accordion</a></li>
                                <li><a href="#">Avatar</a></li>
                                <li><a href="#">Badges</a></li>
                                <li><a href="#">Border</a></li>
                                <li><a href="#">Buttons</a></li>
                                <li><a href="#">Button Group</a></li>
                                <li><a href="#">Breadcrumb</a></li>
                                <li><a href="#">Card</a></li>
                                <li><a href="#">Carousel</a></li>
                                <li><a href="#">Colors</a></li>
                                <li><a href="#">Dropdowns</a></li>
                                <li><a href="#">Grid</a></li>
                                <li><a href="#">Images</a></li>
                                <li><a href="#">Lightbox</a></li>
                                <li><a href="#">Media</a></li>
                                <li><a href="#">Modals</a></li>
                                <li><a href="#">Offcanvas</a></li>
                                <li><a href="#">Pagination</a></li>
                                <li><a href="#">Popovers</a></li>
                                <li><a href="#">Progress</a></li>
                                <li><a href="#">Placeholders</a></li>
                                <li><a href="#">Range Slider</a></li>
                                <li><a href="#">Spinner</a></li>
                                <li><a href="#">Sweet Alerts</a></li>
                                <li><a href="#">Tabs</a></li>
                                <li><a href="#">Toasts</a></li>
                                <li><a href="#">Tooltips</a></li>
                                <li><a href="#">Typography</a></li>
                                <li><a href="#">Video</a></li>
                                <li><a href="#">Sortable</a></li>
                                <li><a href="#">Swiperjs</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Advanced UI</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Ribbon</a></li>
                                <li><a href="#">Clipboard</a></li>
                                <li><a href="#">Drag & Drop</a></li>
                                <li><a href="#">Range Slider</a></li>
                                <li><a href="#">Rating</a></li>
                                <li><a href="#">Text Editor</a></li>
                                <li><a href="#">Counter</a></li>
                                <li><a href="#">Scrollbar</a></li>
                                <li><a href="#">Sticky Note</a></li>
                                <li><a href="#">Timeline</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Charts</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Apex Charts</a></li>
                                <li><a href="#">Chart C3</a></li>
                                <li><a href="#">Chart Js</a></li>
                                <li><a href="#">Morris Charts</a></li>
                                <li><a href="#">Flot Charts</a></li>
                                <li><a href="#">Peity Charts</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Icons</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Fontawesome Icons</a></li>
                                <li><a href="#">Feather Icons</a></li>
                                <li><a href="#">Ionic Icons</a></li>
                                <li><a href="#">Material Icons</a></li>
                                <li><a href="#">Pe7 Icons</a></li>
                                <li><a href="#">Simpleline Icons</a></li>
                                <li><a href="#">Themify Icons</a></li>
                                <li><a href="#">Weather Icons</a></li>
                                <li><a href="#">Typicon Icons</a></li>
                                <li><a href="#">Flag Icons</a></li>
                                <li><a href="#">Tabler Icons</a></li>
                                <li><a href="#">Bootstrap Icons</a></li>
                                <li><a href="#">Remix Icons</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span> Forms</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu submenu-two">
                                    <a href="javascript:void(0);"><span>Form Elements</span><span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Basic Inputs</a></li>
                                        <li><a href="#">Checkbox & Radios</a></li>
                                        <li><a href="#">Input Groups</a></li>
                                        <li><a href="#">Grid & Gutters</a></li>
                                        <li><a href="#">Form Select</a></li>
                                        <li><a href="#">Input Masks</a></li>
                                        <li><a href="#">File Uploads</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two">
                                    <a href="javascript:void(0);"><span> Layouts</span><span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Horizontal Form</a></li>
                                        <li><a href="#">Vertical Form</a></li>
                                        <li><a href="#">Floating Labels</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Form Validation</a></li>
                                <li><a href="#">Select2</a></li>
                                <li><a href="#">Form Wizard</a></li>
                                <li><a href="#">Form Picker</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Tables</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Basic Tables </a></li>
                                <li><a href="#">Data Table </a></li>
                            </ul>
                        </li>
                        <li  class="submenu">
                            <a href="javascript:void(0);"><span>Maps</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Vector</a></li>
                                <li><a href="#">Leaflet</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="ti ti-page-break fs-16 me-2"></i><span>Pages</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#"><span>Profile</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Authentication</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Cover</a></li>
                                        <li><a href="#">Illustration</a></li>
                                        <li><a href="#">Basic</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Cover</a></li>
                                        <li><a href="#">Illustration</a></li>
                                        <li><a href="#">Basic</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot Password<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Cover</a></li>
                                        <li><a href="#">Illustration</a></li>
                                        <li><a href="#">Basic</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Reset Password<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Cover</a></li>
                                        <li><a href="#">Illustration</a></li>
                                        <li><a href="#">Basic</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Email Verification<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Cover</a></li>
                                        <li><a href="#">Illustration</a></li>
                                        <li><a href="#">Basic</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step Verification<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Cover</a></li>
                                        <li><a href="#">Illustration</a></li>
                                        <li><a href="#">Basic</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Lock Screen</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Error</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">404 Error </a></li>
                                <li><a href="#">500 Error </a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span>Blank Page</span> </a></li>
                        <li><a href="#"><span>Pricing</span> </a></li>
                        <li><a href="#"><span>Coming Soon</span> </a></li>
                        <li><a href="#"><span>Under Maintenance</span> </a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Content</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Pages</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="#">Pages</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Blog</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="#">All Blog</a></li>
                                        <li><a href="#">Blog Tags</a></li>
                                        <li><a href="#">Categories</a></li>
                                        <li><a href="#">Blog Comments</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Location</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="#">Countries</a></li>
                                        <li><a href="#">States</a></li>
                                        <li><a href="#">Cities</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><span>Testimonials</span></a></li>
                                <li><a href="#"><span>FAQ</span></a></li>

                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Employees</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#"><span>Employees</span></a></li>
                                <li><a href="#"><span>Departments</span></a></li>
                                <li><a href="#"><span>Designation</span></a></li>
                                <li><a href="#"><span>Shifts</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Attendence</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Employee Attendence</a></li>
                                <li><a href="#">Admin Attendence</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Leaves &amp; Holidays</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Admin Leaves</a></li>
                                <li><a href="#">Employee Leaves</a></li>
                                <li><a href="#">Leave Types</a></li>
                                <li><a href="#"><span>Holidays</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><span>Payroll</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Employee Salary</a></li>
                                <li><a href="#">Payslip</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="ti ti-chart-bar fs-16 me-2"></i><span>Reports</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Sales Report</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Sales Report</a></li>
                                <li><a href="#">Best Seller</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span>Purchase report</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Inventory Report</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Inventory Report</a></li>
                                <li><a href="#">Stock History</a></li>
                                <li><a href="#">Sold Stock</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span>Invoice Report</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Supplier Report</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Supplier Report</a></li>
                                <li><a href="#">Supplier Due Report</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Customer Report</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Customer Report</a></li>
                                <li><a href="#">Customer Due Report</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Product Report</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Product Report</a></li>
                                <li><a href="#">Product Expiry Report</a></li>
                                <li><a href="#">Product Quantity Alert</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span>Expense Report</span></a></li>
                        <li><a href="#"><span>Income Report</span></a></li>
                        <li><a href="#"><span>Tax Report</span></a></li>
                        <li><a href="#"><span>Profit & Loss</span></a></li>
                        <li><a href="#"><span>Annual Report</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="ti ti-settings fs-16 me-2"></i><span>Settings</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>General Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Security</a></li>
                                <li><a href="#">Notifications</a></li>
                                <li><a href="#">Connected Apps</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Website Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">System Settings</a></li>
                                <li><a href="#">Company Settings </a></li>
                                <li><a href="#">Localization</a></li>
                                <li><a href="#">Prefixes</a></li>
                                <li><a href="#">Preference</a></li>
                                <li><a href="#">Appearance</a></li>
                                <li><a href="#">Social Authentication</a></li>
                                <li><a href="#">Language</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>App Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Invoice<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Invoice Settings</a></li>
                                        <li><a href="#">Invoice Template</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Printer</a></li>
                                <li><a href="#">POS</a></li>
                                <li><a href="#">Custom Fields</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>System Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Email<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">Email Settings</a></li>
                                        <li><a href="#">Email Template</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">SMS<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="#">SMS Settings</a></li>
                                        <li><a href="#">SMS Template</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">OTP</a></li>
                                <li><a href="#">GDPR Cookies</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Financial Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Payment Gateway</a></li>
                                <li><a href="#">Bank Accounts</a></li>
                                <li><a href="#">Tax Rates</a></li>
                                <li><a href="#">Currencies</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Other Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="#">Storage</a></li>
                                <li><a href="#">Ban IP Address</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Logout</span> </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Horizontal Sidebar -->

<!-- Two Col Sidebar -->
<div class="two-col-sidebar d-none" id="two-col-sidebar">
    <div class="sidebar sidebar-twocol">
        <div class="twocol-mini">
            <div class="sidebar-left slimscroll">
                <div class="nav flex-column align-items-center nav-pills" id="sidebar-tabs" role="tablist"
                     aria-orientation="vertical">
                    <a href="#" class="nav-link active" title="Dashboard" data-bs-toggle="tab" data-bs-target="#dashboard">
                        <i class="ti ti-smart-home"></i>
                    </a>
                    <a href="#" class="nav-link " title="Super Admin" data-bs-toggle="tab" data-bs-target="#super-admin">
                        <i class="ti ti-user-star"></i>
                    </a>
                    <a href="#" class="nav-link " title="Apps" data-bs-toggle="tab" data-bs-target="#application">
                        <i class="ti ti-layout-grid-add"></i>
                    </a>
                    <a href="#" class="nav-link" title="Layout" data-bs-toggle="tab" data-bs-target="#layout">
                        <i class="ti ti-layout-board-split"></i>
                    </a>
                    <a href="#" class="nav-link" title="Inventory" data-bs-toggle="tab" data-bs-target="#inventory">
                        <i class="ti ti-table-plus"></i>
                    </a>
                    <a href="#" class="nav-link" title="Stock" data-bs-toggle="tab" data-bs-target="#stock">
                        <i class="ti ti-stack-3"></i>
                    </a>
                    <a href="#" class="nav-link" title="Sales" data-bs-toggle="tab" data-bs-target="#sales">
                        <i class="ti ti-device-laptop"></i>
                    </a>
                    <a href="#" class="nav-link" title="Finance" data-bs-toggle="tab" data-bs-target="#finance">
                        <i class="ti ti-shopping-cart-dollar"></i>
                    </a>
                    <a href="#" class="nav-link" title="Hrm" data-bs-toggle="tab" data-bs-target="#hrm">
                        <i class="ti ti-cash"></i>
                    </a>
                    <a href="#" class="nav-link" title="Reports" data-bs-toggle="tab" data-bs-target="#reports">
                        <i class="ti ti-license"></i>
                    </a>
                    <a href="#" class="nav-link" title="Pages" data-bs-toggle="tab" data-bs-target="#pages">
                        <i class="ti ti-page-break"></i>
                    </a>
                    <a href="#" class="nav-link" title="Settings" data-bs-toggle="tab" data-bs-target="#settings">
                        <i class="ti ti-lock-check"></i>
                    </a>
                    <a href="#" class="nav-link " title="UI Elements" data-bs-toggle="tab" data-bs-target="#ui-elements">
                        <i class="ti ti-ux-circle"></i>
                    </a>
                    <a href="#" class="nav-link" title="Extras" data-bs-toggle="tab" data-bs-target="#extras">
                        <i class="ti ti-vector-triangle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="sidebar-right">
            <!-- Logo -->
            <div class="sidebar-logo">
                <a href="#" class="logo logo-normal">
                    <img src="{{ asset('assets/img/logo.svg') }}" alt="Img">
                </a>
                <a href="#" class="logo logo-white">
                    <img src="{{ asset('assets/img/logo-white.svg') }}" alt="Img">
                </a>
                <a href="#" class="logo-small">
                    <img src="{{ asset('assets/img/logo-small.png') }}" alt="Img">
                </a>
            </div>
            <!-- /Logo -->
            <div class="sidebar-scroll">
                <div class="text-center rounded bg-light p-3 mb-3 border">
                    <div class="avatar avatar-lg online mb-3">
                        <img src="{{ asset('assets/img/customer/customer15.jpg') }}" alt="Img" class="img-fluid rounded-circle">
                    </div>
                    <h6 class="fs-14 fw-bold mb-1">Adrian Herman</h6>
                    <p class="fs-12 mb-0">System Admin</p>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="dashboard">
                        <ul>
                            <li class="menu-title"><span>MAIN</span></li>
                            <li><a href="#" class="active">Admin Dashboard</a></li>
                            <li><a href="#">Admin Dashboard 2</a></li>
                            <li><a href="#">Sales Dashboard</a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="super-admin">
                        <ul>
                            <li class="menu-title"><span>SUPER ADMIN</span></li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Companies</a></li>
                            <li><a href="#">Subscriptions</a></li>
                            <li><a href="#">Packages</a></li>
                            <li><a href="#">Domain</a></li>
                            <li><a href="#">Purchase Transaction</a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="application">
                        <ul>
                            <li><a href="#">Chat</a></li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Call<span class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="#">Video Call</a></li>
                                    <li><a href="#">Audio Call</a></li>
                                    <li><a href="#">Call History</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Calendar</a></li>
                            <li><a href="#">Contacts</a></li>
                            <li><a href="#">Email</a></li>
                            <li><a href="#">To Do</a></li>
                            <li><a href="#">Notes</a></li>
                            <li><a href="#">File Manager</a></li>
                            <li><a href="#">Projects</a></li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Ecommerce<span class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="#">Products</a></li>
                                    <li><a href="#">Orders</a></li>
                                    <li><a href="#">Customers</a></li>
                                    <li><a href="#">Cart</a></li>
                                    <li><a href="#">Checkout</a></li>
                                    <li><a href="#">Wishlist</a></li>
                                    <li><a href="#">Reviews</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Social Feed</a></li>
                            <li><a href="#">Search List</a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="layout">
                        <ul>
                            <li class="menu-title"><span>LAYOUT</span></li>
                            <li><a href="#">Horizontal</a></li>
                            <li><a href="#">Detached</a></li>
                            <li><a href="#">Two Column</a></li>
                            <li><a href="#">Hovered</a></li>
                            <li><a href="#">Boxed</a></li>
                            <li><a href="#">RTL</a></li>
                            <li><a href="#">Dark</a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="inventory">
                        <ul>
                            <li class="menu-title"><span>Inventory</span></li>
                            <li><a href="#"><span>Products</span></a></li>
                            <li><a href="#"><span>Create Product</span></a></li>
                            <li><a href="#"><span>Expired Products</span></a></li>
                            <li><a href="#"><span>Low Stocks</span></a></li>
                            <li><a href="#"><span>Category</span></a></li>
                            <li><a href="#"><span>Sub Category</span></a></li>
                            <li><a href="#"><span>Brands</span></a></li>
                            <li><a href="#"><span>Units</span></a></li>
                            <li><a href="#"><span>Variant Attributes</span></a></li>
                            <li><a href="#"><span>Warranties</span></a></li>
                            <li><a href="#"><span>Print Barcode</span></a></li>
                            <li><a href="#"><span>Print QR Code</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="stock">
                        <ul>
                            <li class="menu-title"><span>Stock</span></li>
                            <li><a href="#"><span>Manage Stock</span></a></li>
                            <li><a href="#"><span>Stock Adjustment</span></a></li>
                            <li><a href="#"><span>Stock Transfer</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="sales">
                        <ul>
                            <li class="menu-title"><span>Sales</span></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Sales</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Online Orders</a></li>
                                    <li><a href="#">POS Orders</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span>Invoices</span></a></li>
                            <li><a href="#"><span>Sales Return</span></a></li>
                            <li><a href="#"><span>Quotation</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>POS</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">POS 1</a></li>
                                    <li><a href="#">POS 2</a></li>
                                    <li><a href="#">POS 3</a></li>
                                    <li><a href="#">POS 4</a></li>
                                    <li><a href="#">POS 5</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="finance">
                        <ul>
                            <li class="menu-title"><span>FINANCE & ACCOUNTS</span></li>
                            <li><a href="#"><span>Coupons</span></a></li>
                            <li><a href="#"><span>Gift Cards</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Discount</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Discount Plan</a></li>
                                    <li><a href="#">Discount</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span>Purchases</span></a></li>
                            <li><a href="#"><span>Purchase Order</span></a></li>
                            <li><a href="#"><span>Purchase Return</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Expenses</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Expenses</a></li>
                                    <li><a href="#">Expense Category</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Income</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Income</a></li>
                                    <li><a href="#">Income Category</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span>Bank Accounts</span></a></li>
                            <li><a href="#"><span>Money Transfer</span></a></li>
                            <li><a href="#"><span>Balance Sheet</span></a></li>
                            <li><a href="#"><span>Trial Balance</span></a></li>
                            <li><a href="#"><span>Cash Flow</span></a></li>
                            <li><a href="#"><span>Account Statement</span></a></li>
                            <li><a href="#"><span>Customers</span></a></li>
                            <li><a href="#"><span>Billers</span></a></li>
                            <li><a href="#"><span>Suppliers</span></a></li>
                            <li><a href="#"><span>Stores</span></a></li>
                            <li><a href="#"><span>Warehouses</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="hrm">
                        <ul>
                            <li class="menu-title"><span>Hrm</span></li>
                            <li><a href="#"><span>Employees</span></a></li>
                            <li><a href="#"><span>Departments</span></a></li>
                            <li><a href="#"><span>Designation</span></a></li>
                            <li><a href="#"><span>Shifts</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Attendence</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Employee</a></li>
                                    <li><a href="#">Admin</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Leaves</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Admin Leaves</a></li>
                                    <li><a href="#">Employee Leaves</a></li>
                                    <li><a href="#">Leave Types</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span>Holidays</span></a>
                            </li>
                            <li class="submenu">
                                <a href="#"><span>Payroll</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Employee Salary</a></li>
                                    <li><a href="#">Payslip</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="reports">
                        <ul>
                            <li class="menu-title"><span>Reports</span></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Sales Report</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Sales Report</a></li>
                                    <li><a href="#">Best Seller</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span>Purchase report</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Inventory Report</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Inventory Report</a></li>
                                    <li><a href="#">Stock History</a></li>
                                    <li><a href="#">Sold Stock</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span>Invoice Report</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Supplier Report</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Supplier Report</a></li>
                                    <li><a href="#">Supplier Due Report</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Customer Report</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Customer Report</a></li>
                                    <li><a href="#">Customer Due Report</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Product Report</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Product Report</a></li>
                                    <li><a href="#">Product Expiry Report</a></li>
                                    <li><a href="#">Product Quantity Alert</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span>Expense Report</span></a></li>
                            <li><a href="#"><span>Income Report</span></a></li>
                            <li><a href="#"><span>Tax Report</span></a></li>
                            <li><a href="#"><span>Profit & Loss</span></a></li>
                            <li><a href="#"><span>Annual Report</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="pages">
                        <ul>
                            <li class="menu-title"><span>Pages</span></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Pages</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Pages</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Blog</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">All Blog</a></li>
                                    <li><a href="#">Blog Tags</a></li>
                                    <li><a href="#">Categories</a></li>
                                    <li><a href="#">Blog Comments</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Location</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Countries</a></li>
                                    <li><a href="#">States</a></li>
                                    <li><a href="#">Cities</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span>Testimonials</span></a></li>
                            <li><a href="#"><span>FAQ</span></a></li>
                            <li><a href="#"><span>Users</span></a></li>
                            <li><a href="#"><span>Roles & Permissions</span></a></li>
                            <li><a href="#"><span>Delete Account Request</span></a></li>
                            <li><a href="#"><span>Profile</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Authentication</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="#">Cover</a></li>
                                            <li><a href="#">Illustration</a></li>
                                            <li><a href="#">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="#">Cover</a></li>
                                            <li><a href="#">Illustration</a></li>
                                            <li><a href="#">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot Password<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="#">Cover</a></li>
                                            <li><a href="#">Illustration</a></li>
                                            <li><a href="#">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Reset Password<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="#">Cover</a></li>
                                            <li><a href="#">Illustration</a></li>
                                            <li><a href="#">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Email Verification<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="#">Cover</a></li>
                                            <li><a href="#">Illustration</a></li>
                                            <li><a href="#">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step Verification<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="#">Cover</a></li>
                                            <li><a href="#">Illustration</a></li>
                                            <li><a href="#">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Lock Screen</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Error Pages</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">404 Error </a></li>
                                    <li><a href="#">500 Error </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span>Blank Page</span> </a>
                            </li>
                            <li>
                                <a href="#"><span>Pricing</span> </a>
                            </li>
                            <li>
                                <a href="#"><span>Coming Soon</span> </a>
                            </li>
                            <li>
                                <a href="#"><span>Under Maintenance</span> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="settings">
                        <ul>
                            <li class="menu-title"><span>Settings</span></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>General Settings</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Security</a></li>
                                    <li><a href="#">Notifications</a></li>
                                    <li><a href="#">Connected Apps</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Website Settings</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">System Settings</a></li>
                                    <li><a href="#">Company Settings </a></li>
                                    <li><a href="#">Localization</a></li>
                                    <li><a href="#">Prefixes</a></li>
                                    <li><a href="#">Preference</a></li>
                                    <li><a href="#">Appearance</a></li>
                                    <li><a href="#">Social Authentication</a></li>
                                    <li><a href="#">Language</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>App Settings</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Invoice<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="#">Invoice Settings</a></li>
                                            <li><a href="#">Invoice Template</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Printer</a></li>
                                    <li><a href="#">POS</a></li>
                                    <li><a href="#">Custom Fields</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>System Settings</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Email<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="#">Email Settings</a></li>
                                            <li><a href="#">Email Template</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">SMS<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="#">SMS Settings</a></li>
                                            <li><a href="#">SMS Template</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">OTP</a></li>
                                    <li><a href="#">GDPR Cookies</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>Financial Settings</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="#">Payment Gateway</a></li>
                                    <li><a href="#">Bank Accounts</a></li>
                                    <li><a href="#">Tax Rates</a></li>
                                    <li><a href="#">Currencies</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>Other Settings</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="#">Storage</a></li>
                                    <li><a href="#">Ban IP Address</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span>Logout</span> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="ui-elements">
                        <ul>
                            <li class="menu-title"><span>Ui Interface</span></li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>Base UI</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="#">Alerts</a></li>
                                    <li><a href="#">Accordion</a></li>
                                    <li><a href="#">Avatar</a></li>
                                    <li><a href="#">Badges</a></li>
                                    <li><a href="#">Border</a></li>
                                    <li><a href="#">Buttons</a></li>
                                    <li><a href="#">Button Group</a></li>
                                    <li><a href="#">Breadcrumb</a></li>
                                    <li><a href="#">Card</a></li>
                                    <li><a href="#">Carousel</a></li>
                                    <li><a href="#">Colors</a></li>
                                    <li><a href="#">Dropdowns</a></li>
                                    <li><a href="#">Grid</a></li>
                                    <li><a href="#">Images</a></li>
                                    <li><a href="#">Lightbox</a></li>
                                    <li><a href="#">Media</a></li>
                                    <li><a href="#">Modals</a></li>
                                    <li><a href="#">Offcanvas</a></li>
                                    <li><a href="#">Pagination</a></li>
                                    <li><a href="#">Popovers</a></li>
                                    <li><a href="#">Progress</a></li>
                                    <li><a href="#">Placeholders</a></li>
                                    <li><a href="#">Range Slider</a></li>
                                    <li><a href="#">Spinner</a></li>
                                    <li><a href="#">Sweet Alerts</a></li>
                                    <li><a href="#">Tabs</a></li>
                                    <li><a href="#">Toasts</a></li>
                                    <li><a href="#">Tooltips</a></li>
                                    <li><a href="#">Typography</a></li>
                                    <li><a href="#">Video</a></li>
                                    <li><a href="#">Sortable</a></li>
                                    <li><a href="#">Swiperjs</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>Advanced UI</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="#">Ribbon</a></li>
                                    <li><a href="#">Clipboard</a></li>
                                    <li><a href="#">Drag & Drop</a></li>
                                    <li><a href="#">Range Slider</a></li>
                                    <li><a href="#">Rating</a></li>
                                    <li><a href="#">Text Editor</a></li>
                                    <li><a href="#">Counter</a></li>
                                    <li><a href="#">Scrollbar</a></li>
                                    <li><a href="#">Sticky Note</a></li>
                                    <li><a href="#">Timeline</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>Charts</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="#">Apex Charts</a></li>
                                    <li><a href="#">Chart C3</a></li>
                                    <li><a href="#">Chart Js</a></li>
                                    <li><a href="#">Morris Charts</a></li>
                                    <li><a href="#">Flot Charts</a></li>
                                    <li><a href="#">Peity Charts</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>Icons</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="#">Fontawesome Icons</a></li>
                                    <li><a href="#">Feather Icons</a></li>
                                    <li><a href="#">Ionic Icons</a></li>
                                    <li><a href="#">Material Icons</a></li>
                                    <li><a href="#">Pe7 Icons</a></li>
                                    <li><a href="#">Simpleline Icons</a></li>
                                    <li><a href="#">Themify Icons</a></li>
                                    <li><a href="#">Weather Icons</a></li>
                                    <li><a href="#">Typicon Icons</a></li>
                                    <li><a href="#">Flag Icons</a></li>
                                    <li><a href="#">Tabler Icons</a></li>
                                    <li><a href="#">Bootstrap Icons</a></li>
                                    <li><a href="#">Remix Icons</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>Forms</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li class="submenu submenu-two">
                                        <a href="javascript:void(0);">Form Elements<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="#">Basic Inputs</a></li>
                                            <li><a href="#">Checkbox & Radios</a></li>
                                            <li><a href="#">Input Groups</a></li>
                                            <li><a href="#">Grid & Gutters</a></li>
                                            <li><a href="#">Form Select</a></li>
                                            <li><a href="#">Input Masks</a></li>
                                            <li><a href="#">File Uploads</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two">
                                        <a href="javascript:void(0);">Layouts<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="#">Horizontal Form</a></li>
                                            <li><a href="#">Vertical Form</a></li>
                                            <li><a href="#">Floating Labels</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Form Validation</a></li>
                                    <li><a href="#">Select2</a></li>
                                    <li><a href="#">Form Wizard</a></li>
                                    <li><a href="#">Form Picker</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Tables</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Basic Tables </a></li>
                                    <li><a href="#">Data Table </a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Maps</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="#">Vector</a></li>
                                    <li><a href="#">Leaflet</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="extras">
                        <ul>
                            <li class="menu-title"><span>Help</span></li>
                            <li><a href="javascript:void(0);"><span>Documentation</span></a></li>
                            <li><a href="javascript:void(0);"><span>Changelog v2.0.9</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Multi Level</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="javascript:void(0);">Level 1.1</a></li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Level 1.2<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="javascript:void(0);">Level 2.1</a></li>
                                            <li class="submenu submenu-two submenu-three"><a href="javascript:void(0);">Level 2.2<span class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                                <ul>
                                                    <li><a href="javascript:void(0);">Level 3.1</a></li>
                                                    <li><a href="javascript:void(0);">Level 3.2</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Two Col Sidebar -->
