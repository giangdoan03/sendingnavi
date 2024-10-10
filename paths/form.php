<?php $params = isset($args) ? $args : []; ?>
<form method="GET" action="<?php echo site_url() ?>/facility-archive" class="box_filter">
    <input value="<?php echo isset($_REQUEST['occupation']) ? $_REQUEST['occupation'] : '' ?>" type="hidden"
        name="occupation" id="occupation">
	<?php if(!isset($args['hide_title'])): ?>
    <p class="box_filter__title">
        <svg xmlns="http://www.w3.org/2000/svg" width="18.686" height="40.291" viewBox="0 0 18.686 40.291">
            <g id="Group_243" data-name="Group 243" transform="translate(0)">
                <path id="Path_212" data-name="Path 212" d="M0,0,11.679,19.077h7.007L7.007,0Z" transform="translate(0)"
                    fill="#f54d4d" />
                <path id="Path_213" data-name="Path 213" d="M11.678,51.5,0,70.577H7.007L18.686,51.5Z"
                    transform="translate(0 -30.286)" fill="#3dce97" />
            </g>
        </svg>
        <?php if (is_front_page()): ?>
            送出機関<br class="only_sp">探しはここから
        <?php else: ?>
            <span class="only_pc">送出機関を探す</span>
            <span class="only_sp">送出機関探しは<br class="only_sp">ここから</span>
        <?php endif; ?>
    </p>
	<?php endif; ?>
    <div class="box_filter__options">
        <div class="single">
            <div class="input">
                <label for="search_keywords">フリーワード検索</label>
                <input type="text"
                    value="<?php if (!empty($_REQUEST['keyword']))
                        echo esc_attr(stripslashes($_REQUEST['keyword'])); ?>"
                    name="keyword" id="keyword" placeholder="送出機関名、業種名などを入力してください">
            </div>
        </div>
        <div class="multi">
            <div class="input">
                <label for="region">国</label>
                <select name="region" id="region">
                    <?php
                    $regions = get_terms(
                        array(
                            'taxonomy' => 'location',
                            'parent' => 0,
                        )
                    );
                    ?>
                    <?php
                    $groupedRegions = [];
                    foreach ($regions as $region) {
                        $children = get_terms(
                            array(
                                'taxonomy' => 'location',
                                'hide_empty' => false,
                                'parent' => $region->term_id,
								'orderby' => 'meta_value_num',
								'order' => 'ASC',
								'meta_query' => [[
								'key' => 'order_filter',
								'type' => 'NUMERIC',
							  ]],
                            )
                        );

                        $groupedRegions[$region->term_id] = [
                            'parent' => $region,
                            'children' => $children,
                        ];
                    }
                    ?>
                    <option value="" selected>選択してください</option>
                    <?php if (!empty($regions)): ?>
                        <?php $cities = []; ?>
                        <?php foreach ($regions as $k => $region): ?>
                            <option value="<?php echo $region->term_id; ?>" <?php echo isset($_REQUEST['region']) && $_REQUEST['region'] == $region->term_id ? 'selected' : ''; ?>>
                                <?php echo $region->name; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="input">
                <label for="location">都市</label>
                <select name="location" id="location" data-region='<?php echo json_encode($groupedRegions); ?>'>
                    <option value="">選択してください</option>
                </select>
            </div>
        </div>
        <div class="single">
            <div class="input">
                <label for="search_skill" class="job_tokute" style="display:none;">
                    <input type="checkbox" name="specific_skill" value="有" id="search_skill" <?php echo isset($_REQUEST['specific_skill']) && $_REQUEST['specific_skill'] == "有" ? 'checked' : ''; ?>>
                    <span>特定技能対応可</span>
                </label>
            </div>
        </div>

        <div class="single__job">
            <div class="input">
                <div class="active_jobs">
                    <div class="jobs"></div>
                </div>
            </div>
            <span class="show_jobs">
                対応職種で検索する
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="7.664" viewBox="0 0 10 7.664">
                    <path id="Path_220" data-name="Path 220" d="M10,0,5,4.643,0,0V3.021L5,7.664l5-4.643Z"
                        transform="translate(0 0)" fill="#f54d4d" />
                </svg>

            </span>
        </div>
    </div>
    <button type="submit" class="job_submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20.004" viewBox="0 0 20 20.004">
            <path id="Path_3" data-name="Path 3"
                d="M16.251,8.125a8.105,8.105,0,0,1-1.563,4.793l4.946,4.949a1.251,1.251,0,0,1-1.77,1.77l-4.946-4.949a8.127,8.127,0,1,1,3.332-6.563M8.125,13.751A5.625,5.625,0,1,0,2.5,8.125a5.625,5.625,0,0,0,5.625,5.625"
                fill="#fff" />
        </svg>
        検索する
    </button>
</form>
<script>
    var _region = document.querySelector("#region");
    var _location = document.querySelector("#location");
    var _data = _location.getAttribute("data-region");
    var _currentLocation = '<?php echo isset($_REQUEST['location']) ? $_REQUEST['location'] : 0; ?>';
    if (_data != "") {
        _data = Object.values(JSON.parse(_data));
    }
    _region.addEventListener("change", function (e) {
        var _id = this.value;
		_id != "" ? this.classList.add("in-active") : this.classList.remove("in-active");
        var _cities = _data.filter(function (e) {
            if (e.parent.term_id == _id) {
                return e;
            }
        });
        if (_cities[0] != null) {
            var _html = `<option value="">選択してください</option>`;
            _cities[0].children.forEach(function (elm, idx) {
                if (_currentLocation == elm.term_id) {
                    _html += `<option selected value="` + elm.term_id + `">` + elm.name + `</option>`;
                } else {
                    _html += `<option value="` + elm.term_id + `">` + elm.name + `</option>`;
                }

            });
            _location.innerHTML = _html;
        }

    });
	_location.addEventListener("change", function (e) {
		var _id = this.value;
		_id != "" ? this.classList.add("in-active") : this.classList.remove("in-active");
	});
    _region.dispatchEvent(new Event('change'));
	_location.dispatchEvent(new Event('change'));
</script>