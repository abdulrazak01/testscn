<?php
	function log_r($string=NULL,$var_dump=FALSE){
		if ($var_dump) {
			var_dump($string);
		}else{
			echo "<pre>";
			print_r($string);
		}
		exit;
	}


	function send_email($email, $judul, $message){

		$ci = get_instance();
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "admin@ninos.co.id";
		$config['smtp_pass'] = "/4Hw;w}jcx4D8~123/4Hw;w}jcx4D8~123";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$ci->email->initialize($config);
		$ci->email->from('admin@ninos.co.id', 'Admin Ninos');
		$ci->email->to($email);
		$ci->email->subject($judul);
		$ci->email->message($message);
		return $ci->email->send();
	}

	// *********** Class Export excel *************
	function excel_header($filename){
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=$filename");
		header("Pragma: no-cache");
		header("Expires: 0");
	}

	function newline(){
		echo "<br />";
	}

	function tab(){
		echo "\t";
	}
	// ********* End Class Export excel **********
	
	function checked_menu_btn($menu,$crud){
		if($menu != "N;"){
			if(in_array($crud, unserialize($menu))) {
				echo "checked";
			}
		} 
	}

	function check_permission_menu($id_group,$menu,$status=FALSE){
		$CI = get_instance();
		$where = array(
			'id_user_group' => $id_group,
			'id_menu' => $menu,
		);
		$ceklebihrole = $CI->db->get_where('users_role',$where)->num_rows();
		$data = $CI->db->get_where('users_role',$where)->row();
		if($ceklebihrole > 1){
			return $status;
		} else {
			if(!empty($data->user_permission)){
			if($data->user_permission != "N;"){
				if(in_array("read", unserialize($data->user_permission))){
					return !$status;
				} else {
					return $status;
				}
			}
			}

		}
	}

	function check_permission_view($id_group,$crud,$url,$status=TRUE){
		$CI = get_instance();
		
		$where = array(
			'b.id_user_group' => $id_group,
			'a.menu_url' => $url,
		);

		$CI->db->select('b.id_menu,b.id_user_group,b.user_permission,a.menu_url');
		$CI->db->from('menu a');
		$CI->db->join('users_role b','a.id_menu=b.id_menu');
		$CI->db->join('groups c', 'b.id_user_group=c.id');
		$CI->db->where($where);
		
		$dt = $CI->db->get()->row();

		if(!empty($dt->user_permission)){
			if($dt->user_permission != "N;"){
				if(in_array($crud, unserialize($dt->user_permission))){
					return $status;
				}
			} else {
				return !$status;
			}
		}
	}

	function check_permission_page($id_group,$crud,$url){
		$CI = get_instance();
		
		$where = array(
			'b.id_user_group' => $id_group,
			'a.menu_url' => $url,
		);

		$CI->db->select('b.id_menu,b.id_user_group,b.user_permission,a.menu_url');
		$CI->db->from('menu a');
		$CI->db->join('users_role b','a.id_menu=b.id_menu');
		$CI->db->join('groups c', 'b.id_user_group=c.id');
		$CI->db->where($where);
		
		$dt = $CI->db->get()->row();

		if(empty($dt)){
			redirect(base_url());
		}
		// if(!empty($dt->user_permission)){
		// 	if($dt->user_permission != "N;"){
		// 		if(!in_array($crud, unserialize($dt->user_permission))){
		// 			redirect(base_url());
		// 		}
		// 	} else {
		// 		redirect(base_url());
		// 	}
		// }
	}

	function check_ajax_request(){
		$CI = get_instance();
		if (!$CI->input->is_ajax_request()) {
		   redirect(base_url());
		}
	}

	function check_post_request(){
		$CI = get_instance();
		if(!$CI->input->post()){
			redirect(base_url());
		}
	}

	function check_get_request(){
		$CI = get_instance();
		if(!$CI->input->get()){
			redirect(base_url());
		}
	}

	function view_menu(){
		$CI = get_instance();
		// Data Header
          $CI->db->select('*');
          $CI->db->from('menu');
          $CI->db->where('menu_level', '0');
          $CI->db->order_by('menu_sortable', 'asc');
          $data = $CI->db->get()->result();
          // Data Level 1
          $CI->db->select('*');
          $CI->db->from('menu');
          $CI->db->where('menu_level','1');
          $CI->db->order_by('menu_sortable', 'asc');
          $data1 = $CI->db->get()->result();
          // Data Level 2
          $CI->db->select('*');
          $CI->db->from('menu');
          $CI->db->where('menu_level','2');
          $CI->db->order_by('menu_sortable', 'asc');
          $data2 = $CI->db->get()->result();
          // Data Level 3
          $CI->db->select('*');
          $CI->db->from('menu');
          $CI->db->where('menu_level','3');
          $CI->db->order_by('menu_sortable', 'asc');
          $data3 = $CI->db->get()->result();

          return array(
          	'data'	=> $data,
          	'data1'	=> $data1,
          	'data2'	=> $data2,
          	'data3'	=> $data3,
          );
	}

	function get_outlet_name($id){
		$CI = get_instance();
		$where = array("id"=>$id);
		$data = $CI->db->select("name")->get_where("a_outlet",$where)->row();
		return $data->name;
	}

	function get_icon_menu(){
		$icons = array(
			array("e84d","3d-rotation"),
			array("eb3b","ac-unit"),
			array("e190","access-alarm"),
			array("e191","access-alarms"),
			array("e192","access-time"),
			array("e84e","accessibility"),
			array("e914","accessible"),
			array("e84f","account-balance"),
			array("e850","account-balance-wallet"),
			array("e851","account-box"),
			array("e853","account-circle"),
			array("e60e","adb"),
			array("e145","add"),
			array("e439","add-a-photo"),
			array("e193","add-alarm"),
			array("e003","add-alert"),
			array("e146","add-box"),
			array("e147","add-circle"),
			array("e148","add-circle-outline"),
			array("e567","add-location"),
			array("e854","add-shopping-cart"),
			array("e39d","add-to-photos"),
			array("e05c","add-to-queue"),
			array("e39e","adjust"),
			array("e630","airline-seat-flat"),
			array("e631","airline-seat-flat-angled"),
			array("e632","airline-seat-individual-suite"),
			array("e633","airline-seat-legroom-extra"),
			array("e634","airline-seat-legroom-normal"),
			array("e635","airline-seat-legroom-reduced"),
			array("e636","airline-seat-recline-extra"),
			array("e637","airline-seat-recline-normal"),
			array("e195","airplanemode-active"),
			array("e194","airplanemode-inactive"),
			array("e055","airplay"),
			array("eb3c","airport-shuttle"),
			array("e855","alarm"),
			array("e856","alarm-add"),
			array("e857","alarm-off"),
			array("e858","alarm-on"),
			array("e019","album"),
			array("eb3d","all-inclusive"),
			array("e90b","all-out"),
			array("e859","android"),
			array("e85a","announcement"),
			array("e5c3","apps"),
			array("e149","archive"),
			array("e5c4","arrow-back"),
			array("e5db","arrow-downward"),
			array("e5c5","arrow-drop-down"),
			array("e5c6","arrow-drop-down-circle"),
			array("e5c7","arrow-drop-up"),
			array("e5c8","arrow-forward"),
			array("e5d8","arrow-upward"),
			array("e060","art-track"),
			array("e85b","aspect-ratio"),
			array("e85c","assessment"),
			array("e85d","assignment"),
			array("e85e","assignment-ind"),
			array("e85f","assignment-late"),
			array("e860","assignment-return"),
			array("e861","assignment-returned"),
			array("e862","assignment-turned-in"),
			array("e39f","assistant"),
			array("e3a0","assistant-photo"),
			array("e226","attach-file"),
			array("e227","attach-money"),
			array("e2bc","attachment"),
			array("e3a1","audiotrack"),
			array("e863","autorenew"),
			array("e01b","av-timer"),
			array("e14a","backspace"),
			array("e864","backup"),
			array("e19c","battery-alert"),
			array("e1a3","battery-charging-full"),
			array("e1a4","battery-full"),
			array("e1a5","battery-std"),
			array("e1a6","battery-unknown"),
			array("eb3e","beach-access"),
			array("e52d","beenhere"),
			array("e14b","block"),
			array("e1a7","bluetooth"),
			array("e60f","bluetooth-audio"),
			array("e1a8","bluetooth-connected"),
			array("e1a9","bluetooth-disabled"),
			array("e1aa","bluetooth-searching"),
			array("e3a2","blur-circular"),
			array("e3a3","blur-linear"),
			array("e3a4","blur-off"),
			array("e3a5","blur-on"),
			array("e865","book"),
			array("e866","bookmark"),
			array("e867","bookmark-border"),
			array("e228","border-all"),
			array("e229","border-bottom"),
			array("e22a","border-clear"),
			array("e22b","border-color"),
			array("e22c","border-horizontal"),
			array("e22d","border-inner"),
			array("e22e","border-left"),
			array("e22f","border-outer"),
			array("e230","border-right"),
			array("e231","border-style"),
			array("e232","border-top"),
			array("e233","border-vertical"),
			array("e06b","branding-watermark"),
			array("e3a6","brightness-1"),
			array("e3a7","brightness-2"),
			array("e3a8","brightness-3"),
			array("e3a9","brightness-4"),
			array("e3aa","brightness-5"),
			array("e3ab","brightness-6"),
			array("e3ac","brightness-7"),
			array("e1ab","brightness-auto"),
			array("e1ac","brightness-high"),
			array("e1ad","brightness-low"),
			array("e1ae","brightness-medium"),
			array("e3ad","broken-image"),
			array("e3ae","brush"),
			array("e6dd","bubble-chart"),
			array("e868","bug-report"),
			array("e869","build"),
			array("e43c","burst-mode"),
			array("e0af","business"),
			array("eb3f","business-center"),
			array("e86a","cached"),
			array("e7e9","cake"),
			array("e0b0","call"),
			array("e0b1","call-end"),
			array("e0b2","call-made"),
			array("e0b3","call-merge"),
			array("e0b4","call-missed"),
			array("e0e4","call-missed-outgoing"),
			array("e0b5","call-received"),
			array("e0b6","call-split"),
			array("e06c","call-to-action"),
			array("e3af","camera"),
			array("e3b0","camera-alt"),
			array("e8fc","camera-enhance"),
			array("e3b1","camera-front"),
			array("e3b2","camera-rear"),
			array("e3b3","camera-roll"),
			array("e5c9","cancel"),
			array("e8f6","card-giftcard"),
			array("e8f7","card-membership"),
			array("e8f8","card-travel"),
			array("eb40","casino"),
			array("e307","cast"),
			array("e308","cast-connected"),
			array("e3b4","center-focus-strong"),
			array("e3b5","center-focus-weak"),
			array("e86b","change-history"),
			array("e0b7","chat"),
			array("e0ca","chat-bubble"),
			array("e0cb","chat-bubble-outline"),
			array("e5ca","check"),
			array("e834","check-box"),
			array("e835","check-box-outline-blank"),
			array("e86c","check-circle"),
			array("e5cb","chevron-left"),
			array("e5cc","chevron-right"),
			array("eb41","child-care"),
			array("eb42","child-friendly"),
			array("e86d","chrome-reader-mode"),
			array("e86e","class"),
			array("e14c","clear"),
			array("e0b8","clear-all"),
			array("e5cd","close"),
			array("e01c","closed-caption"),
			array("e2bd","cloud"),
			array("e2be","cloud-circle"),
			array("e2bf","cloud-done"),
			array("e2c0","cloud-download"),
			array("e2c1","cloud-off"),
			array("e2c2","cloud-queue"),
			array("e2c3","cloud-upload"),
			array("e86f","code"),
			array("e3b6","collections"),
			array("e431","collections-bookmark"),
			array("e3b7","color-lens"),
			array("e3b8","colorize"),
			array("e0b9","comment"),
			array("e3b9","compare"),
			array("e915","compare-arrows"),
			array("e30a","computer"),
			array("e638","confirmation-number"),
			array("e0d0","contact-mail"),
			array("e0cf","contact-phone"),
			array("e0ba","contacts"),
			array("e14d","content-copy"),
			array("e14e","content-cut"),
			array("e14f","content-paste"),
			array("e3ba","control-point"),
			array("e3bb","control-point-duplicate"),
			array("e90c","copyright"),
			array("e150","create"),
			array("e2cc","create-new-folder"),
			array("e870","credit-card"),
			array("e3be","crop"),
			array("e3bc","crop-16-9"),
			array("e3bd","crop-3-2"),
			array("e3bf","crop-5-4"),
			array("e3c0","crop-7-5"),
			array("e3c1","crop-din"),
			array("e3c2","crop-free"),
			array("e3c3","crop-landscape"),
			array("e3c4","crop-original"),
			array("e3c5","crop-portrait"),
			array("e437","crop-rotate"),
			array("e3c6","crop-square"),
			array("e871","dashboard"),
			array("e1af","data-usage"),
			array("e916","date-range"),
			array("e3c7","dehaze"),
			array("e872","delete"),
			array("e92b","delete-forever"),
			array("e16c","delete-sweep"),
			array("e873","description"),
			array("e30b","desktop-mac"),
			array("e30c","desktop-windows"),
			array("e3c8","details"),
			array("e30d","developer-board"),
			array("e1b0","developer-mode"),
			array("e335","device-hub"),
			array("e1b1","devices"),
			array("e337","devices-other"),
			array("e0bb","dialer-sip"),
			array("e0bc","dialpad"),
			array("e52e","directions"),
			array("e52f","directions-bike"),
			array("e532","directions-boat"),
			array("e530","directions-bus"),
			array("e531","directions-car"),
			array("e534","directions-railway"),
			array("e566","directions-run"),
			array("e533","directions-subway"),
			array("e535","directions-transit"),
			array("e536","directions-walk"),
			array("e610","disc-full"),
			array("e875","dns"),
			array("e612","do-not-disturb"),
			array("e611","do-not-disturb-alt"),
			array("e643","do-not-disturb-off"),
			array("e644","do-not-disturb-on"),
			array("e30e","dock"),
			array("e7ee","domain"),
			array("e876","done"),
			array("e877","done-all"),
			array("e917","donut-large"),
			array("e918","donut-small"),
			array("e151","drafts"),
			array("e25d","drag-handle"),
			array("e613","drive-eta"),
			array("e1b2","dvr"),
			array("e3c9","edit"),
			array("e568","edit-location"),
			array("e8fb","eject"),
			array("e0be","email"),
			array("e63f","enhanced-encryption"),
			array("e01d","equalizer"),
			array("e000","error"),
			array("e001","error-outline"),
			array("e926","euro-symbol"),
			array("e56d","ev-station"),
			array("e878","event"),
			array("e614","event-available"),
			array("e615","event-busy"),
			array("e616","event-note"),
			array("e903","event-seat"),
			array("e879","exit-to-app"),
			array("e5ce","expand-less"),
			array("e5cf","expand-more"),
			array("e01e","explicit"),
			array("e87a","explore"),
			array("e3ca","exposure"),
			array("e3cb","exposure-neg-1"),
			array("e3cc","exposure-neg-2"),
			array("e3cd","exposure-plus-1"),
			array("e3ce","exposure-plus-2"),
			array("e3cf","exposure-zero"),
			array("e87b","extension"),
			array("e87c","face"),
			array("e01f","fast-forward"),
			array("e020","fast-rewind"),
			array("e87d","favorite"),
			array("e87e","favorite-border"),
			array("e06d","featured-play-list"),
			array("e06e","featured-video"),
			array("e87f","feedback"),
			array("e05d","fiber-dvr"),
			array("e061","fiber-manual-record"),
			array("e05e","fiber-new"),
			array("e06a","fiber-pin"),
			array("e062","fiber-smart-record"),
			array("e2c4","file-download"),
			array("e2c6","file-upload"),
			array("e3d3","filter"),
			array("e3d0","filter-1"),
			array("e3d1","filter-2"),
			array("e3d2","filter-3"),
			array("e3d4","filter-4"),
			array("e3d5","filter-5"),
			array("e3d6","filter-6"),
			array("e3d7","filter-7"),
			array("e3d8","filter-8"),
			array("e3d9","filter-9"),
			array("e3da","filter-9-plus"),
			array("e3db","filter-b-and-w"),
			array("e3dc","filter-center-focus"),
			array("e3dd","filter-drama"),
			array("e3de","filter-frames"),
			array("e3df","filter-hdr"),
			array("e152","filter-list"),
			array("e3e0","filter-none"),
			array("e3e2","filter-tilt-shift"),
			array("e3e3","filter-vintage"),
			array("e880","find-in-page"),
			array("e881","find-replace"),
			array("e90d","fingerprint"),
			array("e5dc","first-page"),
			array("eb43","fitness-center"),
			array("e153","flag"),
			array("e3e4","flare"),
			array("e3e5","flash-auto"),
			array("e3e6","flash-off"),
			array("e3e7","flash-on"),
			array("e539","flight"),
			array("e904","flight-land"),
			array("e905","flight-takeoff"),
			array("e3e8","flip"),
			array("e882","flip-to-back"),
			array("e883","flip-to-front"),
			array("e2c7","folder"),
			array("e2c8","folder-open"),
			array("e2c9","folder-shared"),
			array("e617","folder-special"),
			array("e167","font-download"),
			array("e234","format-align-center"),
			array("e235","format-align-justify"),
			array("e236","format-align-left"),
			array("e237","format-align-right"),
			array("e238","format-bold"),
			array("e239","format-clear"),
			array("e23a","format-color-fill"),
			array("e23b","format-color-reset"),
			array("e23c","format-color-text"),
			array("e23d","format-indent-decrease"),
			array("e23e","format-indent-increase"),
			array("e23f","format-italic"),
			array("e240","format-line-spacing"),
			array("e241","format-list-bulleted"),
			array("e242","format-list-numbered"),
			array("e243","format-paint"),
			array("e244","format-quote"),
			array("e25e","format-shapes"),
			array("e245","format-size"),
			array("e246","format-strikethrough"),
			array("e247","format-textdirection-l-to-r"),
			array("e248","format-textdirection-r-to-l"),
			array("e249","format-underlined"),
			array("e0bf","forum"),
			array("e154","forward"),
			array("e056","forward-10"),
			array("e057","forward-30"),
			array("e058","forward-5"),
			array("eb44","free-breakfast"),
			array("e5d0","fullscreen"),
			array("e5d1","fullscreen-exit"),
			array("e24a","functions"),
			array("e927","g-translate"),
			array("e30f","gamepad"),
			array("e021","games"),
			array("e90e","gavel"),
			array("e155","gesture"),
			array("e884","get-app"),
			array("e908","gif"),
			array("eb45","golf-course"),
			array("e1b3","gps-fixed"),
			array("e1b4","gps-not-fixed"),
			array("e1b5","gps-off"),
			array("e885","grade"),
			array("e3e9","gradient"),
			array("e3ea","grain"),
			array("e1b8","graphic-eq"),
			array("e3eb","grid-off"),
			array("e3ec","grid-on"),
			array("e7ef","group"),
			array("e7f0","group-add"),
			array("e886","group-work"),
			array("e052","hd"),
			array("e3ed","hdr-off"),
			array("e3ee","hdr-on"),
			array("e3f1","hdr-strong"),
			array("e3f2","hdr-weak"),
			array("e310","headset"),
			array("e311","headset-mic"),
			array("e3f3","healing"),
			array("e023","hearing"),
			array("e887","help"),
			array("e8fd","help-outline"),
			array("e024","high-quality"),
			array("e25f","highlight"),
			array("e888","highlight-off"),
			array("e889","history"),
			array("e88a","home"),
			array("eb46","hot-tub"),
			array("e53a","hotel"),
			array("e88b","hourglass-empty"),
			array("e88c","hourglass-full"),
			array("e902","http"),
			array("e88d","https"),
			array("e3f4","image"),
			array("e3f5","image-aspect-ratio"),
			array("e0e0","import-contacts"),
			array("e0c3","import-export"),
			array("e912","important-devices"),
			array("e156","inbox"),
			array("e909","indeterminate-check-box"),
			array("e88e","info"),
			array("e88f","info-outline"),
			array("e890","input"),
			array("e24b","insert-chart"),
			array("e24c","insert-comment"),
			array("e24d","insert-drive-file"),
			array("e24e","insert-emoticon"),
			array("e24f","insert-invitation"),
			array("e250","insert-link"),
			array("e251","insert-photo"),
			array("e891","invert-colors"),
			array("e0c4","invert-colors-off"),
			array("e3f6","iso"),
			array("e312","keyboard"),
			array("e313","keyboard-arrow-down"),
			array("e314","keyboard-arrow-left"),
			array("e315","keyboard-arrow-right"),
			array("e316","keyboard-arrow-up"),
			array("e317","keyboard-backspace"),
			array("e318","keyboard-capslock"),
			array("e31a","keyboard-hide"),
			array("e31b","keyboard-return"),
			array("e31c","keyboard-tab"),
			array("e31d","keyboard-voice"),
			array("eb47","kitchen"),
			array("e892","label"),
			array("e893","label-outline"),
			array("e3f7","landscape"),
			array("e894","language"),
			array("e31e","laptop"),
			array("e31f","laptop-chromebook"),
			array("e320","laptop-mac"),
			array("e321","laptop-windows"),
			array("e5dd","last-page"),
			array("e895","launch"),
			array("e53b","layers"),
			array("e53c","layers-clear"),
			array("e3f8","leak-add"),
			array("e3f9","leak-remove"),
			array("e3fa","lens"),
			array("e02e","library-add"),
			array("e02f","library-books"),
			array("e030","library-music"),
			array("e90f","lightbulb-outline"),
			array("e919","line-style"),
			array("e91a","line-weight"),
			array("e260","linear-scale"),
			array("e157","link"),
			array("e438","linked-camera"),
			array("e896","list"),
			array("e0c6","live-help"),
			array("e639","live-tv"),
			array("e53f","local-activity"),
			array("e53d","local-airport"),
			array("e53e","local-atm"),
			array("e540","local-bar"),
			array("e541","local-cafe"),
			array("e542","local-car-wash"),
			array("e543","local-convenience-store"),
			array("e556","local-dining"),
			array("e544","local-drink"),
			array("e545","local-florist"),
			array("e546","local-gas-station"),
			array("e547","local-grocery-store"),
			array("e548","local-hospital"),
			array("e549","local-hotel"),
			array("e54a","local-laundry-service"),
			array("e54b","local-library"),
			array("e54c","local-mall"),
			array("e54d","local-movies"),
			array("e54e","local-offer"),
			array("e54f","local-parking"),
			array("e550","local-pharmacy"),
			array("e551","local-phone"),
			array("e552","local-pizza"),
			array("e553","local-play"),
			array("e554","local-post-office"),
			array("e555","local-printshop"),
			array("e557","local-see"),
			array("e558","local-shipping"),
			array("e559","local-taxi"),
			array("e7f1","location-city"),
			array("e1b6","location-disabled"),
			array("e0c7","location-off"),
			array("e0c8","location-on"),
			array("e1b7","location-searching"),
			array("e897","lock"),
			array("e898","lock-open"),
			array("e899","lock-outline"),
			array("e3fc","looks"),
			array("e3fb","looks-3"),
			array("e3fd","looks-4"),
			array("e3fe","looks-5"),
			array("e3ff","looks-6"),
			array("e400","looks-one"),
			array("e401","looks-two"),
			array("e028","loop"),
			array("e402","loupe"),
			array("e16d","low-priority"),
			array("e89a","loyalty"),
			array("e158","mail"),
			array("e0e1","mail-outline"),
			array("e55b","map"),
			array("e159","markunread"),
			array("e89b","markunread-mailbox"),
			array("e322","memory"),
			array("e5d2","menu"),
			array("e252","merge-type"),
			array("e0c9","message"),
			array("e029","mic"),
			array("e02a","mic-none"),
			array("e02b","mic-off"),
			array("e618","mms"),
			array("e253","mode-comment"),
			array("e254","mode-edit"),
			array("e263","monetization-on"),
			array("e25c","money-off"),
			array("e403","monochrome-photos"),
			array("e7f2","mood"),
			array("e7f3","mood-bad"),
			array("e619","more"),
			array("e5d3","more-horiz"),
			array("e5d4","more-vert"),
			array("e91b","motorcycle"),
			array("e323","mouse"),
			array("e168","move-to-inbox"),
			array("e02c","movie"),
			array("e404","movie-creation"),
			array("e43a","movie-filter"),
			array("e6df","multiline-chart"),
			array("e405","music-note"),
			array("e063","music-video"),
			array("e55c","my-location"),
			array("e406","nature"),
			array("e407","nature-people"),
			array("e408","navigate-before"),
			array("e409","navigate-next"),
			array("e55d","navigation"),
			array("e569","near-me"),
			array("e1b9","network-cell"),
			array("e640","network-check"),
			array("e61a","network-locked"),
			array("e1ba","network-wifi"),
			array("e031","new-releases"),
			array("e16a","next-week"),
			array("e1bb","nfc"),
			array("e641","no-encryption"),
			array("e0cc","no-sim"),
			array("e033","not-interested"),
			array("e06f","note"),
			array("e89c","note-add"),
			array("e7f4","notifications"),
			array("e7f7","notifications-active"),
			array("e7f5","notifications-none"),
			array("e7f6","notifications-off"),
			array("e7f8","notifications-paused"),
			array("e90a","offline-pin"),
			array("e63a","ondemand-video"),
			array("e91c","opacity"),
			array("e89d","open-in-browser"),
			array("e89e","open-in-new"),
			array("e89f","open-with"),
			array("e7f9","pages"),
			array("e8a0","pageview"),
			array("e40a","palette"),
			array("e925","pan-tool"),
			array("e40b","panorama"),
			array("e40c","panorama-fish-eye"),
			array("e40d","panorama-horizontal"),
			array("e40e","panorama-vertical"),
			array("e40f","panorama-wide-angle"),
			array("e7fa","party-mode"),
			array("e034","pause"),
			array("e035","pause-circle-filled"),
			array("e036","pause-circle-outline"),
			array("e8a1","payment"),
			array("e7fb","people"),
			array("e7fc","people-outline"),
			array("e8a2","perm-camera-mic"),
			array("e8a3","perm-contact-calendar"),
			array("e8a4","perm-data-setting"),
			array("e8a5","perm-device-information"),
			array("e8a6","perm-identity"),
			array("e8a7","perm-media"),
			array("e8a8","perm-phone-msg"),
			array("e8a9","perm-scan-wifi"),
			array("e7fd","person"),
			array("e7fe","person-add"),
			array("e7ff","person-outline"),
			array("e55a","person-pin"),
			array("e56a","person-pin-circle"),
			array("e63b","personal-video"),
			array("e91d","pets"),
			array("e0cd","phone"),
			array("e324","phone-android"),
			array("e61b","phone-bluetooth-speaker"),
			array("e61c","phone-forwarded"),
			array("e61d","phone-in-talk"),
			array("e325","phone-iphone"),
			array("e61e","phone-locked"),
			array("e61f","phone-missed"),
			array("e620","phone-paused"),
			array("e326","phonelink"),
			array("e0db","phonelink-erase"),
			array("e0dc","phonelink-lock"),
			array("e327","phonelink-off"),
			array("e0dd","phonelink-ring"),
			array("e0de","phonelink-setup"),
			array("e410","photo"),
			array("e411","photo-album"),
			array("e412","photo-camera"),
			array("e43b","photo-filter"),
			array("e413","photo-library"),
			array("e432","photo-size-select-actual"),
			array("e433","photo-size-select-large"),
			array("e434","photo-size-select-small"),
			array("e415","picture-as-pdf"),
			array("e8aa","picture-in-picture"),
			array("e911","picture-in-picture-alt"),
			array("e6c4","pie-chart"),
			array("e6c5","pie-chart-outlined"),
			array("e55e","pin-drop"),
			array("e55f","place"),
			array("e037","play-arrow"),
			array("e038","play-circle-filled"),
			array("e039","play-circle-outline"),
			array("e906","play-for-work"),
			array("e03b","playlist-add"),
			array("e065","playlist-add-check"),
			array("e05f","playlist-play"),
			array("e800","plus-one"),
			array("e801","poll"),
			array("e8ab","polymer"),
			array("eb48","pool"),
			array("e0ce","portable-wifi-off"),
			array("e416","portrait"),
			array("e63c","power"),
			array("e336","power-input"),
			array("e8ac","power-settings-new"),
			array("e91e","pregnant-woman"),
			array("e0df","present-to-all"),
			array("e8ad","print"),
			array("e645","priority-high"),
			array("e80b","public"),
			array("e255","publish"),
			array("e8ae","query-builder"),
			array("e8af","question-answer"),
			array("e03c","queue"),
			array("e03d","queue-music"),
			array("e066","queue-play-next"),
			array("e03e","radio"),
			array("e837","radio-button-checked"),
			array("e836","radio-button-unchecked"),
			array("e560","rate-review"),
			array("e8b0","receipt"),
			array("e03f","recent-actors"),
			array("e91f","record-voice-over"),
			array("e8b1","redeem"),
			array("e15a","redo"),
			array("e5d5","refresh"),
			array("e15b","remove"),
			array("e15c","remove-circle"),
			array("e15d","remove-circle-outline"),
			array("e067","remove-from-queue"),
			array("e417","remove-red-eye"),
			array("e928","remove-shopping-cart"),
			array("e8fe","reorder"),
			array("e040","repeat"),
			array("e041","repeat-one"),
			array("e042","replay"),
			array("e059","replay-10"),
			array("e05a","replay-30"),
			array("e05b","replay-5"),
			array("e15e","reply"),
			array("e15f","reply-all"),
			array("e160","report"),
			array("e8b2","report-problem"),
			array("e56c","restaurant"),
			array("e561","restaurant-menu"),
			array("e8b3","restore"),
			array("e929","restore-page"),
			array("e0d1","ring-volume"),
			array("e8b4","room"),
			array("eb49","room-service"),
			array("e418","rotate-90-degrees-ccw"),
			array("e419","rotate-left"),
			array("e41a","rotate-right"),
			array("e920","rounded-corner"),
			array("e328","router"),
			array("e921","rowing"),
			array("e0e5","rss-feed"),
			array("e642","rv-hookup"),
			array("e562","satellite"),
			array("e161","save"),
			array("e329","scanner"),
			array("e8b5","schedule"),
			array("e80c","school"),
			array("e1be","screen-lock-landscape"),
			array("e1bf","screen-lock-portrait"),
			array("e1c0","screen-lock-rotation"),
			array("e1c1","screen-rotation"),
			array("e0e2","screen-share"),
			array("e623","sd-card"),
			array("e1c2","sd-storage"),
			array("e8b6","search"),
			array("e32a","security"),
			array("e162","select-all"),
			array("e163","send"),
			array("e811","sentiment-dissatisfied"),
			array("e812","sentiment-neutral"),
			array("e813","sentiment-satisfied"),
			array("e814","sentiment-very-dissatisfied"),
			array("e815","sentiment-very-satisfied"),
			array("e8b8","settings"),
			array("e8b9","settings-applications"),
			array("e8ba","settings-backup-restore"),
			array("e8bb","settings-bluetooth"),
			array("e8bd","settings-brightness"),
			array("e8bc","settings-cell"),
			array("e8be","settings-ethernet"),
			array("e8bf","settings-input-antenna"),
			array("e8c0","settings-input-component"),
			array("e8c1","settings-input-composite"),
			array("e8c2","settings-input-hdmi"),
			array("e8c3","settings-input-svideo"),
			array("e8c4","settings-overscan"),
			array("e8c5","settings-phone"),
			array("e8c6","settings-power"),
			array("e8c7","settings-remote"),
			array("e1c3","settings-system-daydream"),
			array("e8c8","settings-voice"),
			array("e80d","share"),
			array("e8c9","shop"),
			array("e8ca","shop-two"),
			array("e8cb","shopping-basket"),
			array("e8cc","shopping-cart"),
			array("e261","short-text"),
			array("e6e1","show-chart"),
			array("e043","shuffle"),
			array("e1c8","signal-cellular-4-bar"),
			array("e1cd","signal-cellular-connected-no-internet-4-bar"),
			array("e1ce","signal-cellular-no-sim"),
			array("e1cf","signal-cellular-null"),
			array("e1d0","signal-cellular-off"),
			array("e1d8","signal-wifi-4-bar"),
			array("e1d9","signal-wifi-4-bar-lock"),
			array("e1da","signal-wifi-off"),
			array("e32b","sim-card"),
			array("e624","sim-card-alert"),
			array("e044","skip-next"),
			array("e045","skip-previous"),
			array("e41b","slideshow"),
			array("e068","slow-motion-video"),
			array("e32c","smartphone"),
			array("eb4a","smoke-free"),
			array("eb4b","smoking-rooms"),
			array("e625","sms"),
			array("e626","sms-failed"),
			array("e046","snooze"),
			array("e164","sort"),
			array("e053","sort-by-alpha"),
			array("eb4c","spa"),
			array("e256","space-bar"),
			array("e32d","speaker"),
			array("e32e","speaker-group"),
			array("e8cd","speaker-notes"),
			array("e92a","speaker-notes-off"),
			array("e0d2","speaker-phone"),
			array("e8ce","spellcheck"),
			array("e838","star"),
			array("e83a","star-border"),
			array("e839","star-half"),
			array("e8d0","stars"),
			array("e0d3","stay-current-landscape"),
			array("e0d4","stay-current-portrait"),
			array("e0d5","stay-primary-landscape"),
			array("e0d6","stay-primary-portrait"),
			array("e047","stop"),
			array("e0e3","stop-screen-share"),
			array("e1db","storage"),
			array("e8d1","store"),
			array("e563","store-mall-directory"),
			array("e41c","straighten"),
			array("e56e","streetview"),
			array("e257","strikethrough-s"),
			array("e41d","style"),
			array("e5d9","subdirectory-arrow-left"),
			array("e5da","subdirectory-arrow-right"),
			array("e8d2","subject"),
			array("e064","subscriptions"),
			array("e048","subtitles"),
			array("e56f","subway"),
			array("e8d3","supervisor-account"),
			array("e049","surround-sound"),
			array("e0d7","swap-calls"),
			array("e8d4","swap-horiz"),
			array("e8d5","swap-vert"),
			array("e8d6","swap-vertical-circle"),
			array("e41e","switch-camera"),
			array("e41f","switch-video"),
			array("e627","sync"),
			array("e628","sync-disabled"),
			array("e629","sync-problem"),
			array("e62a","system-update"),
			array("e8d7","system-update-alt"),
			array("e8d8","tab"),
			array("e8d9","tab-unselected"),
			array("e32f","tablet"),
			array("e330","tablet-android"),
			array("e331","tablet-mac"),
			array("e420","tag-faces"),
			array("e62b","tap-and-play"),
			array("e564","terrain"),
			array("e262","text-fields"),
			array("e165","text-format"),
			array("e0d8","textsms"),
			array("e421","texture"),
			array("e8da","theaters"),
			array("e8db","thumb-down"),
			array("e8dc","thumb-up"),
			array("e8dd","thumbs-up-down"),
			array("e62c","time-to-leave"),
			array("e422","timelapse"),
			array("e922","timeline"),
			array("e425","timer"),
			array("e423","timer-10"),
			array("e424","timer-3"),
			array("e426","timer-off"),
			array("e264","title"),
			array("e8de","toc"),
			array("e8df","today"),
			array("e8e0","toll"),
			array("e427","tonality"),
			array("e913","touch-app"),
			array("e332","toys"),
			array("e8e1","track-changes"),
			array("e565","traffic"),
			array("e570","train"),
			array("e571","tram"),
			array("e572","transfer-within-a-station"),
			array("e428","transform"),
			array("e8e2","translate"),
			array("e8e3","trending-down"),
			array("e8e4","trending-flat"),
			array("e8e5","trending-up"),
			array("e429","tune"),
			array("e8e6","turned-in"),
			array("e8e7","turned-in-not"),
			array("e333","tv"),
			array("e169","unarchive"),
			array("e166","undo"),
			array("e5d6","unfold-less"),
			array("e5d7","unfold-more"),
			array("e923","update"),
			array("e1e0","usb"),
			array("e8e8","verified-user"),
			array("e258","vertical-align-bottom"),
			array("e259","vertical-align-center"),
			array("e25a","vertical-align-top"),
			array("e62d","vibration"),
			array("e070","video-call"),
			array("e071","video-label"),
			array("e04a","video-library"),
			array("e04b","videocam"),
			array("e04c","videocam-off"),
			array("e338","videogame-asset"),
			array("e8e9","view-agenda"),
			array("e8ea","view-array"),
			array("e8eb","view-carousel"),
			array("e8ec","view-column"),
			array("e42a","view-comfy"),
			array("e42b","view-compact"),
			array("e8ed","view-day"),
			array("e8ee","view-headline"),
			array("e8ef","view-list"),
			array("e8f0","view-module"),
			array("e8f1","view-quilt"),
			array("e8f2","view-stream"),
			array("e8f3","view-week"),
			array("e435","vignette"),
			array("e8f4","visibility"),
			array("e8f5","visibility-off"),
			array("e62e","voice-chat"),
			array("e0d9","voicemail"),
			array("e04d","volume-down"),
			array("e04e","volume-mute"),
			array("e04f","volume-off"),
			array("e050","volume-up"),
			array("e0da","vpn-key"),
			array("e62f","vpn-lock"),
			array("e1bc","wallpaper"),
			array("e002","warning"),
			array("e334","watch"),
			array("e924","watch-later"),
			array("e42c","wb-auto"),
			array("e42d","wb-cloudy"),
			array("e42e","wb-incandescent"),
			array("e436","wb-iridescent"),
			array("e430","wb-sunny"),
			array("e63d","wc"),
			array("e051","web"),
			array("e069","web-asset"),
			array("e16b","weekend"),
			array("e80e","whatshot"),
			array("e1bd","widgets"),
			array("e63e","wifi"),
			array("e1e1","wifi-lock"),
			array("e1e2","wifi-tethering"),
			array("e8f9","work"),
			array("e25b","wrap-text"),
			array("e8fa","youtube-searched-for"),
			array("e8ff","zoom-in"),
			array("e900","zoom-out"),
			array("e56b","zoom-out-map"),
		);
		return $icons;
	}
?>