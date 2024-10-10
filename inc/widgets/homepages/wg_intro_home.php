<?php
class Wg_Intro_Home extends WP_Widget
{
	function __construct()
	{
		parent::__construct(
			'Wg_Intro_Home',
			'Trang chủ - Intro trang chủ',
			array(
				'description' => 'Intro trang chủ'
			)
		);
	}
    
    function form($instance) {
        $default = array(
            'about' => '',
			'title' => '',
            'content' => '',
            'button' => '',
            'image' => '',
            'link' => '',
		);
        $instance = wp_parse_args( (array) $instance, $default);
        $about = esc_attr( $instance['about'] );
        $title = esc_attr( $instance['title'] );
        $content = esc_attr( $instance['content'] );
        $button = esc_attr( $instance['button'] );
        $link = esc_attr( $instance['link'] );
        $rand    = rand( 0, 99999999999 );
	    $ed_id   = $this->get_field_id( 'wp_editor_' . $rand );
	    $ed_name = $this->get_field_name( 'content' );
        $image = esc_attr( $instance['image'] );
        $content   = $content;
	    $editor_id = $ed_id;
        $settings = array(
            'media_buttons' => true,
            'textarea_rows' => 4,
            'textarea_name' => $ed_name,
            'teeny' => true
        );
        $imageurl = "";

        if(((int)$image)>0){

            $arr = wp_get_attachment_image_src($image,'full');

            if(count($arr)>0){

                $imageurl = $arr[0];

            }

        }
        echo "<p>Hình Ảnh:</p>";

        echo "<div class='h_cover_image'><img src='".$imageurl."'/>";

            echo "<input type='hidden' name = '".$this->get_field_name('image')."' value='".$image."'/>";

            echo "<button type='button' class='h_upload_image_button button'>Chọn ảnh</button>";

            echo "<button type='button' class='h_remove_image_button button'>Xóa ảnh</button>";

        echo "</div>";
		echo "<p>About:</p>";
        echo "<input style='width:100%' name = '".$this->get_field_name('about')."' value = '".$about."'/>";
        echo "<p>Tiêu đề:</p>";
        echo "<input style='width:100%' name = '".$this->get_field_name('title')."' value = '".$title."'/>";
		echo "<p>Nội dung:</p>";
        echo wp_editor( $content, $editor_id, $settings );
		echo "<p>Nút bấm:</p>";
        echo "<input style='width:100%' name = '".$this->get_field_name('button')."' value = '".$button."'/>";
        echo "<p>Link:</p>";
        echo "<input style='width:100%' name = '".$this->get_field_name('link')."' value = '".$link."'/>";
	}

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['about'] =$new_instance['about'];
        $instance['title'] =$new_instance['title'];
        $instance['content'] =$new_instance['content'];
        $instance['button'] =$new_instance['button'];
        $instance['image'] =$new_instance['image'];
        $instance['link'] =$new_instance['link'];
        return $instance;
    }

	function widget($args, $instance)
	{
		extract($args);
        $about = $instance['about'];
        $title = $instance['title'];
        $content = $instance['content'];
        $button = $instance['button'];
        $link = $instance['link'];
        $imageurl = "";

        if(((int)$image)>0){

            $arr = wp_get_attachment_image_src($image,'full');

            if(count($arr)>0){

                $imageurl = $arr[0];

            }

        }
?>

        
<?php 
	echo $after_widget;
    }
}