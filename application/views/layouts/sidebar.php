<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">TOPSIS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard-ecommerce.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Transaction</li>
            <li <?php if ($this->uri->segment(1) == "priority") {
                    echo 'class="active"';
                } ?>><a class="nav-link" href="<?php echo base_url('priority'); ?>"> <span class="ml-3">Prioritas Order</span></a></li>
            <li <?php if ($this->uri->segment(1) == "calculate") {
                    echo 'class="active"';
                } ?>><a class="nav-link" href="<?php echo base_url('calculate'); ?>"> <span class="ml-3">Perhitungan</span></a></li>

            <li class="menu-header">Master</li>
            <li <?php if ($this->uri->segment(1) == "criteria") {
                    echo 'class="active"';
                } ?>><a class="nav-link" href="<?php echo base_url('criteria'); ?>"> <span class="ml-3">Kriteria</span></a></li>
            <li <?php if ($this->uri->segment(1) == "product") {
                    echo 'class="active"';
                } ?>><a class="nav-link" href="<?php echo base_url('product'); ?>"> <span class="ml-3">Barang</span></a></li>
            <li <?php if ($this->uri->segment(1) == "user") {
                    echo 'class="active"';
                } ?>><a class="nav-link" href="<?php echo base_url('user'); ?>"> <span class="ml-3">User</span></a></li>
        </ul>
    </aside>
</div>