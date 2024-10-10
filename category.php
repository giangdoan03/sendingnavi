<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/module-t/css/company.css">
<main>
    <?php get_template_part("paths/breacrumb"); ?>
    <div id="company_archive">
        <div class="container">
            <h1 class="page_title">
                <svg xmlns="http://www.w3.org/2000/svg" width="18.686" height="40.291" viewBox="0 0 18.686 40.291">
                    <g id="Group_243" data-name="Group 243" transform="translate(0)">
                        <path id="Path_212" data-name="Path 212" d="M0,0,11.679,19.077h7.007L7.007,0Z"
                            transform="translate(0)" fill="#f54d4d" />
                        <path id="Path_213" data-name="Path 213" d="M11.678,51.5,0,70.577H7.007L18.686,51.5Z"
                            transform="translate(0 -30.286)" fill="#3dce97" />
                    </g>
                </svg>
                <?php echo get_queried_object()->name; ?>
            </h1>
            <form id="form-filter" action="<?php echo get_term_link(get_queried_object()->term_id); ?>" method="GET"
                class="company_result__form">
                <div class="company_result">
                    <div class="company_result__count">
                        検索結果 <span>
                            <?php echo get_queried_object()->count; ?>
                        </span> 件
                    </div>
                    <button type="submit" class="company_result__btn">
                        条件を変更する
                    </button>
                    <select name="order" id="order" class="company_result__select">
            <option value="並べ替え条件" disabled selected>並べ替え条件</option>
            <option value="time-desc">更新の新しい順</option>
            <option value="time-asc">更新の古い順</option>
            <option value="name-asc">名前順 (A-Z)</option>
            <option value="name-desc">名前順 (Z-A)</option>

          </select>
                </div>
            </form>
            <script>
                var delayTime;
                document.getElementById("occupation").addEventListener("change", function () {
                    var selectedValue = this.value;
                    var occupationCheckboxes = document.getElementsByName("occupation[]");
                    for (var i = 0; i < occupationCheckboxes.length; i++) {
                        occupationCheckboxes[i].checked = false;
                    }
                    var selectedCheckbox = document.querySelector('[value="' + selectedValue + '"]');
                    if (selectedCheckbox) {
                        selectedCheckbox.checked = true;
                    }
                    var allOptions = this.querySelectorAll("option");
                    for (var j = 0; j < allOptions.length; j++) {
                        allOptions[j].classList.remove("active");
                    }
                    var selectedOption = this.querySelector('[value="' + selectedValue + '"]');
                    if (selectedOption) {
                        selectedOption.classList.add("active");
                    }
                    clearTimeout(delayTime);
                    delayTime = setTimeout(function () {
                        document.getElementById("form-filter").submit();
                    }, 1000);
                });

            </script>
            <?php
            global $post;
            if (have_posts()): ?>
                <div class="company_items">
                    <?php while (have_posts()):
                        the_post(); ?>
                        <?php get_template_part("paths/company_item",null,['post'=>$post]); ?>
                    <?php endwhile; ?>
                </div>
                <?php cpagination(); ?>
            <?php else: ?>
                <p class="no-result">ありませんでした</p>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>