<?php
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}
class ts_poll_dashboard extends WP_List_Table {
	public function __construct() {
		parent::__construct(
			array(
				'singular' => esc_html__( 'Poll', 'tspoll' ), // singular name of the listed records
				'plural'   => esc_html__( 'Polls', 'tspoll' ), // plural name of the listed records
				'ajax'     => true, // should this table support ajax?
			)
		);
	}
	public static function ts_get_polls( ) {
		global $wpdb;
		$sql = "SELECT `id`,`Question_Title`,`created_at` FROM {$wpdb->prefix}ts_poll_questions";
		$result = $wpdb->get_results( $sql, 'ARRAY_A' );
		return $result;
	}
	public static function ts_poll_question_count() {
		global $wpdb;
		$sql = "SELECT COUNT(*) FROM {$wpdb->prefix}ts_poll_questions";
		return $wpdb->get_var( $sql );
	}
	public function no_items() {
		esc_html__( 'No polls avaliable.', 'tspoll' );
	}
	public function column_name( $item ) {
		$title                = sprintf( '<strong><a href="%s" >%s</a></strong>',add_query_arg( 'tsp-id', absint( $item['id'] ), esc_url(admin_url( 'admin.php?page=ts-poll-builder' ) ) ), esc_html( html_entity_decode( htmlspecialchars_decode( $item['Question_Title'] ), ENT_QUOTES ) ) );
		$actions              = array(
			'edit'   => sprintf( '<a href="%s">%s</a>',add_query_arg( 'tsp-id', absint( $item['id'] ), esc_url(admin_url( 'admin.php?page=ts-poll-builder' ) ) ), esc_attr__( 'Edit', 'tspoll' ) )
		);
		return $title . $this->row_actions( $actions );
	}
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'Question_Title':
				return self::column_name( $item );
			case 'id':
				return '[TS_Poll id="' . $item[ $column_name ] . '"] <span class="tsp_copy_shorcode" data-tsp-id="' . $item[ $column_name ] . '">' . esc_attr__( 'Copy', 'tspoll' ) . '</span>';
			case 'created_at':
				return esc_html( date( 'F jS, Y', strtotime( $item[ $column_name ] ) ) );
			default:
				return print_r( $item, true ); // Show the whole array for troubleshooting purposes
		}
	}
	public function get_columns() {
		$columns = array(
			'Question_Title' => __( 'Title', 'tspoll' ),
			'id'             => __( 'Shortcode', 'tspoll' ),
			'created_at'     => __( 'Created At', 'tspoll' )
		);
		return $columns;
	}
	public function prepare_items() {
		$per_page = 5;
		$columns  = $this->get_columns();
		$this->_column_headers = array($columns);
		$data = self::ts_get_polls();
		$current_page = $this->get_pagenum();
		$total_items = self::ts_poll_question_count();
		$data = array_slice($data,(($current_page-1)*$per_page),$per_page);
		$this->items = $data;
		$this->set_pagination_args(
			array(
				'total_items'	=> $total_items,
				'per_page'	    => $per_page,
				'total_pages'	=> ceil( $total_items / $per_page )
			)
		);
	}
	public function ajax_response() {
		check_ajax_referer( 'tsp-dashboard-nonce', 'ts_poll_dashboard_widget_nonce' );
		$this->prepare_items();
		extract( $this->_args );
		extract( $this->_pagination_args, EXTR_SKIP );
		ob_start();
		if ( ! empty( $_REQUEST['no_placeholder'] ) )
			$this->display_rows();
		else
			$this->display_rows_or_placeholder();
		$rows = ob_get_clean();
		ob_start();
		$this->print_column_headers();
		$headers = ob_get_clean();
		ob_start();
		$this->pagination('top');
		$pagination_top = ob_get_clean();
		ob_start();
		$this->pagination('bottom');
		$pagination_bottom = ob_get_clean();
		$response = array( 'rows' => $rows );
		$response['pagination']['top'] = $pagination_top;
		$response['pagination']['bottom'] = $pagination_bottom;
		$response['column_headers'] = $headers;
		if ( isset( $total_items ) )
			$response['total_items_i18n'] = sprintf( _n( '1 item', '%s items', $total_items ), number_format_i18n( $total_items ) );
		if ( isset( $total_pages ) ) {
			$response['total_pages'] = $total_pages;
			$response['total_pages_i18n'] = number_format_i18n( $total_pages );
		}
		die( wp_send_json( $response ) );
	}
}
