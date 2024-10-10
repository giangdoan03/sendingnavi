<?php /*Template Name: 本サイトについて*/?>
<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/module-t/css/about.css">
<main>
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/bg-middle-right.png" class="bg-middle-right">
    <?php get_template_part("paths/breacrumb"); ?>
    <div id="about_page">
        <div class="container">
            <div class="block_items">
                <div class="block_item block_item-1">
                    <p class="block_title">本サイトについて</p>
                    <div class="block_content">
                        <p>
                            本サイトは、新たに外国人技能実習生や特定技能者他外国人労働者の活用をお考えの企業様、監理機関のご担当者様へ向け、各国認定送出機関の情報をご紹介することを目的としています。
                        </p>

                        <p>
                            本サイトにて紹介させていただく機関団体は、必ずしも送出数や契約の安全を保証するものではございません。
                            あくまで参考として活用ください。
                        </p>
                    </div>
                </div>
                <div class="block_item block_item-2">
                    <p class="block_title">送出機関とは？</p>
                    <div class="block_content">
                        <div>
                            <span>①</span>
                            <div>
                                技能実習生になろうとする者からの技能実習に係る求職の申込みを適切に本邦の監理団体に取り次ぐことができる者として、規則第25条において定められている要件に適合する機関と定められています。
                            </div>
                        </div>
                        <div>
                            <span>②</span>
                            <div>
                                <p>
									<span class="only_pc">規則 第25条における外国の送出機関の要件（概略）</span>
									<span class="only_sp">本サイトにて紹介させていただく機関団体は、必ずしも送出数や契約の安全を保証するものではございません。<br>あくまで参考として活用ください。</span>
								</p>
                                <ul>
                                    <li>所在する国又は地域の公的機関から推薦を受けている</li>
                                    <li>制度の趣旨を理解して候補者を適切に選定し、送り出す</li>
                                    <li>技能実習生等から徴収する手数料等の算出基準を明確に定めて公表し、技能実習生に明示して十分理解させる</li>
                                    <li>技能実習修了者（帰国生）に就職の斡旋等必要な支援を行う</li>
                                    <li>法務大臣、厚労大臣又は外国人技能実習機構からのフォローアップ調査、技能実習生の保護に関する要請などに応じる</li>
                                    <li>当該送出機関又はその役員が、日本又は所在国の法令違反で禁錮以上の刑に処せられ、刑執行後5年を経過しない者でない</li>
                                    <li>
                                        当該送出機関又はその役員が、過去5年以内に
                                        <span>- 保証金の徴収他名目を問わず、技能実習生や親族等の金銭又はその他財産を管理しない<br>
                                            （同様の扱いをされていない旨技能実習生にも確認）</span>
                                        <span>- 技能実習に係る契約の不履行について違約金や不当な金銭等の財産移転を定める契約をしない<br>
                                            （同様の扱いをされていない旨 技能実習生にも確認）</span>
                                        <span>- 技能実習生に対する人権侵害行為、偽造変造された文書の使用等を行っていない</span>
                                    </li>
                                    <li>所在国または地域の法令に従って事情を行う</li>
                                    <li>その他取次に必要な能力を有する</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about_specs">
                <p class="about_specs__title">各国の人材の特徴と企業にとってのメリットとデメリットまとめ</p>
                <div class="about_overflows">
                    <div class="about_wrapper">
                        <div class="about_specs__heading">
                            <div class="label">国名</div>
                            <div class="label">特徴</div>
                            <div class="label">日系企業にとってのメリット</div>
                            <div class="label">日系企業にとってのデメリット</div>
                        </div>
                        <div class="about_specs__body">
                            <div class="value">
                                <p>ベトナム</p>
                            </div>
                            <div class="value">
                                <p>– 勤勉であり、技術向上に対す
                                    る意欲が高い。</p>
                            </div>
                            <div class="value">
                                <p>– 低コストで人材を確保できる。</p>
                                <p>– 技能実習生制度を利用することで、<br class="only_pc">
                                    日本語や日本の労働文化に適応しやすい労働者を雇用でき<br class="only_pc">る。</p>
                            </div>
                            <div class="value">
                                <p>– 一部の人材が日本の文化や言語に適応するまでに時間がかかる可能性がある。</p>
                                <p>– 人材のスキルや経験が不足している場合がある。</p>
                            </div>
                        </div>
                        <div class="about_specs__body">
                            <div class="value">
                                <p>インドネシア</p>
                            </div>
                            <div class="value">
                                <p>– 温厚であり、コミュニケーション能力が高い。</p>
                                <p>– 日本との文化的な適応が比較的容易。</p>
                            </div>
                            <div class="value">
                                <p>– 人口が多く、人材の供給が安定している。</p>
                                <p>– 日本との文化的な適応が比較的容易であり、<br class="only_pc">
                                    円滑な労働関係が築ける可能性が高い。</p>
                            </div>
                            <div class="value">
                                <p>– 技能レベルや経験がバラつき、適切な人材の選択が難しい場合がある。</p>
                            </div>
                        </div>
                        <div class="about_specs__body">
                            <div class="value">
                                <p>フィリピン</p>
                            </div>
                            <div class="value">
                                <p>– 英語力が高く、コミュニケーション能力が優れている人材が多い。</p>
                                <p>– 医療関連のスキルを持つ労働者が多い。</p>
                            </div>
                            <div class="value">
                                <p>– 英語を話す人材が多く、コミュニケーションが円滑に行える。</p>
                                <p>– 医療関連のスキルを持つ人材を雇用できる。</p>
                            </div>
                            <div class="value">
                                <p>– 人材の一部が他の国への移民を希望し、
                                    一定期間での雇用継続が難しい場合がある。</p>
                            </div>
                        </div>
                        <div class="about_specs__body">
                            <div class="value">
                                <p>タイ</p>
                            </div>
                            <div class="value">
                                <p>– 柔軟性があり、労働文化に対する理解が深い。</p>
                                <p>– 製造業や観光業など多岐にわたる産業で経験豊富な人材が多い。</p>
                            </div>
                            <div class="value">
                                <p>– 多様な産業で経験豊富な人材が確保できる。</p>

                                <p>– 人材の柔軟性が高く、変化する環境に適応しやすい。</p>
                            </div>
                            <div class="value">
                                <p>– 政治的な不安定や労働法の変更など、</p>
                                <p>ビジネスに影響を与えるリスクがある。</p>
                            </div>
                        </div>
                        <div class="about_specs__body">
                            <div class="value">
                                <p>ラオス</p>
                            </div>
                            <div class="value">
                                <p>– 勤勉であり、新しい技術やスキルの習得に積極的。</p>
                                <p>– 給与水準が比較的低い。</p>
                            </div>
                            <div class="value">
                                <p>– 勤勉さや技術習得の意欲が高い。</p>
                                <p>– 低コストで人材を確保できる。</p>
                            </div>
                            <div class="value">
                                <p>– スキルレベルが不足しており、<br class="only_pc">
                                    トレーニングや指導が必要な場合がある</p>
                            </div>
                        </div>
                        <div class="about_specs__body">
                            <div class="value">
                                <p>カンボジア</p>
                            </div>
                            <div class="value">
                                <p>– 穏やかで協調性があり、新しい環境に適応しやすい。</p>
                                <p>– 若い人材が多く、<br class="only_sp">
                                    教育水準が向上している。</p>
                            </div>
                            <div class="value">
                                <p>– 若い人材が多く、柔軟性があり、新しい環境に適応しやすい。</p>
                            </div>
                            <div class="value">
                                <p>– 教育水準や技能レベルがまちまちであり、<br class="only_pc">
                                    適切な人材の選択が難しい場合がある。</p>
                            </div>
                        </div>
                        <div class="about_specs__body">
                            <div class="value">
                                <p>中国</p>
                            </div>
                            <div class="value">
                                <p>– 人材の技術力が高く、大規模なプロジェクトに対応可能。</p>
                                <p>– 人材の数が多く、様々な業種やスキルを持つ人材が確保できる。</p>
                            </div>
                            <div class="value">
                                <p>– 多様な業種やスキルを持つ人材が確保できる。</p>
                                <p>– 大規模なプロジェクトに対応可能。</p>
                            </div>
                            <div class="value">
                                <p>– 労働条件や法的な規制が不透明であり、<br class="only_pc">
                                    リスクが高い場合がある。</p>
                                <p>– 人件費が上昇しており、コスト競争力が低下している。</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php get_template_part("paths/website"); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>