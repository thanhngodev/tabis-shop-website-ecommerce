<aside class="sidebar">
	<div class="panel_head">
		<img src="../images/avt.png">
		<div class="info"> Tài khoản của <br><strong><?php echo $full_name; ?></strong></div>
	</div>
	<ul class="panel_body">
		<li class="<?php if(isset($_GET['my_account.php'])){ echo "is-active"; } ?>">
			<a href="./my_account.php">
				<svg fill="currentColor" viewBox="0 0 24 24" height="1em" width="1em">
					<path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
				</svg>
				<span>Thông tin tài khoản</span>
			</a>
		</li>
        <li class="<?php if(isset($_GET['notification.php'])){ echo "is-active"; } ?>">
            <a href="./notification.php">
                <svg fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em">
                    <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"></path>
                </svg>
                <span>Thông báo của tôi</span>
            </a>
        </li>
        <li class="<?php if(isset($_GET['order_manage.php'])){ echo "is-active"; } ?>">
            <a class="" href="./order_ manage.php">
                <svg fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em">
                    <path d="M13 12h7v1.5h-7zm0-2.5h7V11h-7zm0 5h7V16h-7zM21 4H3c-1.1 0-2 .9-2 2v13c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 15h-9V6h9v13z"></path>
                </svg>
                <span>Quản lý đơn hàng</span>
            </a>
        </li>
        <li class="<?php if(isset($_GET['address.php'])){ echo "is-active"; } ?>">
            <a class="" href="./address.php">
                <svg fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                </svg>
                <span>Sổ địa chỉ</span>
            </a>
        </li>
        <li class="<?php if(isset($_GET['save_for_later.php'])){ echo "is-active"; } ?>">
            <a href="./save_for_later.php" class="">
                <svg fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em">
                    <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"></path>
                </svg>
                <span>Sản phẩm đã mua</span>
            </a>
        </li>
        <li>
            <a href="./change_password.php" class="">
                <span>
                    <button style="border: 0px;background-color: unset;color: rgb(74,74,74);">
                        <i class="fas fa-exchange-alt" style="width: 24px;height: 24px;margin: 0px 15px 0px -5px;font-size: 18px;color: rgb(155,155,155);"></i> 
                        </button>
                </span>
                Thay đổi mật khẩu
            </a>
        </li>
	</ul>
</aside>