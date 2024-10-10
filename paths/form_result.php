<?php $args = $args; ?>
<form id="form-filter" action="<?php echo getTplPageURL("facility-archive.php"); ?>" method="GET"
    class="company_result__form">
    <input type="hidden" name="occupation"
        value="<?php echo isset($_REQUEST['occupation']) ? $_REQUEST['occupation'] : '' ?>" />
    <input type="hidden" name="keyword" value="<?php echo isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '' ?>" />
    <input type="hidden" name="location"
        value="<?php echo isset($_REQUEST['location']) ? $_REQUEST['location'] : '' ?><?php echo isset($args['location']) ? $args['location'] : $location; ?>" />
    <input type="hidden" name="specific_skill"
        value="<?php echo isset($_REQUEST['specific_skill']) ? $_REQUEST['specific_skill'] : '' ?>" />
    <div class="company_result">
        <div class="company_result__count">
            検索結果 <span>
                <?php echo $args['postItems']->found_posts; ?>
            </span> 件
        </div>
        <?php
        $params = array(
            'occupation' => isset($args['params']['occupation']) ? $args['params']['occupation'] : '',
            'keyword' => isset($args['params']['keyword']) ? $args['params']['keyword'] : '',
            'location' => isset($args['params']['location']) ? $args['params']['location'] : $location,
            'specific_skill' => isset($args['params']['specific_skill']) ? $args['params']['specific_skill'] : '',
            'order' => isset($args['params']['order']) ? $args['params']['order'] : '',
            'region' => isset($args['params']['region']) ? $args['params']['region'] : $region
        );
        $url_search = http_build_query($params);
        ?>
        <div
            class="company_result__select <?php echo isset($_REQUEST['order']) && $_REQUEST['order'] != "" ? 'selected' : '' ?>">
            <select name="order" id="order">
                <option value="">並び替え</option>
                <option value="time-desc" <?php echo isset($_REQUEST['order']) && $_REQUEST['order'] == 'time-desc' ? 'selected' : '' ?>>更新の新しい順</option>
                <option value="time-asc" <?php echo isset($_REQUEST['order']) && $_REQUEST['order'] == 'time-asc' ? 'selected' : '' ?>>更新の古い順</option>
                <option value="name-asc" <?php echo isset($_REQUEST['order']) && $_REQUEST['order'] == 'name-asc' ? 'selected' : '' ?>>名前順 (A-Z)</option>
                <option value="name-desc" <?php echo isset($_REQUEST['order']) && $_REQUEST['order'] == 'name-desc' ? 'selected' : '' ?>>名前順 (Z-A)</option>

            </select>
        </div>


    </div>
</form>
<script>
    var delayTime;
    document.getElementById("order").addEventListener("change", function () {
        var selectedValue = this.value;
        var orderCheckboxes = document.getElementsByName("order[]");
        for (var i = 0; i < orderCheckboxes.length; i++) {
            orderCheckboxes[i].checked = false;
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