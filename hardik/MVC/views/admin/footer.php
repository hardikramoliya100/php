<!--footer-->
<div class="footer">
    <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/"
            target="_blank">w3layouts</a></p>
</div>
<!--//footer-->
</div>
<!-- for toggle left push menu script -->
<script src="<?php echo $this->base_url_asset;?>/admin/js/classie.js"></script>
<script>
var menuLeft = document.getElementById('cbp-spmenu-s1'),
    showLeftPush = document.getElementById('showLeftPush'),
    body = document.body;

showLeftPush.onclick = function () {
    classie.toggle(this, 'active');
    classie.toggle(body, 'cbp-spmenu-push-toright');
    classie.toggle(menuLeft, 'cbp-spmenu-open');
    disableOther('showLeftPush');
};
function disableOther(button) {
    if (button !== 'showLeftPush') {
        classie.toggle(showLeftPush, 'disabled');
    }
}
</script>
<script src="<?php echo $this->base_url_asset;?>/admin/js/jquery.nicescroll.js"></script>
<script src="<?php echo $this->base_url_asset;?>/admin/js/scripts.js"></script>
<script src='<?php echo $this->base_url_asset;?>/admin/js/SidebarNav.min.js' type='text/javascript'></script>
<script>
$('.sidebar-menu').SidebarNav()
</script>
<script src="<?php echo $this->base_url_asset;?>/admin/js/bootstrap.js"> </script>
</body>
</html>