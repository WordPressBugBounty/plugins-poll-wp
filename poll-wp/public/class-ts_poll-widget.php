<?php
class ts_poll_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'ts_poll_widget',
			esc_html( 'TS Poll Widget' ),
			array( 'description' => esc_html( 'Poll plugin is a responsive and customizable for WordPress. Poll plugin will help you more easily create powerful poll, Image poll, video poll.' ) )
		);
	}
	public function ts_poll_get_questions( $return = false, $tsp_id = '' ) {
		global $wpdb;
		$poll_table = esc_sql( $wpdb->prefix . 'ts_poll_questions' );
		$sql        = 'SELECT `id`,`Question_Title` FROM ' . $poll_table;
		$ts_polls   = $wpdb->get_results( $sql, 'ARRAY_A' );
		if ( $return == true ) {
			$tspoll_return = '';
			array_unshift(
				$ts_polls,
				array(
					'id'             => '',
					'Question_Title' => 'Select question'
				)
			);
			foreach ( $ts_polls as $value ) {
				$tspoll_return .= sprintf(
					" <option value='%s' %s>%s</option> ",
					esc_attr( $value['id'] ),
					$value['id'] == $tsp_id ? esc_attr( 'selected' ) : '',
					esc_html( wp_strip_all_tags( html_entity_decode( htmlspecialchars_decode( $value['Question_Title'] ), ENT_QUOTES ) ) )
				);
			}
			return $tspoll_return;
		} else {
			return $ts_polls;
		}
	}
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		$ts_poll_id = empty( $instance['ts_poll_id'] ) ? '' : $instance['ts_poll_id'];
		if ( $ts_poll_id ) {
			$ts_get_polls = array_column( $this->ts_poll_get_questions(), 'Question_Title', 'id' );
			if ( array_key_exists( absint( $ts_poll_id ), $ts_get_polls ) ) {
				echo do_shortcode( sprintf( '[TS_Poll id="%s"]', absint( $ts_poll_id ) ) );
			} else {
				echo '<p>Selected poll is not defined.</p>';
			}
		}
		echo $args['after_widget'];
	}
	public function form( $instance ) {
		$ts_poll_id = ! empty( $instance['ts_poll_id'] ) ? $instance['ts_poll_id'] : '';
		echo sprintf(
			"
            <p>
                <select class='widefat' id='%s' name='%s'>
                    %s
                </select>
            </p>
			",
			esc_attr( $this->get_field_id( 'ts-poll' ) ),
			esc_attr( $this->get_field_name( 'ts_poll_id' ) ),
			$this->ts_poll_get_questions( true, $ts_poll_id )
		);
	}
	public function update( $new_instance, $old_instance ) {
		$instance               = array();
		$instance['ts_poll_id'] = ( ! empty( $new_instance['ts_poll_id'] ) ) ? absint( sanitize_text_field( $new_instance['ts_poll_id'] ) ) : '';
		return $instance;
	}
}
