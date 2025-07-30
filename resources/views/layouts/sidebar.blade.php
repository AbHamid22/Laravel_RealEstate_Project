<!-- Font Awesome 5 CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<style>
    aside.left-panel {
        background-color: lightcyan;
    }

    .navbar {
        background-color: lightcyan;
    }

   
</style>

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-home"></i>Dashboard
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-home"></i><a href="{{url('/home')}}">Home</a></li>
                        <li><i class="fa fa-line-chart"></i><a href="{{url('progresses')}}">Reports</a></li>
                    </ul>
                </li>


                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-cart-plus "></i>Purchase Product
                    </a>
                    <ul class="sub-menu children dropdown-menu">

                        <li><i class="fa fa-plus-square"></i><a href="{{url('purchases/create')}}">New Purchase</a></li>
                        <li><i class="fa fa-box-open"></i><a href="{{url('purchases')}}">Manage Purchase</a></li>
                        <li><i class="fa fa-cash-register"></i><a href="{{url('purchasedetails')}}">Purchase Details</a></li>
                        <li><i class="fa fa-boxes"></i><a href="{{url('products')}}">Product Details</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-store "></i>Stock Raw Material
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <!-- <li><i class="fa fa-plus-square"></i><a href="{{url('stocks/create')}}">New Stock</a></li> -->
                        <li><i class="fa fa-cubes"></i><a href="{{url('stocks')}}">Manage Stock</a></li>
                        <li><i class="fa fa-boxes"></i><a href="{{url('stocktranspers/create')}}">Stock Transfer</a></li>
                        <li><i class="fa fa-coins"></i><a href="{{url('stocktransperdetails')}}">S.Transper Details</a></li>
                        <li><i class="fa fa-cash-register"></i><a href="{{url('stock-issue/create')}}">Stock Issue Create</a></li>
                        <li><i class="fa fa-comments"></i><a href="{{url('stock-issue/manage')}}">Stock Issue Show</a></li>
                        <li><i class="fa fa-chart-line"></i><a href="{{url('balances')}}">Balance Stock</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-tasks"></i>Projects Management
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="{{url('projects')}}">All Projects</a></li>
                        <li><i class="fa fa-plus-square"></i><a href="{{url('projects/create')}}">Add New Project</a></li>

                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-chart-bar"></i>Project Progressive
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-line-chart"></i><a href="{{url('progresses')}}">Project Reports</a></li>
                        <li><i class="fa fa-plus-circle"></i><a href="{{url('progresses/create')}}">+Progressive</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-calculator"></i>Project Costing
                    </a>
                    <ul class="sub-menu children dropdown-menu">

                        <li><i class="fa fa-dollar-sign"></i><a href="{{url('projectcostings')}}">Project Costing</a></li>
                        <li><i class="fa fa-user-plus"></i><a href="{{url('projectcostings/create')}}">+New Costing</a></li>

                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-user"></i>Project Person
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-user"></i><a href="{{url('projectpersons')}}">All Person</a></li>
                        <li><i class="fa fa-user-plus"></i><a href="{{url('persons')}}">Persons Details</a></li>
                        <li><i class="fas fa-user-check"></i><a href="{{url('contractors')}}">Contractor Details</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-project-diagram"></i>Property
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list-ul"></i><a href="{{url('propertys')}}">All Property List</a></li>
                        <li><i class="fa fa-plus-circle"></i><a href="{{url('propertys/create')}}">Add New Property</a></li>
                        <li><i class="fa fa-tags"></i><a href="{{url('categorys')}}">Property Categories</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-users"></i>Customer
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-user"></i><a href="{{url('customers')}}">Customers list</a></li>
                        <li><i class="fa fa-user-plus"></i><a href="{{url('customers/create')}}">New Customers</a></li>
                        <!-- <li><i class="fa fa-user-clock"></i><a href="new-leads.html">New Leads</a></li>
                        <li><i class="fa fa-comments"></i><a href="contacted-leads.html">Contacted Leads</a></li>
                        <li><i class="fa fa-check-circle"></i><a href="converted-leads.html">Converted Leads</a></li> -->
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-file-invoice-dollar"></i>Invoice Management
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-money-bill-wave"></i><a href="{{url('invoices/create')}}">Create Invoice</a></li>
                        <li><i class="fa fa-file-alt"></i><a href="{{url('invoices')}}">Manage Invoice</a></li>
                        <li><i class="fa fa-receipt"></i><a href="{{url('invoicedetails')}}"> Invoice Details</a></li>

                        <!-- <li><i class="fa fa-plus-square"></i><a href="{{url('orders/create')}}">Create Order</a></li>
                        <li><i class="fa fa-box"></i><a href="{{url('orders')}}">Manage Order</a></li>
                        <li><i class="fas fa-check-circle"></i><a href="{{url('orderdetails')}}">Order Details</a></li> -->
                    </ul>
                </li>


                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-receipt"></i>MR Management
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-money-bill"></i><a href="{{url('moneyreceipts/create')}}">Create MoneyReceipt</a></li>
                        <li><i class="fa fa-file-alt"></i><a href="{{url('moneyreceipts')}}">Manage MR</a></li>
                        <li><i class="fa fa-receipt"></i><a href="{{url('moneyreceiptdetails')}}"> Mr Details</a></li>
                    </ul>
                </li>

                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="menu-icon fa fa-sign-out-alt"></i>Logout
                    </a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>