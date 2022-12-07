<?php
    include("../funtions/funtions.php"); 
    include("../session.php");
    include("links/header.php");
?>
<div class="content_1">
        <div class="sidebar">
            <?php include("links/sidebar.php"); ?>
        </div>
        <div class="info_ac">
            <h3 class="info_title">Địa chỉ của tôi</h3>
            <div class="inner">
                <div class="new">
                    <a href="/customer/address/create">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                        </svg>
                        <span>Thêm địa chỉ mới</span>
                    </a>
                </div>
                <div class="item">
                    <div class="info">
                        <div class="name"><?=$full_name?>
                            <span>
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"></path>
                                </svg>
                                <span>Địa chỉ mặc định</span>
                            </span>
                        </div>
                        <div class="address">
                            <span>Địa chỉ: </span><?=$address?>
                        </div>
                        <div class="phone">
                            <span>Điện thoại: </span><?=$phone?>
                        </div>
                    </div>
                    <div class="action">
                        <a class="edit" href="/customer/address/edit/19053328">Chỉnh sửa</a>
                    </div>
                </div>
        </div>
    </div>
</div>

<script>
    window.onload = function(){
        $("#account").addClass("l-active");
    }
</script>
<?php include("links/footer.php");?>