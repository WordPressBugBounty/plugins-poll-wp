<?php
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}
class ts_poll_list_table extends WP_List_Table {
	public function __construct() {
		parent::__construct(
			array(
				'singular' => esc_html__( 'Poll', 'tspoll' ), // singular name of the listed records
				'plural'   => esc_html__( 'Polls', 'tspoll' ), // plural name of the listed records
				'ajax'     => false, // should this table support ajax?
			)
		);
	}
	/**
	 * Retrieve poll questions data from the database
	 *
	 * @param int $per_page
	 * @param int $page_number
	 *
	 * @return mixed
	 */
	public static function ts_get_polls( $per_page = 10, $page_number = 1 ) {
		global $wpdb;
		$sql = "SELECT `id`,`Question_Title`,`Question_Param`,`created_at` FROM {$wpdb->prefix}ts_poll_questions";
		if ( isset( $_REQUEST['s'] ) ) {
			$sql .= ' WHERE Question_Title LIKE "%%' . esc_sql( $_REQUEST['s'] ) . '%%"';
		}
		if ( ! empty( $_REQUEST['orderby'] ) ) {
			$sql .= ' ORDER BY ' . esc_sql( $_REQUEST['orderby'] );
			$sql .= ! empty( $_REQUEST['order'] ) ? ' ' . esc_sql( $_REQUEST['order'] ) : ' ASC';
		}
		$sql   .= " LIMIT $per_page";
		$sql   .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;
		$result = $wpdb->get_results( $sql, 'ARRAY_A' );
		return $result;
	}
	/**
	 * Delete a poll.
	 *
	 * @param int $id poll id
	 */
	public static function ts_poll_delete( $id ) {
		global $wpdb;
		$wpdb->delete(
			"{$wpdb->prefix}ts_poll_questions",
			array( 'id' => $id ),
			array( '%d' )
		);
		$wpdb->delete(
			"{$wpdb->prefix}ts_poll_answers",
			array( 'Question_id' => $id ),
			array( '%d' )
		);
	}
	/**
	 * Copy a poll.
	 *
	 * @param int $id poll id
	 */
	public static function ts_poll_copy( $id ) {
		global $wpdb;
		$TS_Poll_Question_Table = $wpdb->prefix . 'ts_poll_questions';
		$TS_Poll_Answers_Table  = $wpdb->prefix . 'ts_poll_answers';
		$TS_Poll_Question_Copy  = $wpdb->get_row( $wpdb->prepare( "SELECT `Question_Title`, `Question_Param`, `Question_Style`, `Question_Settings`, `Answers_Sort` FROM $TS_Poll_Question_Table WHERE id = %d", $id ) );
		$wpdb->insert(
			$TS_Poll_Question_Table,
			array(
				'id'                => '',
				'Question_Title'    => $TS_Poll_Question_Copy->Question_Title,
				'Question_Param'    => $TS_Poll_Question_Copy->Question_Param,
				'Question_Style'    => $TS_Poll_Question_Copy->Question_Style,
				'Question_Settings' => $TS_Poll_Question_Copy->Question_Settings,
				'Answers_Sort'      => '',
				'created_at'        => date( 'd.m.Y h:i:sa' ),
				'updated_at'        => date( 'd.m.Y h:i:sa' )
			),
			array( '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
		);
		$TS_Poll_Question_Copied = $wpdb->insert_id;
		$TS_Poll_Answers_Copy    = $wpdb->get_results( $wpdb->prepare( "SELECT `id`, `Question_id`, `Answer_Title`, `Answer_Param` FROM $TS_Poll_Answers_Table WHERE Question_id = %d", $id ) );
		if ( count( $TS_Poll_Answers_Copy ) != 0 ) {
			$TS_Poll_Answer_Sort           = explode( ',', $TS_Poll_Question_Copy->Answers_Sort );
			$TS_Poll_Answers_Copy_Columned = array_column( json_decode( json_encode( $TS_Poll_Answers_Copy ), true ), null, 'id' );
			for ( $i = 0; $i < count( $TS_Poll_Answers_Copy ); $i++ ) {
				$wpdb->insert(
					$TS_Poll_Answers_Table,
					array(
						'id'           => '',
						'Question_id'  => (int) $TS_Poll_Question_Copied,
						'Answer_Title' => $TS_Poll_Answers_Copy_Columned[ $TS_Poll_Answer_Sort[ $i ] ]['Answer_Title'],
						'Answer_Param' => $TS_Poll_Answers_Copy_Columned[ $TS_Poll_Answer_Sort[ $i ] ]['Answer_Param'],
						'Answer_Votes' => 0
					),
					array( '%d', '%d', '%s', '%s', '%d' )
				);
			}
			$TS_Poll_Answers_Copied          = $wpdb->get_results( $wpdb->prepare( "SELECT `id` FROM $TS_Poll_Answers_Table WHERE Question_id = %d", (int) $TS_Poll_Question_Copied ) );
			$TS_Poll_Answers_Copied_Imploded = implode( ',', array_column( json_decode( json_encode( $TS_Poll_Answers_Copied ), true ), 'id' ) );
			$wpdb->update( $TS_Poll_Question_Table, array( 'Answers_Sort' => $TS_Poll_Answers_Copied_Imploded ), array( 'id' => $TS_Poll_Question_Copied ), array( '%s' ), array( '%d' ) );
		}
	}
	/**
	 * Returns the count of polls in the database.
	 *
	 * @return null|string
	 */
	public static function ts_poll_question_count() {
		global $wpdb;
		$sql = "SELECT COUNT(*) FROM {$wpdb->prefix}ts_poll_questions";
		return $wpdb->get_var( $sql );
	}
	/** Text displayed when no poll data is available */
	public function no_items() {
		esc_html__( 'No polls avaliable.', 'tspoll' );
	}
	/**
	 * Method for name column
	 *
	 * @param array $item an array of DB data
	 *
	 * @return string
	 */
	function column_name( $item ) {
		// create a nonce
		$ts_poll_action_nonce = wp_create_nonce( 'ts_poll_nonce' );
		$title                = sprintf( '<strong><a href="?page=%s&tsp-id=%d" target="_blank">%s</a></strong>', esc_attr( 'ts-poll-builder' ), absint( $item['id'] ), esc_html( html_entity_decode( htmlspecialchars_decode( $item['Question_Title'] ), ENT_QUOTES ) ) );
		$actions              = array(
			'edit'   => sprintf( '<a href="?page=%s&tsp-id=%s">%s</a>', esc_attr( 'ts-poll-builder' ), absint( $item['id'] ), esc_attr__( 'Edit', 'tspoll' ) ),
			'copy'   => sprintf( '<a data-tsp-action="%s" data-tsp-id="%d">%s</a>', 'copy', absint( $item['id'] ), esc_attr__( 'Copy', 'tspoll' ) ),
			'delete' => sprintf( '<a data-tsp-action="%s" data-tsp-id="%d">%s</a>', 'delete', absint( $item['id'] ), esc_attr__( 'Delete', 'tspoll' ) )
		);
		return $title . $this->row_actions( $actions );
	}
	/**
	 * Render a column when no column specific method exists.
	 *
	 * @param array  $item
	 * @param string $column_name
	 *
	 * @return mixed
	 */
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'Question_Title':
				return self::column_name( $item );
			case 'id':
				return '[TS_Poll id="' . $item[ $column_name ] . '"] <span class="tsp_copy_shorcode" data-tsp-id="' . $item[ $column_name ] . '">' . esc_attr__( 'Copy', 'tspoll' ) . '</span>';
			case 'Question_Param':
				$tsp_question_param_decode = json_decode( $item[ $column_name ], true );
				return esc_html( $tsp_question_param_decode['TS_Poll_Q_Theme'] );
			case 'created_at':
				return esc_html( date( 'F jS, Y', strtotime( $item[ $column_name ] ) ) );
			case 'export':
				return sprintf(
					'
						<div class="ts-export-poll  " >
							%1$s
						</div>
					',
					__( "Export poll" , "ts-poll")
				);
			case 'export_results':
				return sprintf(
					'
						<div class="ts-export-results-items">
							<div class="ts-export-results-item " data-export="csv">
								%1$s
							</div>
							<div class="ts-export-results-item " data-export="pdf">
								%2$s
							</div>
							<div class="ts-export-results-item " data-export="json">
								%3$s
							</div>
						</div>
					',
					__("Export as csv","tspoll"),
					__("Export as pdf","tspoll"),
					__("Export as json","tspoll")
				);	
			default:
				return print_r( $item, true ); // Show the whole array for troubleshooting purposes
		}
	}
	/**
	 * Render the bulk edit checkbox
	 *
	 * @param array $item
	 *
	 * @return string
	 */
	function column_cb( $item ) {
		return sprintf(
			'<input type="checkbox" name="tspoll_ids[]" value="%s" />',
			$item['id']
		);
	}
	/**
	 * Associative array of columns
	 *
	 * @return array
	 */
	function get_columns() {
		$columns = array(
			'cb'             => '<input type="checkbox" />',
			'Question_Title' => __( 'Title', 'tspoll' ),
			'id'             => __( 'Shortcode', 'tspoll' ),
			'Question_Param' => __( 'Question theme', 'tspoll' ),
			'created_at'     => __( 'Created At', 'tspoll' ),
			'export'     	 => __( 'Export', 'tspoll' ),
			'export_results' => __( 'Export results', 'tspoll' )
		);
		return $columns;
	}
	/**
	 * Columns to make sortable.
	 *
	 * @return array
	 */
	public function get_sortable_columns() {
		$sortable_columns = array(
			'Question_Title' => array( 'Question_Title', true ),
			'id'             => array( 'id', true )
		);
		return $sortable_columns;
	}
	/**
	 * Returns an associative array containing the bulk action
	 *
	 * @return array
	 */
	public function get_bulk_actions() {
		$actions = array(
			'bulk-delete' => esc_attr__( 'Delete', 'tspoll' ),
			'bulk-copy'   => esc_attr__( 'Copy', 'tspoll' )
		);
		return $actions;
	}
	public function ts_poll_admin_notice( $class, $message ) {
		return sprintf( '<div class="%1$s is-dismissible"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
	}
	/**
	 * Handles data query and filter, sorting, and pagination.
	 */
	public function process_bulk_action() {
		if ( isset( $_POST['action'] ) || isset( $_POST['action2'] ) ) {
			if ( ! isset( $_POST['ts_poll_action_nonce'] )
				|| ! wp_verify_nonce( $_POST['ts_poll_action_nonce'], 'ts_poll_action' )
			) {
				echo self::ts_poll_admin_notice( 'notice notice-error ', esc_html__( 'Sorry, your nonce did not verify.', 'tspoll' ) );
				exit;
			} else {
				// If the bulk action is triggered
				$ts_poll_post_action = isset( $_POST['action'] ) ? sanitize_text_field( $_POST['action'] ) : sanitize_text_field( $_POST['action2'] );
				if ( isset( $_POST['tspoll_ids'] ) ) {
					$count       = count( $_POST['tspoll_ids'] );
					$ts_poll_ids = esc_sql( $_POST['tspoll_ids'] );
					if ( 'bulk-delete' === $ts_poll_post_action ) {
						// loop over the array of record IDs and delete them
						foreach ( $ts_poll_ids as $id ) {
							self::ts_poll_delete( $id );
						}
						echo self::ts_poll_admin_notice( 'notice notice-success', esc_html__( "{$count} poll was successfully deleted.", 'tspoll' ) );
					} elseif ( 'bulk-copy' === $ts_poll_post_action ) {
						// loop over the array of record IDs and copy them
						foreach ( $ts_poll_ids as $id ) {
							self::ts_poll_copy( $id );
						}
						echo self::ts_poll_admin_notice( 'notice notice-success', esc_html__( "{$count} poll was successfully copied.", 'tspoll' ) );
					} else {
						echo self::ts_poll_admin_notice( 'notice notice-error ', esc_html__( 'Not valid action.', 'tspoll' ) );
					}
				}
			}
		}
	}
	public function ts_poll_nonce_field() {
		return wp_nonce_field( 'ts_poll_action', 'ts_poll_action_nonce' );
	}
	public function ts_poll_confirm_modal() {
		echo sprintf(
			'<section id="ts_poll_confirm_modal" style="display: none;">
    			<div id="ts_poll_confirm_inner" >
					<div id="ts_poll_confirm_content">
    		    		<header>
							<div></div>
							<p>Are you sure?</p>
						</header>
    		    		<main></main>
    		    		</hr>
    		   			<footer>
    		   			    <form action="" id="ts_poll_modal_form" method="POST">
    		   			        %s
    		   			        <input type="hidden" id="ts_poll_actioned_item" name="tspoll_ids[]" value="" style="display:none;">
    		   			        <input type="hidden" id="ts_poll_action_input" name="action" value="" style="display:none;">
    		   			        <input type="button" class="ts_poll_cancel_btn" value="Cancel"><input type="submit" name="submit" value="Delete" class="ts_poll_submit_btn">
    		   			    </form>
    		   			</footer>
    		    		<button type="button" id="ts_poll_close_btn">×</button>
					</div>
				</div>
			</section>
			',
			self::ts_poll_nonce_field()
		);
	}
	public function prepare_items() {
		$this->_column_headers = $this->get_column_info();
		/** Process bulk action */
		$this->process_bulk_action();
		$per_page     = $this->get_items_per_page( 'ts_polls_per_page', 10 );
		$current_page = $this->get_pagenum();
		$total_items  = self::ts_poll_question_count();
		$this->set_pagination_args(
			array(
				'total_items' => $total_items, // WE have to calculate the total number of items
				'per_page'    => $per_page // WE have to determine how many items to show on a page
			)
		);
		$this->items = self::ts_get_polls( $per_page, $current_page );
	}
}
