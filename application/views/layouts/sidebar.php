<?php if ($this->session->current->role_id == 1) { ?>
  <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
      <em class="fa fa-users">&nbsp;</em> User Maintenance <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
    </a>
    <ul class="children collapse" id="sub-item-1">
      <li><a class="" href="<?= base_url(); ?>users/create">
          <span class="fa fa-user-plus">&nbsp;</span> Create User
        </a></li>
      <li><a class="" href="<?= base_url(); ?>users">
          <span class="fa fa-table">&nbsp;</span> User List
        </a></li>
    </ul>
  </li>
<?php } ?>

<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
    <em class="fa fa-copy">&nbsp;</em> Sales Encoding <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
  </a>
  <ul class="children collapse" id="sub-item-2">
    <li><a class="" href="<?= base_url(); ?>sales/create">
        <span class="fa fa-edit">&nbsp;</span> Create Sale
      </a></li>
    <li><a class="" href="<?= base_url(); ?>sales">
        <span class="fa fa-table">&nbsp;</span> Sales List
      </a></li>
  </ul>
</li>
<?php if ($this->session->current->role_id == 1) { ?>
  <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
      <em class="fa fa-folder">&nbsp;</em> Reports <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
    </a>
    <ul class="children collapse" id="sub-item-3">
      <li><a class="" href="<?= base_url(); ?>reports/daily">
          <span class="fa fa-calendar">&nbsp;</span> Daily Report
        </a></li>
      <li><a class="" href="<?= base_url(); ?>reports/monthly">
          <span class="fa fa-calendar">&nbsp;</span> Monthly Report
        </a></li>
      <li><a class="" href="<?= base_url(); ?>reports/annual">
          <span class="fa fa-calendar">&nbsp;</span> Annual Report
        </a></li>
    </ul>
  </li>
<?php } ?>
<li class="parent "><a data-toggle="collapse" href="#sub-item-4">
    <em class="fa fa-cogs">&nbsp;</em> Account Settings <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
  </a>
  <ul class="children collapse" id="sub-item-4">
    <li><a class="" href="<?= base_url(); ?>users/profile">
        <span class="fa fa-calendar">&nbsp;</span> Edit Profile
      </a></li>
    <li><a class="" href="<?= base_url(); ?>users/change_password">
        <span class="fa fa-calendar">&nbsp;</span> Change Password
      </a></li>

  </ul>
</li>
<li><a href="<?= base_url(); ?>Logout" onclick="return confirm('You are about to Logout?')"> <em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
</ul>
</div>